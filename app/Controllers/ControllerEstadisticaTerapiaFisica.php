<?php
session_start();/*Retomamos sesion activa*/

if(!isset($_SESSION["documentoUsuario"])){/*se valida si la sesion no esta activa*/
  header("location:" . BASEURL . "Login/Iniciar");
}

//Llamamos archivos requeridos
require_once("app/Models/Mysql/Ingreso.php");
require_once("app/Models/Mysql/EstadisticaTerapiafisica.php");
require_once("app/Models/Mysql/FuerzaIngreso.php");
require_once("app/Models/Mysql/TerapiaFisica.php");
require_once("app/Models/Mysql/Transferencia.php");


/*
    @autor Jhon Giraldo
    Clase encargada del manejo de estadistica terapia fisica
*/
class ControllerEstadisticaTerapiaFisica{

    /*
        @autor Jhon Giraldo
        Metodo constructor vacio
    */
    public function __construct(){

    }

    /*
        @autor Jhon Giraldo
        Metodo iniciar para agregar la vista de inicio
    */
    public function Iniciar(){
        try{
   
            //se llama el metodo para listar pacientes
            $pacientes=$this->GetListadoPacientes();

            $sedeLogueo=$_SESSION["sede"];//sede en la que ingreso el usuario
            //validamos que sede es
            if($sedeLogueo==110){
                $sedeLogueo="RIONEGRO";
            }else{
                $sedeLogueo="APARTADO";
            }
            
            require_once("app/Views/TerapiaFisica/ViewTerapiaFisica.php"); //agregamos vista de inicio

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
            //obtenemos la sede
            $sede=$_SESSION["sede"];

            //llamamos la clase ingreso para consultar pacientes
            $Oingreso=new Ingreso;
            //devolvemos pacientes por sede
            return $Oingreso->GetListadoPacientesFisioterapia($sede);

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }


    /*
        @autor Jhon Giraldo
        Metodo encargado de cargar la vista para agregar nueva terapia fisica
    */
    public function GetVistaAgregarNuevaEstadistica(){
        try{

            //recibimos parametros por url
            $documento=$_GET["documento"];
            $numIngreso=$_GET["numIngreso"];

            $sedeLogueo=$_SESSION["sede"];//sede e la que ingreso el usuario
            //validamos que sede es
            if($sedeLogueo==110){
                $sedeLogueo="RIONEGRO";
            }else{
                $sedeLogueo="APARTADO";
            }

            //si la sede es nula generemos error
            if($_SESSION["sede"]==NULL){
                echo "Error variable de sesión para sede vacia";
                exit();
            }

            require_once("app/Views/TerapiaFisica/ViewTerapiaFisicaAgregarEstadistica.php");//mostrar vista

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    
    public function GetVistaEstadisticaXpaciente(){
        try{

            //recibimos parametros por url
            $documento=$_GET["documento"];
            $numIngreso=$_GET["numIngreso"];

            $sedeLogueo=$_SESSION["sede"];//sede e la que ingreso el usuario
            //validamos que sede es
            if($sedeLogueo==110){
                $sedeLogueo="RIONEGRO";
            }else{
                $sedeLogueo="APARTADO";
            }

            //si la sede es nula generemos error
            if($_SESSION["sede"]==NULL){
                echo "Error variable de sesión para sede vacia";
                exit();
            }

            $Otrasferencia=new Transferencia();
            $listadoTransferencias=$Otrasferencia->GetTransferencias();

            require_once("app/Views/TerapiaFisica/ViewTerapiaXpaciente.php");//mostrar vista

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }


    public function GetConsultarUltimaTerapia(){

       //recibimos los datos  por POST
       $codigoEstadistica=$_POST["codigoEstad"];


       //instanciamos clase y seteamos atributos
       $Oterapia = new TerapiaFisica();

       //devolvemos los datos de la ultima terapia
       echo json_encode($Oterapia->GetUltimaTerapia($codigoEstadistica));     
    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de consultar datos de el paciente
    */
    public function GetConsultarDatosPaciente(){

        //recibimos los datos del paciente por POST
        $documento=$_POST["documento"];
        $numIngreso=$_POST["numIngreso"];

        //instanciamos clase y seteamos atributos
        $Oingreso = new Ingreso();
        $Oingreso->SetNumeroHistoriaClinica($documento);
        $Oingreso->SetCodigoIngresoPaciente($numIngreso);

        //devolvemos los datos del ingreso
        echo json_encode($Oingreso->GetIngresoPorPaciente($Oingreso));

    }

    public function SetAgregarNuevaTerapia(){
        //recibimos los datos de la terapia por POST
        $estadistica=$_POST["estadistica"];
        $fecha=$_POST["fecha"];
        $vm=$_POST["vm"];
        $transferencia=$_POST["transferencia"];
        $usuario=$_POST["usuario"];

        //instanciamos clase y seteamos atributos
        $Oterapia = new TerapiaFisica();
        $Oterapia->SetEstadistica($estadistica);
        $Oterapia->SetFecha($fecha);
        $Oterapia->SetVm($vm);
        $Oterapia->SetTransferencia($transferencia);
        $Oterapia->SetUsuario($usuario);

        //devolvemos los datos del ingreso
        echo json_encode($Oterapia->SetAgregarNuevaTerapia($Oterapia));
    }

    public function GetConsultarDatosEstadistica(){
        //recibimos los datos por POST
        $idIngreso=$_POST["idIngreso"];

        //instanciamos clase y seteamos atributos
        $Oestadistica = new EstadisticaTerapiafisica();
        $Oestadistica->SetCodigoIngreso($idIngreso);

        //devolvemos los datos de la estadistica
        echo json_encode($Oestadistica->GetDatosEstadisticaXingreso($Oestadistica));
    }

    public function GetConsultarTerapiasPorEstadistica(){
        //recibimos los datos por POST
        $codigoEstadistica=$_POST["codEstadistica"];

        //instanciamos clase y seteamos atributos
        $Oterapia= new TerapiaFisica();

        //devolvemos los datos de las terapias
        echo json_encode($Oterapia->GetTerapiasXestadistica($codigoEstadistica));

    }

    public function SetActualizarMejorTransferencia(){

        //recibimos los datos por POST
        $codigoEstadistica=$_POST["estadis"];
        $transferencia=$_POST["transfer"];

        //instanciamos clase y seteamos atributos
        $Oestadistica= new EstadisticaTerapiafisica();
        $Oestadistica->SetCodigo($codigoEstadistica);
        $Oestadistica->SetTransferenciaMaxima($transferencia);

        //devolvemos los datos de las terapias
        echo json_encode($Oestadistica->SetActualizarMejorTransferencia($Oestadistica));

    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de insertar nueva estadistica
    */
    public function SetInsertarNuevaEstadistica(){

        //recibimos los datos del paciente por POST
        $codigoIngreso=$_POST["codIngreso"];
        $fechaInicio=$_POST["fechaInicio"];
        $permeInicial=$_POST["permeIni"];
        $usuarioApertura=$_POST["usuarioApert"];

        //instanciamos clase y seteamos atributos
        $Oestadistica = new EstadisticaTerapiafisica();
        $Oestadistica->SetCodigoIngreso($codigoIngreso);
        $Oestadistica->SetFechaInicioFisioterapia($fechaInicio);
        $Oestadistica->SetPermeInicial($permeInicial);
        $Oestadistica->SetUsuarioApertura($usuarioApertura);
        $Oestadistica->SetUsuarioUltimaActualizacion($usuarioApertura);

        //devolvemos el codigo de la estadistica
        echo json_encode($Oestadistica->SetNuevaEstadistica($Oestadistica));

    }

    public function SetActualizarEstadistica(){

        //recibimos los datos del paciente por POST
        $codigoEstadistica=$_POST["codigo"];
        $claseFuncional=$_POST["clasFunci"];
        $observaciones=$_POST["observa"];
        $permeFinal=$_POST["permeFin"];
        $complicaciones=$_POST["complica"];
        $transMaxima=$_POST["transMaxima"];
        $usuario=$_POST["usu"];
        $estado=$_POST["esta"];

        if($observaciones==''){
            $observaciones=null;
        }

        if($complicaciones==''){
            $complicaciones=null;
        }

        if($permeFinal==''){
            $permeFinal=null;
        }

        //instanciamos clase y seteamos atributos
        $Oestadistica = new EstadisticaTerapiafisica();
        $Oestadistica->SetCodigo($codigoEstadistica);
        $Oestadistica->SetClaseFuncional($claseFuncional);
        $Oestadistica->SetObservacionesFuncionales($observaciones);
        $Oestadistica->SetPermeFinal($permeFinal);
        $Oestadistica->SetComplicaciones($complicaciones);
        $Oestadistica->SetTransferenciaMaxima($transMaxima);
        $Oestadistica->SetUsuarioUltimaActualizacion($usuario);
        $Oestadistica->SetEstado($estado);

        //devolvemos el valor de actualizacion
        echo json_encode($Oestadistica->SetActualizarEstadistica($Oestadistica));

    }


    /*
        @autor Jhon Giraldo
        Metodo encargado de insertar fuerza ingreso
    */
    public function SetInsertarFuerzaIngreso(){

        $idEstadisticaFisioterapia=$_POST["idEstadFisioterapia"];
        $MSDabdhom=$_POST["MSDabdhom"];
        $MSDflecod=$_POST["MSDflecod"];
        $MSDextmun=$_POST["MSDextmun"];
        $MSIabdhom=$_POST["MSIabdhom"];
        $MSIflecod=$_POST["MSIflecod"];
        $MSIextmun=$_POST["MSIextmun"];
        $MIDflexcad=$_POST["MIDflexcad"];
        $MIDextrod=$_POST["MIDextrod"];
        $MIDdorsi=$_POST["MIDdorsi"];
        $MIIflexcad=$_POST["MIIflexcad"];
        $MIIextrod=$_POST["MIIextrod"];
        $MIIdorsi=$_POST["MIIdorsi"];

        //instanciamos clase y seteamos atributos
        $Oestadistica = new FuerzaIngreso();
        $Oestadistica->SetEstadistica($idEstadisticaFisioterapia);
        $Oestadistica->SetMSDabdhom($MSDabdhom);
        $Oestadistica->SetMSDflecod($MSDflecod);
        $Oestadistica->SetMSDextmun($MSDextmun);
        $Oestadistica->SetMSIabdhom($MSIabdhom);
        $Oestadistica->SetMSIflecod($MSIflecod);
        $Oestadistica->SetMSIextmun($MSIextmun);
        $Oestadistica->SetMIDflexcad($MIDflexcad);
        $Oestadistica->SetMIDextrod($MIDextrod);
        $Oestadistica->SetMIDdorsi($MIDdorsi);
        $Oestadistica->SetMIIflexcad($MIIflexcad);
        $Oestadistica->SetMIIextrod($MIIextrod);
        $Oestadistica->SetMIIdorsi($MIIdorsi);

        //devolvemos si se modificaron filas
        echo json_encode($Oestadistica->SetInsertarFuerzaIngreso($Oestadistica));

    }


    /*
        @autor Jhon Giraldo
        Metodo encargado de insertar fuerza egreso
    */
    public function SetInsertarFuerzaEgreso(){

        $idEstadisticaFisioterapia=$_POST["idEstadFisioterapia"];
        $MSDabdhom=$_POST["MSDabdhom"];
        $MSDflecod=$_POST["MSDflecod"];
        $MSDextmun=$_POST["MSDextmun"];
        $MSIabdhom=$_POST["MSIabdhom"];
        $MSIflecod=$_POST["MSIflecod"];
        $MSIextmun=$_POST["MSIextmun"];
        $MIDflexcad=$_POST["MIDflexcad"];
        $MIDextrod=$_POST["MIDextrod"];
        $MIDdorsi=$_POST["MIDdorsi"];
        $MIIflexcad=$_POST["MIIflexcad"];
        $MIIextrod=$_POST["MIIextrod"];
        $MIIdorsi=$_POST["MIIdorsi"];

        //instanciamos clase y seteamos atributos
        $Oestadistica = new FuerzaIngreso();
        $Oestadistica->SetEstadistica($idEstadisticaFisioterapia);
        $Oestadistica->SetMSDabdhom($MSDabdhom);
        $Oestadistica->SetMSDflecod($MSDflecod);
        $Oestadistica->SetMSDextmun($MSDextmun);
        $Oestadistica->SetMSIabdhom($MSIabdhom);
        $Oestadistica->SetMSIflecod($MSIflecod);
        $Oestadistica->SetMSIextmun($MSIextmun);
        $Oestadistica->SetMIDflexcad($MIDflexcad);
        $Oestadistica->SetMIDextrod($MIDextrod);
        $Oestadistica->SetMIDdorsi($MIDdorsi);
        $Oestadistica->SetMIIflexcad($MIIflexcad);
        $Oestadistica->SetMIIextrod($MIIextrod);
        $Oestadistica->SetMIIdorsi($MIIdorsi);

        //devolvemos si se modificaron filas
        echo json_encode($Oestadistica->SetInsertarFuerzaEgreso($Oestadistica));

    }

}