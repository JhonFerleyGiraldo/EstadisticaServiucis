<?php

require_once("Conexion.php");

/*
    @autor Jhon Giraldo
    clase encargada del manejo de la tabla terapia fisica
*/
class TerapiaFisica extends Conexion{

    //atributos de clase
    private $codigo;
    private $estadistica;
    private $fecha;
    private $vm;
    private $transferencia;
    private $usuario;

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
        Muestra todas las terapias fisicas de una estadistica
    */
    public function GetTerapiasXestadistica($idEstadistica){
        try{  
            $this->Conectar();
            $consulta="CALL SP_consultar_terapiasfisicasXestadistica(:idEsta)";  

            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(":idEsta"=>$idEstadistica));
            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);

            $this->Desconectar();

            return $resultado;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        agrega una nueva terapia a la estadistica del paciente
    */
    public function SetAgregarNuevaTerapia(TerapiaFisica $Oterapia){
        try{
            $this->Conectar();
    
            $consulta="CALL SP_insertar_nuevaTerapia(:est,:fecha,:vm,:trans,:usuario);";
                                                        
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(  ":est"=>$Oterapia->GetEstadistica(),":fecha"=>$Oterapia->GetFecha(),":vm"=>$Oterapia->GetVm(),
                                        ":trans"=>$Oterapia->GetTransferencia(),":usuario"=>$Oterapia->GetUsuario()));
           
            $this->Desconectar();

            return $registros->rowCount();

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        Consulta la ultima terapia del paciente
    */
    public function GetUltimaTerapia($idEstadistica){
        try{  
            $this->Conectar();
            $consulta="CALL SP_consultar_ultimaterapiafisicaXestadistica(:idEsta)";  

            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(":idEsta"=>$idEstadistica));
            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);

            $this->Desconectar();

            return $resultado;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }


    /*
        @autor Jhon Giraldo
        metodo encargado de consultar las terapias con y sin ventilacion vecanica
    */
    public function GetTerapiasVentilacionMecanica($fechaInicio,$fechaFin,$sede){
        try{

            $this->Conectar();

            $consulta="CALL SP_consultar_terapiasventilacionmecanica(:fechainicio,:fechafin,:sede);";
                                                        
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(  ":fechainicio"=>$fechaInicio,":fechafin"=>$fechaFin,":sede"=>$sede));

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

    public function SetEstadistica($est){
        $this->estadistica=$est;
    }

    public function GetEstadistica(){
        return $this->estadistica;
    }

    public function SetFecha($fec){
        $this->fecha=$fec;
    }

    public function GetFecha(){
        return $this->fecha;
    }

    public function SetVm($v){
        $this->vm=$v;
    }

    public function GetVm(){
        return $this->vm;
    }

    public function SetTransferencia($tran){
        $this->transferencia=$tran;
    }

    public function GetTransferencia(){
        return $this->transferencia;
    }

    public function SetUsuario($usu){
        $this->usuario=$usu;
    }

    public function GetUsuario(){
        return $this->usuario;
    }

}


?>