<?php
class ControllerUtiles{

    public function __construct(){

    }

     /*
        @autor Jhon Giraldo
        Metodo constructor vacio
    */
    public function GetError404(){
        try{
            require_once("app/Views/View404.php");
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

}
?>