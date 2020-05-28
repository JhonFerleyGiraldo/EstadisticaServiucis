<?php

/*
    @autor Jhon Giraldo
    @descripcion= Clase encargada del manejo de logs
*/
class Logger
{

    //Declaracion de campos para la clase
    private static $path;
    private static $filename;
    private static $fecha;
    private static $ip;
    private static $file;
    private static $usuario;
    private static $accion;
    private static $baseDatos;
    private static $tabla;
    private static $host;

    /*
        @autor Jhon Giraldo
        @descripcion= Da inicio a los campos de la clase
        @return void
    */
    public function __construct()
    {

        
    }

    /*
            @autor Jhon Giraldo
            @descripcion= Agrega un log a el archivo que se crea dentro de la ruta ServiucisAunClick\app\logs
            @param $usuarioAccion= El numero de documento del usuario que realiza la acción
            @param $fechaAccion= Fecha con hora en la que se realiza la acción
            @param $accionUsuario= Accion que realiza el usuario
            @param $baseDatosAccion= Base de datos en la que realizó la acción
            @param $tablaAccion= tabla de la base de datos donde realizo la acción
            @return void
        */
    public static function Log($usuarioAccion, $fechaAccion, $accionUsuario, $baseDatosAccion, $tablaAccion)
    {

        self::$fecha=$fechaAccion;
        self::$usuario=$usuarioAccion;
        self::$accion=$accionUsuario;
        self::$baseDatos=$baseDatosAccion;
        self::$tabla=$tablaAccion;

        self::$path = BASEPATH . "app\\Logs\\";
        self::$filename = date("Y-m-d") . ".log";
        self::$ip = $_SERVER['REMOTE_ADDR'];
        self::$host=gethostbyaddr($_SERVER['REMOTE_ADDR']);

        self::$file = fopen(self::$path . self::$filename, "a"); //Se crea objeto de tipo file con parametro a para agregar al archivo siempre en la ultima linea
        fwrite(self::$file, self::$fecha . ";" . self::$usuario . ";" . self::$accion . ";Base de datos:" . self::$baseDatos . ";Tabla:" . self::$tabla . ";" . self::$ip . ";" . self::$host . "\r\n"); //Se escribe en el archivo
        fclose(self::$file);

    }
}
