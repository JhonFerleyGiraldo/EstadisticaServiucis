<?php
session_start();/*Retomamos sesion activa*/

if(!isset($_SESSION["documentoUsuario"])){/*se valida si la sesion no esta activa*/
  header("location:" . BASEURL . "Login/Iniciar");
}

//Llamamos archivos requeridos
require_once("app/Models/Mysql/Ingreso.php");

/*
    @autor Jhon Giraldo
    Clase encargada del manejo del menu inicio de la aplicacion
*/
class ControllerInicio{

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
            $sedeLogueo=$_SESSION["sede"];//sede e la que ingreso el usuario
            if($sedeLogueo==110){
                $sedeLogueo="RIONEGRO";
            }else{
                $sedeLogueo="APARTADO";
            }
            
            require_once("app/Views/ViewInicio.php"); //agregamos vista de inicio

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


            $Oingreso=new Ingreso;
            return $Oingreso->GetListadoPacientesEnCama($sede);

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

}
?>
