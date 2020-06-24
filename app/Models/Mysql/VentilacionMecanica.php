<?php

require_once("Conexion.php");

/*
    @autor Jhon Giraldo
    clase encargada del manejo de la tabla ventilacion mecanica
*/
class VentilacionMecanica extends Conexion{

    //atributos de clase
    private $codigo;
    private $estadistica;
    private $tipo;
    private $fechaInicio;
    private $fechaFin;

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
        Metodo encargado de guardar nueva ventilacion mecanica
    */
    public function SetGuardarNuevaVM(VentilacionMecanica $vm){
        try{
            $this->Conectar();
    
            $consulta="CALL SP_insertar_nuevaventilacionmecanica(:estadistica,:tipo,:fechaInicio,:fechaFin);";
                                                        
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(  ":estadistica"=>$vm->GetEstadistica(),":tipo"=>$vm->GetTipo(),":fechaInicio"=>$vm->GetFechaInicio(),":fechaFin"=>$vm->GetFechaFin()));
           
            $this->Desconectar();

            return $registros->rowCount();

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }

    }

    /*
        @autor Jhon Giraldoconsultar las vm de la estadistica
    */
    public function GetVMporEstadistica($idEstadistica){
        try{
            $this->Conectar();
    
            $consulta="CALL SP_consultar_VMestadistica(:estadistica);";
                                                        
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(  ":estadistica"=>$idEstadistica));
            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);
            $this->Desconectar();

            return $resultado;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }

    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de retirrar la vm
    */
    public function SetRetirarVM(VentilacionMecanica $vm){
        try{
            $this->Conectar();
    
            $consulta="CALL SP_actualizar_retiroVM(:estadistica,:codigovm,:fechaFin);";
                                                        
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(  ":estadistica"=>$vm->GetEstadistica(),":codigovm"=>$vm->GetCodigo(),":fechaFin"=>$vm->GetFechaFin()));
           
            $this->Desconectar();

            return $registros->rowCount();

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

    public function GetEstadistica(){
        return $this->estadistica;
    }

    public function SetEstadistica($val){
        $this->estadistica=$val;
    }

    public function GetTipo(){
        return $this->tipo;
    }

    public function SetTipo($val){
        $this->tipo=$val;
    }

    public function GetFechaInicio(){
        return $this->fechaInicio;
    }

    public function SetFechaInicio($val){
        $this->fechaInicio=$val;
    }

    public function GetFechaFin(){
        return $this->fechaFin;
    }

    public function SetFechaFin($val){
        $this->fechaFin=$val;
    }

}