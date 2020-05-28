<?php
session_start();/*Retomamos sesion activa*/

if(!isset($_SESSION["documentoUsuario"])){/*se valida si la sesion no esta activa*/
  header("location:" . BASEURL . "Login/Iniciar");
}

//Llamamos archivos requeridos
require_once("app/Models/Mysql/Ingreso.php");
require_once("app/Models/Mysql/ControlCateteres.php");
require_once("app/Models/Mysql/Usuario.php");

/*
    @autor Jhon Giraldo
    Clase encargada del manejo de control de cateteres
*/
class ControllerControlCateteres{

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
            
            require_once("app/Views/Enfermeria/ControlCateteres/ViewControlCateteres.php"); //agregamos vista de inicio

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
            return $Oingreso->GetListadoPacientes($sede);

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de cargar la vista ControlCateteresXpaciente para abrir el detalle del paciente
    */
    public function GetVistaControlCateteresXpaciente(){
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

            require_once("app/Views/Enfermeria/ControlCateteres/ViewControlCateteresXpaciente.php");//agregamos la vista

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de cargar la vista para agregar nuevo cateter
        tambien carga el listado de medicos en la sede que esten activos
    */
    public function GetVistaAgregarCateter(){
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

            $Ousuario=new Usuario();
            //traemos los medicos activos por sede
            $medicos=$Ousuario->GetMedicosActivos($_SESSION["sede"]);
            //traemos los enfermeros activos por sede
            $enfermeros=$Ousuario->GetEnfermerosActivos($_SESSION["sede"]);

            require_once("app/Views/Enfermeria/ControlCateteres/ViewControlCateteresAgregarNuevo.php");//mostrar vista

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de mostrar la vista para retirar cateter
    */
    public function GetVistaRetirarCateter(){
        try{

            //pparametros por url
            $codigoCateter=$_GET["codCateter"];
            $codigoIngreso=$_GET["codIngreso"];

            $sedeLogueo=$_SESSION["sede"];//sede e la que ingreso el usuario
            //validamos que sede es
            if($sedeLogueo==110){
                $sedeLogueo="RIONEGRO";
            }else{
                $sedeLogueo="APARTADO";
            }

            if($_SESSION["sede"]==NULL){
                echo "Error variable de sesión para sede vacia";
                exit();
            }

            require_once("app/Views/Enfermeria/ControlCateteres/ViewControlCateteresDetalleCateter.php");//agregamos la vista
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        } 
    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de retirar cateter de paciente
    */
    public function SetRetirarCateter(){
        //recibimos los valores por post
        $idCateter=$_POST["idCateter"];
        $codIngreso=$_POST["codIngreso"];
        $fechaRetiro=$_POST["fechaRetiro"];
        $motivo=$_POST["motivo"];
        $cultivo=$_POST["cultivo"];
        $reporte=$_POST["reporte"];

        if($reporte==''){
            $reporte=null;
        }

        //instanciamos clase y seteamos atributos
        $OctrCateter=new ControlCateteres();
        $OctrCateter->SetCodigo($idCateter);
        $OctrCateter->SetCodigoIngreso($codIngreso);
        $OctrCateter->SetFechaRetiro($fechaRetiro);
        $OctrCateter->SetMotivoRetiro($motivo);
        $OctrCateter->SetCultivo($cultivo);
        $OctrCateter->SetReporte($reporte);

        //devolvemos json con la repuesta de retirar cateter
        echo json_encode($OctrCateter->SetRetirarCateter($OctrCateter));

    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de agregar cateter al paciente
    */
    public function SetAgregarNuevoCateter(){

        //recibimos valores por post
        $codIngreso=$_POST["codIngreso"];
        $fechaInsercion=$_POST["fechaInsercion"];
        $tipoCateter=$_POST["tipoCateter"];
        $ubiAnatomica=$_POST["ubicAnatomica"];
        $lugarProcedimiento=$_POST["lugarProcedimiento"];
        $medico=$_POST["medico"];
        //validamos si el medico esta vacio
        if($medico==''){
            $medico=null;
        }
        $enfermero=$_POST["enfermero"];
        //validamos si enfermero esta vacio
        if($enfermero==''){
            $enfermero=null;
        }
        $numPunciones=$_POST["numPunciones"];

        //instanciamos clase y seteamos atributos
        $OctrCateter=new ControlCateteres();
        $OctrCateter->SetCodigoIngreso($codIngreso);
        $OctrCateter->SetFechaInsercion($fechaInsercion);
        $OctrCateter->SetTipoCateter($tipoCateter);
        $OctrCateter->SetUbicacionAnatomica($ubiAnatomica);
        $OctrCateter->SetLugarProcedimiento($lugarProcedimiento);
        $OctrCateter->SetMedico($medico);
        $OctrCateter->SetEnfermero($enfermero);
        $OctrCateter->SetNumeroPunciones($numPunciones);

        //devolvemos en json el resultado de guardar el registro
        echo json_encode($OctrCateter->SetNuevoCateter($OctrCateter));

    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de consultar cateteres por ingreso
    */
    public function GetConsultarCateteresPorIngreso(){

        //recibimos parametro por get
        $codigoIngreso=$_POST["numIngreso"];
        
        //instanciamos clase y seteamos el codigo de ingreso
        $OctrCateter= new ControlCateteres();
        $OctrCateter->SetCodigoIngreso($codigoIngreso);
        
        //devolvemos json con el listado de cateteres por codigo de ingreso
        echo json_encode($OctrCateter->GetListadoCateteresXingreso($OctrCateter->GetCodigoIngreso()));
       
    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de consultar datos de un solo cateter
    */
    public function GetConsultarDatosCateter(){
        //recibimos parametros por post
        $codCateter=$_POST["codCateter"];
        $codIngreso=$_POST["codIngreso"];

        //instanciamos y seteamos atributos
        $OctrCateter=new ControlCateteres();
        $OctrCateter->SetCodigo($codCateter);
        $OctrCateter->SetCodigoIngreso($codIngreso);

        //devolvemos los datos del cateter
        echo json_encode($OctrCateter->GetCateterXcodigo($OctrCateter));

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


}

?>