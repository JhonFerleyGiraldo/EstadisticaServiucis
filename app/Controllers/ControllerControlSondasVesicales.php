<?php
session_start();/*Retomamos sesion activa*/

if(!isset($_SESSION["documentoUsuario"])){/*se valida si la sesion no esta activa*/
  header("location:" . BASEURL . "Login/Iniciar");
}


//Llamamos archivos requeridos
require_once("app/Models/Mysql/Ingreso.php");
require_once("app/Models/Mysql/ControlSondasVesicales.php");
require_once("app/Models/Mysql/Usuario.php");


/*
    @autor Jhon Giraldo
    Clase encargada del manejo de control de cateteres
*/
class ControllerControlSondasVesicales{

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
            
            require_once("app/Views/Enfermeria/ControlSondasVesicales/ViewControlSondasVesicales.php"); //agregamos vista de inicio

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
        Metodo encargado de cargar la vista ControlSondasVesicalesXpaciente para abrir el detalle del paciente
    */
    public function GetVistaControlSondasVesicalesXpaciente(){
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

            require_once("app/Views/Enfermeria/ControlSondasVesicales/ViewControlSondasVesicalesXpaciente.php");//agregamos la vista

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de cargar la vista para agregar nueva sonda vesical
    */
    public function GetVistaAgregarSondaVesical(){
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
            //traemos los enfermeros activos por sede
            $enfermeros=$Ousuario->GetEnfermerosActivos($_SESSION["sede"]);


            require_once("app/Views/Enfermeria/ControlSondasVesicales/ViewControlSondaVesicalAgregarNueva.php");//mostrar vista

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
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

    /*
        @autor Jhon Giraldo
        Metodo encargado de agregar cateter al paciente
    */
    public function SetAgregarNuevaSonda(){

        //recibimos valores por post
        $codIngreso=$_POST["codIngreso"];
        $fechaInsercion=$_POST["fechaInsercion"];
        $tipoCateter=$_POST["numSonda"];
        $lugarProcedimiento=$_POST["lugarProcedimiento"];
        $enfermero=$_POST["enfermero"];
        //validamos si enfermero esta vacio
        if($enfermero==''){
            $enfermero=null;
        }

        //instanciamos clase y seteamos atributos
        $OctrSondas=new ControlSondasVesicales();
        $OctrSondas->SetCodigoIngreso($codIngreso);
        $OctrSondas->SetFechaInsercion($fechaInsercion);
        $OctrSondas->SetNumeroSonda($tipoCateter);
        $OctrSondas->SetLugarProcedimiento($lugarProcedimiento);
        $OctrSondas->SetEnfermero($enfermero);

        //devolvemos en json el resultado de guardar el registro
        echo json_encode($OctrSondas->SetNuevaSonda($OctrSondas));

    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de retirar sonda de paciente
    */
    public function SetRetirarSonda(){
        //recibimos los valores por post
        $idCateter=$_POST["idSonda"];
        $codIngreso=$_POST["codIngreso"];
        $fechaRetiro=$_POST["fechaRetiro"];
        $motivo=$_POST["motivo"];
        $cultivo=$_POST["cultivo"];
        $reporte=$_POST["reporte"];

        if($reporte==''){
            $reporte=null;
        }

        //instanciamos clase y seteamos atributos
        $OctrSonda=new ControlSondasVesicales();
        $OctrSonda->SetCodigo($idCateter);
        $OctrSonda->SetCodigoIngreso($codIngreso);
        $OctrSonda->SetFechaRetiro($fechaRetiro);
        $OctrSonda->SetMotivoRetiro($motivo);
        $OctrSonda->SetCultivo($cultivo);
        $OctrSonda->SetReporte($reporte);

        //devolvemos json con la repuesta de retirar cateter
        echo json_encode($OctrSonda->SetRetirarSonda($OctrSonda));

    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de consultar sondas vesicales por ingreso
    */
    public function GetConsultarSondasVesicalesPorIngreso(){

        //recibimos parametro por get
        $codigoIngreso=$_POST["numIngreso"];
        
        //instanciamos clase y seteamos el codigo de ingreso
        $OctrSondas= new ControlSondasVesicales();
        $OctrSondas->SetCodigoIngreso($codigoIngreso);
        
        //devolvemos json con el listado de sondas por codigo de ingreso
        echo json_encode($OctrSondas->GetListadoSondasVesicalesXingreso($OctrSondas->GetCodigoIngreso()));
       
    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de consultar datos de una sola sonda
    */
    public function GetConsultarDatosCateter(){
        //recibimos parametros por post
        $codSonda=$_POST["codSonda"];
        $codIngreso=$_POST["codIngreso"];

        //instanciamos y seteamos atributos
        $OctrSondas=new ControlSondasVesicales();
        $OctrSondas->SetCodigo($codSonda);
        $OctrSondas->SetCodigoIngreso($codIngreso);

        //devolvemos los datos del cateter
        echo json_encode($OctrSondas->GetSondarXcodigo($OctrSondas));

    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de mostrar la vista para retirar sonda
    */
    public function GetVistaRetirarSonda(){
        try{

            //pparametros por url
            $codigoSonda=$_GET["codSonda"];
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

            require_once("app/Views/Enfermeria/ControlSondasVesicales/ViewControlSondasVesicalesDetalleSonda.php");//agregamos la vista
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        } 
    }

}

?>