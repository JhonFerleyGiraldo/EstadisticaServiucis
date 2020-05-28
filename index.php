<?php

/*
    *@autor Jhon Giraldo
    *Archivo principal encargado de realizar las redirecciones en la pagina
    *cargando los controladores y metodos
	*/


//Agregamos los archivos necesarios para la aplicacion
require_once("autoload.php");
require_once("app/Config/DatosConexion.php");
require_once("app/Controllers/ControllerUtiles.php");


$error=new ControllerUtiles();

//validamos si en la url existe un controlador
if (isset($_GET['controller'])) {
    $nombre_controlador = "Controller" . $_GET['controller'];
} elseif (!isset($_GET['controller'])  &&   !isset($_GET['action'])) {//validamos si ni hay controlador ni accion
    $nombre_controlador = DefaultController;//entregamos el controlador por defecto en el archivo de configuracion
} else {
    //$error->PaginaNoEncontrada();
    exit();
}

// consulta a la clase cargada del 'autoload' en la carpeta controllers
if (class_exists($nombre_controlador)) {//valida si la clase existe


    $controlador = new $nombre_controlador;//instancia clase

    //compueba el method y la accion solicitada exista
    if (isset($_GET['action'])   &&  method_exists($controlador, $_GET['action'])) {

        $action = $_GET['action'];
        // llama la funcion recibida por  GET
        $controlador->$action(); //ejecuta la accion del metodo

    } elseif (!isset($_GET['controller'])  &&   !isset($_GET['action'])) {//si esta vacia la accion

        $action_default = ActionDefault;//se entrega la accion por defecto

        $controlador->$action_default();//se llama la accion
    } else {
        $error->GetError404();
        //$error->PaginaNoEncontrada();
    }
} else {
    //$error->PaginaNoEncontrada();
    $error->GetError404();
}

	
?>