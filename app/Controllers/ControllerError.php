<?php



/*
    @autor Jhon Giraldo
    Clase encargada del manejo de errores
*/
class ControllerError{

    /*
        @autor Jhon Giraldo
        Metodo constructor vacio
    */
    public function __construct(){

    }

    public function PaginaNoEncontrada404(){


        require_once("app/Views/View404.php"); //agregamos vista de inicio


    }

}


?>