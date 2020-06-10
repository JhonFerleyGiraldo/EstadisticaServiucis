<?php

require_once("Conexion.php");

/*
    @autor Jhon Giraldo
    clase encargada del manejo de la tabla fuerza egreso
*/
class FuerzaEgreso extends Conexion{

    //atributos de la clase
    private $codigo;
    private $estadistica;
    //MSD
    private $MSDabdhom;
    private $MSDflecod;
    private $MSDextmun;
    //MSI
    private $MSIabdhom;
    private $MSIflecod;
    private $MSIextmun;
    //MID
    private $MIDflexcad;
    private $MIDextrod;
    private $MIDdorsi;
    //MII
    private $MIIflexcad;
    private $MIIextrod;
    private $MIIdorsi;

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
        metodo encargado de consultar las fuerzas de egreso para reporte
    */
    public function GetConsultarFuerzasEgresoXfechas($fechaInicio,$fechaFin,$sede){
        try{
            $this->Conectar();

            $consulta="CALL SP_consultar_fuerzasdeegresoXfechas(:fechaInicio,:fechaFin,:sede)";
                                                        
            $registros=$this->conexion->prepare($consulta);
   
            $registros->execute(array(  ':fechaInicio'=>$fechaInicio,':fechaFin'=>$fechaFin,':sede'=>$sede));
            
            
            //Logger::Log($_SESSION["documentoUsuario"],date("Y-m-d H:i:s"),"INSERTAR NUEVA ESTANCIA",DBNAMEM,"SP_insertar_nuevaEstancia");

            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);

            $this->Desconectar();

            return  $resultado;

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

    public function SetEstadistica($esta){
        $this->estadistica=$esta;
    }

    public function GetEstadistica(){
        return $this->estadistica;
    }


    public function SetMSDabdhom($val){
        $this->MSDabdhom=$val;
    }

    public function GetMSDabdhom(){
        return $this->MSDabdhom;
    }

    public function SetMSDflecod($val){
        $this->MSDflecod=$val;
    }

    public function GetMSDflecod(){
        return $this->MSDflecod;
    }


    public function SetMSDextmun($val){
        $this->MSDextmun=$val;
    }

    public function GetMSDextmun(){
        return $this->MSDextmun;
    }


    public function SetMSIabdhom($val){
        $this->MSIabdhom=$val;
    }

    public function GetMSIabdhom(){
        return $this->MSIabdhom;
    }

    public function SetMSIflecod($val){
        $this->MSIflecod=$val;
    }

    public function GetMSIflecod(){
        return $this->MSIflecod;
    }


    public function SetMSIextmun($val){
        $this->MSIextmun=$val;
    }

    public function GetMSIextmun(){
        return $this->MSIextmun;
    }

    public function SetMIDflexcad($val){
        $this->MIDflexcad=$val;
    }

    public function GetMIDflexcad(){
        return $this->MIDflexcad;
    }

    public function SetMIDextrod($val){
        $this->MIDextrod=$val;
    }

    public function GetMIDextrod(){
        return $this->MIDextrod;
    }

    public function SetMIDdorsi($val){
        $this->MIDdorsi=$val;
    }

    public function GetMIDdorsi(){
        return $this->MIDdorsi;
    }

    public function SetMIIflexcad($val){
        $this->MIIflexcad=$val;
    }

    public function GetMIIflexcad(){
        return $this->MIIflexcad;
    }

    public function SetMIIextrod($val){
        $this->MIIextrod=$val;
    }

    public function GetMIIextrod(){
        return $this->MIIextrod;
    }

    public function SetMIIdorsi($val){
        $this->MIIdorsi=$val;
    }

    public function GetMIIdorsi(){
        return $this->MIIdorsi;
    }

}