<?php
session_start();/*Retomamos sesion activa*/

if(!isset($_SESSION["documentoUsuario"])){/*se valida si la sesion no esta activa*/
  header("location:" . BASEURL . "Login/Iniciar");
}
//Llamamos archivos requeridos
require_once("app/Models/Sqlserver/INGRESOS.php");
require_once("app/Models/Mysql/Ingreso.php");
require_once("app/Models/Mysql/Paciente.php");
require_once("app/Models/Mysql/Estancia.php");

/*
    @autor Jhon Giraldo
    Clase encargada del manejo del paciente
*/
class ControllerPaciente{

     /*
        @autor Jhon Giraldo
        Metodo constructor vacio
    */
    public function __construct(){

    }

     /*
        @autor Jhon Giraldo
        Metodo iniciar para agregar la vista pronipal de pacientes
    */
    public function Iniciar(){
        try{
                
            //se llama el metodo para listar pacientes
            $pacientes=$this->GetListadoPacientes();

            $sedeLogueo=$_SESSION["sede"];//sede e la que ingreso el usuario
            if($sedeLogueo==110){
                $sedeLogueo="RIONEGRO";
            }else{
                $sedeLogueo="APARTADO";
            }
            
            require_once("app/Views/Paciente/ViewPaciente.php"); //agregamos la vista
            
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de mostrar la vista para actualizar paciente
    */
    public function GetVistaActualizarPaciente(){
        try{

            $documento=$_GET["documento"];
            $numIngreso=$_GET["numIngreso"];

            $sedeLogueo=$_SESSION["sede"];//sede e la que ingreso el usuario
            if($sedeLogueo==110){
                $sedeLogueo="RIONEGRO";
            }else{
                $sedeLogueo="APARTADO";
            }

            require_once("app/Views/Paciente/ViewActualizarPaciente.php");//agregamos la vista para sincronizar
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

     /*
        @autor Jhon Giraldo
        Metodo encargado de llamar la vista para sincronizar paciente
    */
    public function GetVistaSincronizarPaciente(){
        try{

            $sedeLogueo=$_SESSION["sede"];//sede e la que ingreso el usuario
            if($sedeLogueo==110){
                $sedeLogueo="RIONEGRO";
            }else{
                $sedeLogueo="APARTADO";
            }
            
            require_once("app/Views/Paciente/ViewSincronizarPaciente.php");//agregamos la vista para sincronizar
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

     /*
        @autor Jhon Giraldo
        Metodo para consultar un paciente en hosvital
    */
    public function GetConsultarPacienteEnHosvital(){
        try{
            //recibimos los datos del paciente por POST
            $tipoDoc=$_POST["tipoDoc"];
            $documento=$_POST["documento"];
            $numIngreso=$_POST["numIngreso"];

            //instanciamos clase INGRESOS perteneciente a hosvital
            $Oingresos=new INGRESOS();

            //llamamos el metodo para traer datos basicos y retornarlo en forma de json
            echo json_encode($Oingresos->GetDatosBasicosIngresoXpaciente($tipoDoc,$documento,$numIngreso));

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        Metodo para consultar el listado de pacientes
    */
    public function GetListadoPacientes(){
        try{

            $sede=$_SESSION["sede"];


            $Oingreso=new Ingreso();
            return $Oingreso->GetListadoPacientes($sede);

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }


    /*
        @autor Jhon Giraldo
        Metodo para validar si existe un paciente
    */
    public function GetValidarSiExistePaciente(){

        try{

            //recibimos los datos del paciente por POST
            $tipoDoc=$_POST["tipoDoc"];
            $documento=$_POST["documento"];

            $Opaciente=new Paciente();
            echo json_encode($Opaciente->GetValidarSiExistePaciente($tipoDoc,$documento));

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }

    }

    /*
        @autor Jhon Giraldo
        Metodo para insertar un nuevo ingreso de un paciente
    */
    public function SetInsertarNuevoIngreso(){
        try{
            $json_datos=$_POST["datosAGuardar"];//array json enviado desde AJAX

            //instancias de clase para consultas
            $Oingreso=new Ingreso();
            $Oestancia=new Estancia();

            //array de resultados ya que debemos validar si se guardo el ingreso y la estancia
            $arrayResultados=array("guardadoEstancia"=>true,"guardadoIngreso"=>false);

            //datos para la tabla de ingreso
            $Oingreso->SetNumeroHistoriaClinica(trim($json_datos[0]["documento"]));
            $Oingreso->SetCodigoIngresoPaciente(trim($json_datos[0]["numIngreso"]));
            $Oingreso->SetFechaIngreso(trim($json_datos[0]["fechaIngreso"]));
            $Oingreso->SetSedeAtencion(trim($json_datos[0]["codigoSedeIngreso"]));
            $Oingreso->SetCodigoDx1Ingreso(trim($json_datos[0]["codDxIng1"]));
            $Oingreso->SetDx1Ingreso(trim($json_datos[0]["nomDxIng1"]));
            $Oingreso->GetCodigoDx2Ingreso(trim($json_datos[0]["codDxIng2"]));
            $Oingreso->SetDx2Ingreso(trim($json_datos[0]["nomDxIng2"]));
            $Oingreso->SetUsuarioDelIngreso(trim($_SESSION["codigoUsuario"]));

            //se inserta el ingreso y se obtiene el codigo de ingreso registrado
            $codigoIngreso=$Oingreso->SetInsertarIngresoDePaciente($Oingreso);

            //Se valida si el codigo de ingreso es un numero entero positivo
            //lo cual quiere decir que si trajo un resultado valido y se inserto correctamente el ingreso
            if($codigoIngreso>0){

                $arrayResultados["guardadoIngreso"]=true; //pasamos el valor del array a true


                //iniciamos para guardar estancia
                $Oestancia->SetNUmIngreso($codigoIngreso);
                $Oestancia->SetFechaIngreso(trim($json_datos[0]["fechaIngreso"]));

                //validamos el pallellon de ingreso ya que esa sera su primera estancia
                if($json_datos[0]["codigoPabellonIngreso"]==2){
                    $Oestancia->SetTipoServicio("UCI ADULTOS RIONEGRO");
                    }else if($json_datos[0]["codigoPabellonIngreso"]==3){
                        $Oestancia->SetTipoServicio("UCI ADULTOS APARTADO");
                    }else if($json_datos[0]["codigoPabellonIngreso"]==4){
                        $Oestancia->SetTipoServicio("UCE ADULTOS APARTADO");
                    }else if($json_datos[0]["codigoPabellonIngreso"]==5){
                        $Oestancia->SetTipoServicio("UCE ADULTOS RIONEGRO");
                    }

                //guardamos la primera estancia que es la fecha de ingreso
                //y el tipo de servicio se valida en el ingreso
                $ingresoCount=$Oestancia->SetNuevaEstancia($Oestancia);
                if($ingresoCount>0){
                    //si se guardo la estancia se cambia la clave a true
                    $arrayResultados["guardadoEstancia"]=true; 
                }

            }

            echo  json_encode($arrayResultados);

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de insertar un nuevo ingreso
        esto quiere decir que insertara primero el paciente
        luego el ingreso y por ultimo la primera estancia
    */
    public function SetInsertarPacienteEIngresoNuevo(){
        try{
            
            $json_datos=$_POST["datosAGuardar"];//array json enviado desde AJAX

            //en este array validaremos si se guarda el paciente y el ingreso
            $arrayResultados=array("guardadoPaciente"=>true,"guardadoIngreso"=>false);

            //instancias de clase para consultas
            $Opaciente=new Paciente();
            $Oingreso=new Ingreso();
            $Oestancia=new Estancia();

            //datos para la tabla de paciente
            $Opaciente->SetDocumento(trim($json_datos[0]["documento"]));
            $Opaciente->SetTipoDoc(trim($json_datos[0]["tipoDoc"]));
            $Opaciente->SetNumeroHistoriaClinica(trim($json_datos[0]["documento"]));
            $Opaciente->SetPrimerNombre(trim($json_datos[0]["primerNombre"]));
            $Opaciente->SetSegundoNombre(trim($json_datos[0]["segundoNombre"]));
            $Opaciente->SetPrimerApellido(trim($json_datos[0]["primerApellido"]));
            $Opaciente->SetSegundoApellido(trim($json_datos[0]["segundoApellido"]));
            $Opaciente->SetFechaNacimiento(trim($json_datos[0]["fechaNacimiento"]));
            //Validamos el genero del paciente
            if(trim($json_datos[0]["genero"])=="M"){
                $Opaciente->SetGenero("MASCULINO");
            }else{
                $Opaciente->SetGenero("FEMENINO"); 
            }

            //Se inserta el paciente y se cambia la variable a true para retornar
            if($Opaciente->SetInsertarNuevoPaciente($Opaciente)){

                $arrayResultados["guardadoPaciente"]=true;//pasamos el valor a true ya que si se guardo el paciente

                //datos para la table de ingreso
                $Oingreso->SetNumeroHistoriaClinica(trim($json_datos[0]["documento"]));
                $Oingreso->SetCodigoIngresoPaciente(trim($json_datos[0]["numIngreso"]));
                $Oingreso->SetFechaIngreso(trim($json_datos[0]["fechaIngreso"]));
                $Oingreso->SetSedeAtencion(trim($json_datos[0]["codigoSedeIngreso"]));
                $Oingreso->SetCodigoDx1Ingreso(trim($json_datos[0]["codDxIng1"]));
                $Oingreso->SetDx1Ingreso(trim($json_datos[0]["nomDxIng1"]));
                $Oingreso->SetDx2Ingreso(trim($json_datos[0]["codDxIng2"]));
                $Oingreso->SetDx2Ingreso(trim($json_datos[0]["nomDxIng2"]));
                $Oingreso->SetUsuarioDelIngreso(trim($_SESSION["codigoUsuario"]));

                //se inserta el ingreso y se obtiene el codigo de ingreso registrado
                $codigoIngreso=$Oingreso->SetInsertarIngresoDePaciente($Oingreso);

                //Se valida si el codigo de ingreso es un numero entero positivo
                //lo cual quiere decir que si trajo un resultado valido y se inserto correctamente el ingreso
                if($codigoIngreso>0){

                    $arrayResultados["guardadoIngreso"]=true; //se guardo el ingreso correctamente

                    //iniciamos a guardar estancia
                    $Oestancia->SetNUmIngreso($codigoIngreso);
                    $Oestancia->SetFechaIngreso(trim($json_datos[0]["fechaIngreso"]));

                    if($json_datos[0]["codigoPabellonIngreso"]==2){
                    $Oestancia->SetTipoServicio("UCI ADULTOS RIONEGRO");
                    }else if($json_datos[0]["codigoPabellonIngreso"]==3){
                        $Oestancia->SetTipoServicio("UCI ADULTOS APARTADO");
                    }else if($json_datos[0]["codigoPabellonIngreso"]==4){
                        $Oestancia->SetTipoServicio("UCE ADULTOS APARTADO");
                    }else if($json_datos[0]["codigoPabellonIngreso"]==5){
                        $Oestancia->SetTipoServicio("UCE ADULTOS RIONEGRO");
                    }


                    //guardamos la primera estancia que es la fecha de ingreso
                    //y el tipo de servicio se valida en el ingreso
                    $Oestancia->SetNuevaEstancia($Oestancia);

                }

                

            }
            
            //se retorna un array que contiene 2 claves, si esan en true es porque el ingreso
            //y el paciente se registraron correctamente
            echo  json_encode($arrayResultados);

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de validar si existe el ingreso de un paciente en la base de datos local
    */
    public function GetValidarSiExisteIngresoDePaciente(){
        try{
            //recibimos los datos del paciente por POST
            $documento=$_POST["documento"];
            $numIngreso=$_POST["numIngreso"];

            $Oingreso = new Ingreso();

            echo json_encode($Oingreso->GetValidarSiExisteIngresoDePaciente($documento,$numIngreso));

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de consultar el ingreso por paciente
    */
    public function GetConsultarIngresoPorPaciente(){
        //recibimos los datos del paciente por POST
        $documento=$_POST["documento"];
        $numIngreso=$_POST["numIngreso"];

        $Oingreso = new Ingreso();
        $Oingreso->SetNumeroHistoriaClinica($documento);
        $Oingreso->SetCodigoIngresoPaciente($numIngreso);

        echo json_encode($Oingreso->GetIngresoPorPaciente($Oingreso));
    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de consultar estancias del ingreso
    */
    public function GetConsultarEstanciasPorIngreso(){

        $numIngresoTabla=$_POST["numIngreso"];
        $Oestancia=new Estancia();
        $Oestancia->SetNUmIngreso($numIngresoTabla);

        echo json_encode($Oestancia->GetConsultarEstanciasPorIngreso($Oestancia));

    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de actualizar los datos que son del medico
    */
    public function SetMedicoActualizaIngreso(){

        $numHistoriaClinica=$_POST["numHistoria"];
        $numIngreso=$_POST["numIngreso"];
        $apache2=$_POST["apache2"];
        $mortPredicha=$_POST["mortPredicha"];
        $sofa=$_POST["sofa"];

        $Oingreso=new Ingreso();
        $Oingreso->SetNumeroHistoriaClinica($numHistoriaClinica);
        $Oingreso->SetCodigoIngresoPaciente($numIngreso);
        if($apache2==''){
            $apache2=NULL;
        }
        $Oingreso->SetApache2($apache2);
        if($mortPredicha==''){
            $mortPredicha=NULL;
        }
        $Oingreso->SetMortalidadPredicha($mortPredicha);
        if($sofa==''){
            $sofa=NULL;
        }
        $Oingreso->SetSofa($sofa);

        echo json_encode($Oingreso->SetMedicoActualizaIngreso($Oingreso));

    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de actualizar los datos que son de enfermeria
    */
    public function SetEnfermeriaActualizaIngreso(){
        $codigoIngresoTabla=$_POST["codigoIngresoTabla"];
        $numHistoriaClinica=$_POST["numHistoria"];
        $numIngreso=$_POST["numIngreso"];
        $cama=$_POST["cama"];
        $estadoIngreso=$_POST["estadoIngreso"];
        $egresoVivo=$_POST["egresoVivo"];
        $lugarEgreso=$_POST["lugarEgreso"];
        $nombreHospital=$_POST["nomHospital"];

        

        $Oingreso=new Ingreso();
        $Oingreso->SetNumeroHistoriaClinica($numHistoriaClinica);
        $Oingreso->SetCodigoIngresoPaciente($numIngreso);
        if($cama==''){
            $cama=NULL;
        }
        $Oingreso->SetCama($cama);
        $Oingreso->SetEstadoIngreso($estadoIngreso);
        if($egresoVivo==''){
            $egresoVivo=NULL;
        }
        $Oingreso->SetEgresoVivo($egresoVivo);

        if($egresoVivo=="NO"){
            $lugarEgreso=null;
            $nombreHospital=null;
        }

        $Oingreso->SetLugarEgreso($lugarEgreso);

        if($nombreHospital==''){
            $nombreHospital=null;
        }

        $Oingreso->SetNombreHospital(strtoupper($nombreHospital));

        if($estadoIngreso=='CERRADO'){
            $Oingreso->SetFechaCierre(date("Y-m-d"));
            $Oingreso->SetUsuarioCierre($_SESSION["codigoUsuario"]);

            $Oestancia=new Estancia();
            $Oestancia->SetNUmIngreso($codigoIngresoTabla);
            $Oestancia->SetFechaEgreso(date("Y-m-d"));
            $Oestancia->SetCerrarEstancia($Oestancia);
            
        }

        echo json_encode($Oingreso->SetEnfermeriaActualizaIngreso($Oingreso));
    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de validar si la cama ingresada ya esta ocupada
    */
    public function GetValidarSiCamaOcupada(){
        
        $numeroCama=$_POST["numeroCama"];
        $sede=$_POST["sede"];

        $Oingreso=new Ingreso();
        echo json_encode($Oingreso->GetValidarSiCamaOcupada($numeroCama,$sede));

    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de consultar estancias sin cerrar
    */
    public function GetConsultarEstanciaSinCerrar(){
        $codigoIngresoTabla=$_POST["numIngreso"];
        $Oestancia=new Estancia();

        $Oestancia->SetNumIngreso($codigoIngresoTabla);

        

        echo json_encode($Oestancia->GetEstanciaSinCerrarPorIngreso($Oestancia));

    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de agregar nueva estancia
    */
    public function SetAgregarNuevaEstancia(){

        $codigoIngresoTabla=$_POST["numIngreso"];
        $fechaIngresoEstancia=$_POST["fechaIngresoEstancia"];
        $tipoServicio=$_POST["tipoServicio"];

        //objeto para crear nueva estancia
        $Oestancia=new Estancia();
        $Oestancia->SetNumIngreso($codigoIngresoTabla);
        $Oestancia->SetFechaIngreso($fechaIngresoEstancia);
        $Oestancia->SetTipoServicio($tipoServicio);
        
        //para cerrar estancia
        $Oestancia->SetFechaEgreso($fechaIngresoEstancia);//se agrega este valor solo para cerrar la estancia anterior
        $Oestancia->SetCerrarEstancia($Oestancia); //se cierra la estancia anerior a la nueva

        //se guarda nueva estancia y se devuelve resultado
        echo json_encode($Oestancia->SetNuevaEstancia($Oestancia));

    }

}
?>
