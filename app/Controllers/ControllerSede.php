<?php
session_start();/*Retomamos sesion activa*/

if(!isset($_SESSION["documentoUsuario"])){/*se valida si la sesion no esta activa*/
  header("location:" . BASEURL . "Login/Iniciar");
}

//Llamamos archivos requeridos
require_once("app/Models/Mysql/Sede.php");
require_once("app/Models/Mysql/UsuarioSede.php");

/*
    @autor Jhon Giraldo
    Clase encargada del manejo de los usuarios
*/
class ControllerSede{

    /*
       @autor Jhon Giraldo
       Metodo constructor vacio
   */
   public function __construct(){

   }


   /*
       @autor Jhon Giraldo
       Metodo consulta sedes
   */
   public function GetListaSedes(){
    try{

        $Osede=new Sede();
        echo json_encode($Osede->GetSedes());

    }catch(Exception $e){
        echo "Error: " . $e->getMessage();
    }
   }

   /*
       @autor Jhon Giraldo
       Metodo consulta sedes porusuario
   */
   public function GetListaSedesXusuario(){
    try{

        $codUsuario=$_POST["codUsu"];

        $Ousuariosede=new UsuarioSede();
        $Ousuariosede->SetCodigoUsuario($codUsuario);

        echo json_encode($Ousuariosede->GetSedesXusuario($Ousuariosede));

    }catch(Exception $e){
        echo "Error: " . $e->getMessage();
    }
   }

}

?>