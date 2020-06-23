<?php
session_start();/*Retomamos sesion activa*/

if(!isset($_SESSION["documentoUsuario"])){/*se valida si la sesion no esta activa*/
  header("location:" . BASEURL . "Login/Iniciar");
}


//Llamamos archivos requeridos
require_once("app/Models/Mysql/Ingreso.php");
require_once("app/Models/Mysql/EstadisticaTerapiaRespiratoria.php");


/*
    @autor Jhon Giraldo
    Clase encargada del manejo de estadistica terapia respiratoria
*/
class ControllerEstadisticaTerapiaRespiratoria{

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
            
            require_once("app/Views/TerapiaRespiratoria/ViewTerapiaRespiratoria.php"); //agregamos vista de inicio

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
            return $Oingreso->GetListadoPacientesTerapiaRespiratoria($sede);

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }


    /*
        @autor Jhon Giraldo
        Metodo encargado de cargar la vista para agregar nueva terapia respiratoria
    */
    public function GetVistaEstadisticaTerapiaRespiratoria(){
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


            $Oingreso=new Ingreso;
            $Oingreso->SetNumeroHistoriaClinica($documento);
            $Oingreso->SetCodigoIngresoPaciente($numIngreso);
            $datosPaciente=$Oingreso->GetIngresoPorPaciente($Oingreso);

            $codigoTablaIngreso=$datosPaciente[0]["codigoIngresoTabla"];

            $estadistica=new EstadisticaTerapiaRespiratoria();
 

            $existe=$estadistica->GetExisteEstadistica($codigoTablaIngreso);

            if(!$existe){
       
                $estadistica->SetInsertarEstadistica($codigoTablaIngreso,$_SESSION["codigoUsuario"]);       
            }
             
            require_once("app/Views/TerapiaRespiratoria/ViewTerapiaXpaciente.php");//mostrar vista
        
            
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public function GetDatosEstadistica(){

        //recibimos los datos de la terapia por POST
        $codigoIngreso=$_POST["codigoIngreso"];

        //instanciamos clase y seteamos atributos
        $estadistica = new EstadisticaTerapiaRespiratoria();
        
        echo json_encode($estadistica->GetDatosEstadistica($codigoIngreso));
    }

    public function SetActualizarEstadistica(){

        //recibimos los datos de la terapia por POST
        $idEstadistica=$_POST["idEstadistica"];
        $codIngreso=$_POST["codIngreso"];
        $tqt=$_POST["tqt"];
        $neumoniavm=$_POST["neumoniavm"];
        $estado=$_POST["estado"];

        if($tqt==''){
            $tqt=null;
        }


        //instanciamos clase y seteamos atributos
        $estadistica = new EstadisticaTerapiaRespiratoria();
        $estadistica->SetCodigo($idEstadistica);
        $estadistica->SetConsecutivoIngreso($codIngreso);
        $estadistica->SetTqt($tqt);
        $estadistica->SetNeumoniaasociadaVM($neumoniavm);
        $estadistica->SetUsuarioUltimaActualizacion($_SESSION["codigoUsuario"]);
        $estadistica->SetFechaUltimaActualizacion(date('Y-m-d'));
        $estadistica->SetEstado($estado);
        
        echo json_encode($estadistica->SetActualizarEstadistica($estadistica));
    }

}
?>