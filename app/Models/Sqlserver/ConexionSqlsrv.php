<?php

require_once("app/Config/DatosConexion.php");

/*
    @autor Jhon Giraldo
    clase encargada del manejo de base de datos hosvital
*/
class ConexionSqlsrv{

    protected $conexion;

    public function __construct(){

    } 

    /*
        @autor Jhon Giraldo
        metodo encargado de conectar con hosvital
    */
    public function Conectar(){
        try{
            $this->conexion= new PDO("sqlsrv:Server=" . DBHOST . "; Database=" . DBNAME,DBUSER,DBPASS);
            $this->conexion->setAttribute(PDO::SQLSRV_ATTR_ENCODING, PDO::SQLSRV_ENCODING_UTF8);
            //$this->conexion->exec("SET CHARACTER SET " .DBCHARSET);
            return $this->conexion;
        }catch(Exception $e){
            echo "Error : " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        metodo encargado de desconectar
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