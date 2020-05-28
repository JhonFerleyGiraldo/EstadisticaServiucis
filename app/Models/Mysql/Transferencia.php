<?php

require_once("Conexion.php");

/*
    @autor Jhon Giraldo
    clase encargada del manejo de la tabla transferencias
*/
class Transferencia extends Conexion{

    //atributos de clase
    private $codigo;
    private $descripcion;


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
        consulta las transferencias de la bd
    */
    public function GetTransferencias(){
        try{  
            $this->Conectar();
            $consulta="CALL SP_consultar_listadoTransferencias()";  

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
    public function SetCodigo($cod){
        $this->codigo=$cod;
    }

    public function GetCodigo(){
        return $this->codigo;
    }

    public function SetDescripcion($des){
        $this->descripcion=$des;
    }

    public function GetDescripcion(){
        return $this->descripcion;
    }


}


?>