<?php 

//autocarga de las clases
function autocargarControllers($classname){
    // Inclulle la carpeta controller con la clase solicitada en index.php
    require_once("app/Controllers/" . $classname . ".php");
}

//carga el autoload
spl_autoload_register("autocargarControllers");

?>