<?php

require_once("app/Config/DatosConexion.php");

/*
    @autor Jhon Giraldo
    clase encargada del manejo de la base de datos mysql
*/
class Conexion{

    protected $conexion;

    public function __construct(){

    } 

    /*
        @autor Jhon Giraldo
        metodo encargado de conectar mysql
    */
    public function Conectar(){
        try{
            $this->conexion= new PDO("mysql:host=" . DBHOSTM."; dbname=" . DBNAMEM,DBUSERM,DBPASSM);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->conexion->exec("SET CHARACTER SET " .DBCHARSET);
            return $this->conexion;
        }catch(Exception $e){
            echo "Error : " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        metodo encargado de desconectar mysql
    */
    public function Desconectar(){
        try{
            $this->conexion=NULL;
        }catch(Exception $e){
            echo "Error : " . $e->getMessage();
        }
    }


}

?>