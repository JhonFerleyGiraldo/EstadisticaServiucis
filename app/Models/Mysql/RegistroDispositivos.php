<?php

require_once("Conexion.php");

/*
    @autor Jhon Giraldo
    clase encargada manejar la tabla registro dispositivos
*/
class RegistroDispositivos extends Conexion{

    //atributos de clase
    private $codigo;
    private $fecha;
    private $numeroPacientes;
    private $cvc;
    private $sv;
    private $vm;
    private $cvp;
    private $enfermero;
    private $sede;

    /*
        @autor Jhon Giraldo
        contructor vacio
    */
    public function __construct(){
        try{
                 
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        } 
    }


    /*
        @autor Jhon Giraldo
        metodo encargado de consultar listado de pacientes
    */
    public function GetListadoRegistroDispositivos($sede){
        try{

            $this->Conectar();

            $consulta="CALL SP_consultar_listadoRegistroDispositivos(:sede);";
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(':sede'=>$sede));
            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);

            $this->Desconectar();

            return $resultado;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public function GetListadoRegistroDispositivosXfecha($fechaInicio,$fechaFin,$sede){
        try{

            $this->Conectar();

            $consulta="CALL SP_consultar_listadoRegistroDispositivosXfecha(:fechaInicio,:fechaFin,:sede);";
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(':fechaInicio'=>$fechaInicio,':fechaFin'=>$fechaFin,':sede'=>$sede));
            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);

            $this->Desconectar();

            return $resultado;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        metodo encargado de consultar listado de pacientes
    */
    public function GetUltimoRegistroDispositivos(RegistroDispositivos $OregistroDis){
        try{

            $this->Conectar();

            $consulta="CALL SP_consultar_ultimoRegistroDispoXsedeXfecha(:sede);";
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(':sede'=>$OregistroDis->GetSede()));
            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);

            $this->Desconectar();

            return $resultado;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    

    /*
        @autor Jhon Giraldo
        agrega nuevo registro de dispositivo
    */
    public function SetNuevoRegistroDispositivo(RegistroDispositivos $OregistroDis){
        try{
            $this->Conectar();

            $consulta="CALL SP_insertar_nuevoRegistroDispositivos(:fecha,:numPac,:cvc,:sv,:vm,:cvp,:enfermero,:sede)";

            $registros=$this->conexion->prepare($consulta);

            $registros->execute(array(  ':fecha'=>$OregistroDis->GetFecha(),':numPac'=>$OregistroDis->GetNumeroPacientes(),':cvc'=>$OregistroDis->GetCvc(),
                                        ':sv'=>$OregistroDis->GetSv(),':vm'=>$OregistroDis->GetVm(),':cvp'=>$OregistroDis->GetCvp(),
                                        ':enfermero'=>$OregistroDis->GetEnfermero(),':sede'=>$OregistroDis->GetSede()));
            $this->Desconectar();

            return $registros->rowCount();

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    //metodos getter y setter
    public function Getcodigo(){
        return $this->codigo;
    }

    public function SetCodigo($cod){
        $this->codigo=$cod;
    }

    public function GetFecha(){
        return $this->fecha;
    }

    public function SetFecha($fech){
        $this->fecha=$fech;
    }

    public function GetNumeroPacientes(){
        return $this->numeroPacientes;
    }

    public function SetNumeroPacientes($num){
        $this->numeroPacientes=$num;
    }

    public function GetCvc(){
        return $this->cvc;
    }

    public function SetCvc($cv){
        $this->cvc=$cv;
    }

    public function GetSv(){
        return $this->sv;
    }

    public function SetSv($s){
        $this->sv=$s;
    }

    public function GetVm(){
        return $this->vm;
    }

    public function SetVm($v){
        $this->vm=$v;
    }

    public function GetCvp(){
        return $this->cvp;
    }

    public function SetCvp($cv){
        $this->cvp=$cv;
    }

    public function GetEnfermero(){
        return $this->enfermero;
    }

    public function SetEnfermero($enf){
        $this->enfermero=$enf;
    }

    public function GetSede(){
        return $this->sede;
    }

    public function SetSede($sed){
        $this->sede=$sed;
    }

}