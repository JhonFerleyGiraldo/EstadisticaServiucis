<?php

require_once("Conexion.php");
require_once("app/Logs/Logger.php");

/*
    @autor Jhon Giraldo
    clase encargada del manejo de la tabla sede
*/
class Sede extends Conexion{

    //atributos de clase
    private $codigo;
    private $nombre;


    /*
        @autor Jhon Giraldo
        constructor vacio
    */
    public function __construct(){
        try{
                 
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        } 
    }


    /*
        @autor Jhon Giraldo
        metodo encargado de consultar datos de los enfermeros activos y por sede
    */
    public function GetSedes(){
        try{  
            $this->Conectar();
            $consulta="CALL SP_consultar_listadoSedes()";  

            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array());
            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);

            $this->Desconectar();

            return $resultado;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }


    //metodos getter y setter
    public function GetCodigo(){
        return $this->codigo;
    }

    public function SetCodigo($cod){
        $this->codigo=$cod;
    }


    public function GetNombre(){
        return $this->nombre;
    }

    public function SetNombre($nom){
        $this->nombre=$nom;
    }

}