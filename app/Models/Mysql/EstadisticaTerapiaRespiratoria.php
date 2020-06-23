<?php

require_once("Conexion.php");

/*
    @autor Jhon Giraldo
    clase encargada del manejo de la tabla terapia respitaroria
*/
class EstadisticaTerapiaRespiratoria extends Conexion{

    //atributos de clase
    private $codigo;
    private $consecutivoIngreso;
    private $ventilacionMecanica;
    private $tqt;
    private $neumoniaasociadaVM;
    private $usuarioApertura;
    private $usuarioUltimaActualizacion;
    private $fechaUltimaActualizacion;
    private $estado;

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
        metodo encargado de insertar nuevo registro de estadistica
    */
    public function SetInsertarEstadistica($codIngreso,$usuario){
        try{
            $this->Conectar();

            $fecha=date('Y-m-d');
    
            $consulta="CALL SP_insertar_nuevaEstadisticaRespiratoria(:codIngreso,:usuario,:fecha);";
                                                        
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(  ":codIngreso"=>$codIngreso,":usuario"=>$usuario,":fecha"=>$fecha));
           
            $this->Desconectar();

            return $registros->rowCount();

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    
    public function GetExisteEstadistica($codIngreso){
        try{
            $this->Conectar();

    
            $consulta="SELECT * FROM tbl_estadistica_terapiarespiratoria WHERE consecutivoIngreso=:codIngreso";
                                                        
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(  ":codIngreso"=>$codIngreso));
           
            $this->Desconectar();

            return $registros->rowCount();

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public function GetDatosEstadistica($codigoIngreso){
        try{

            $this->Conectar();

            $consulta="CALL SP_consultar_estadisticaRespiratoriaXingreso(:codIngreso);";
                                                        
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(  ":codIngreso"=>$codigoIngreso));

            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);

            $this->Desconectar();

            return $resultado;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }


    /*
        @autor Jhon Giraldo
        metodo encargado de insertar nuevo registro de estadistica
    */
    public function SetActualizarEstadistica(EstadisticaTerapiaRespiratoria $estadistica){
        try{
            $this->Conectar();
    
            $consulta="CALL SP_actualizar_estadisticarespiratoria(:codigo,:codIngreso,:tqt,:neumoniavm,:usuarioActualizacion,:fecha,:estado);";
                                                        
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(  ":codigo"=>$estadistica->GetCodigo(),":codIngreso"=>$estadistica->GetConsecutivoIngreso(),":tqt"=>$estadistica->GetTqt(),
                                        ":neumoniavm"=>$estadistica->GetNeumoniaasociadaVM(),":usuarioActualizacion"=>$estadistica->GetUsuarioUltimaActualizacion(),
                                        ":fecha"=>$estadistica->GetFechaUltimaActualizacion(),":estado"=>$estadistica->GetEstado()));
           
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

    public function GetConsecutivoIngreso(){
        return $this->consecutivoIngreso;
    }

    public function SetConsecutivoIngreso($cons){
        $this->consecutivoIngreso=$cons;
    }

    public function GetVentilacionMecanica(){
        return $this->ventilacionMecanica;
    }

    public function SetVentilacionMecanica($vm){
        $this->ventilacionMecanica=$vm;
    }

    public function GetTqt(){
        return $this->tqt;
    }

    public function SetTqt($val){
        $this->tqt=$val;
    }

    public function GetNeumoniaasociadaVM(){
        return $this->neumoniaasociadaVM;
    }

    public function SetNeumoniaasociadaVM($val){
        $this->neumoniaasociadaVM=$val;
    }

    public function GetUsuarioApertura(){
        return $this->usuarioApertura;
    }

    public function SetUsuarioApertura($val){
        $this->usuarioApertura=$val;
    }


    public function GetUsuarioUltimaActualizacion(){
        return $this->usuarioUltimaActualizacion;
    }

    public function SetUsuarioUltimaActualizacion($val){
        $this->usuarioUltimaActualizacion=$val;
    }

    public function GetFechaUltimaActualizacion(){
        return $this->fechaUltimaActualizacion;
    }

    public function SetFechaUltimaActualizacion($val){
        $this->fechaUltimaActualizacion=$val;
    }

    public function GetEstado(){
        return $this->estado;
    }

    public function SetEstado($val){
        $this->estado=$val;
    }



}