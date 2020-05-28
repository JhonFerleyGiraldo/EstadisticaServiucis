<?php

require_once("Conexion.php");

/*
    @autor Jhon Giraldo
    clase encargada del manejo de la tabla control cateteres
*/
class ControlCateteres extends Conexion{

    //atributos de la clase
    private $codigo;
    private $codigoIngreso;
    private $fechaInsercion;
    private $tipoCateter;
    private $ubicacionAnatomica;
    private $lugarProcedimiento;
    private $medico;
    private $enfermero;
    private $numeroPunciones;
    private $fechaRetiro;
    private $motivoRetiro;
    private $cultivo;
    private $reporte;

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
        metodo encargado de consultar listado de cateteres del ingreso
    */
    public function GetListadoCateteresXingreso($codigoIngreso){
        try{

            $this->Conectar();

            $consulta="CALL SP_consultar_listadoCateteresPaciente(:codIng);";
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(':codIng'=>$codigoIngreso));
            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);

            $this->Desconectar();

            return $resultado;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        metodo encargado de consultar listado de cateteres den un rango de fecha
    */
    public function GetListadoCateteresXfechas($fechaInicio,$fechaFin,$sede){
        try{

            $this->Conectar();

            $consulta="CALL SP_consultar_listadoCateteresXfecha(:fechaInicio,:fechaFin,:sede);";
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
        metodo encargado de insertar nuevo cateter
    */
    public function SetNuevoCateter(ControlCateteres $OctrCateter){
        try{

            $this->Conectar();

            
            $consulta=" INSERT INTO tbl_ctrl_cateteres VALUES(NULL,:codIngreso,:fechaInsercion,:tipoCateter,:ubiAnatomica,:lugarProcedimiento,
                        :medico,:enfermero,:numPunciones,null,null,null,null);";
                                                        
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(  ":codIngreso"=>$OctrCateter->GetCodigoIngreso(),":fechaInsercion"=>$OctrCateter->GetFechaInsercion(),":tipoCateter"=>$OctrCateter->GetTipoCateter(),
                                        ":ubiAnatomica"=>$OctrCateter->GetUbicacionAnatomica(),":lugarProcedimiento"=>$OctrCateter->GetLugarProcedimiento(),
                                        ":medico"=>$OctrCateter->GetMedico(),":enfermero"=>$OctrCateter->GetEnfermero(),":numPunciones"=>$OctrCateter->GetNumeroPunciones()));

            $idCtrlCateter=$this->conexion->lastInsertId();

            $this->Desconectar();

            return $idCtrlCateter;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        metodo encargado de retirar el cateter
    */
    public function SetRetirarCateter(ControlCateteres $OctrCateter){
        try{
            $this->Conectar();

            $consulta="CALL SP_actualizar_cateter(  :codigo,:ingreso,:fechaRetiro,:motivo,:cultivo,:reporte)";

            $registros=$this->conexion->prepare($consulta);

            $registros->execute(array(  ':codigo'=>$OctrCateter->GetCodigo(),':ingreso'=>$OctrCateter->GetCodigoIngreso(),':fechaRetiro'=>$OctrCateter->GetFechaRetiro(),
                                        ':motivo'=>$OctrCateter->GetMotivoRetiro(),':cultivo'=>$OctrCateter->GetCultivo(),':reporte'=>$OctrCateter->GetReporte()));
            $this->Desconectar();

            //Logger::Log($_SESSION["documentoUsuario"],date("Y-m-d H:i:s"),"RETIRAR CATETER",DBNAMEM,"SP_actualizar_cateter");

            return $registros->rowCount();

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        metodo encargado de consultar el cateter por codigo
    */
    public function GetCateterXcodigo(ControlCateteres $OctrCateter){
        try{

            $this->Conectar();

            $consulta="CALL SP_consultar_cateterXcodigo(:codCateter,:codIngreso);";
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(':codCateter'=>$OctrCateter->GetCodigo(),':codIngreso'=>$OctrCateter->GetCodigoIngreso()));
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

    public function GetCodigoIngreso(){
        return $this->codigoIngreso;
    }

    public function SetCodigoIngreso($cod){
        $this->codigoIngreso=$cod;
    }

    public function GetFechaInsercion(){
        return $this->fechaInsercion;
    }

    public function SetFechaInsercion($fech){
        $this->fechaInsercion=$fech;
    }

    public function GetTipoCateter(){
        return $this->tipoCateter;
    }

    public function SetTipoCateter($tipo){
        $this->tipoCateter=$tipo;
    }

    public function GetUbicacionAnatomica(){
        return $this->ubicacionAnatomica;
    }

    public function SetUbicacionAnatomica($ubi){
        $this->ubicacionAnatomica=$ubi;
    }

    public function GetLugarProcedimiento(){
        return $this->lugarProcedimiento;
    }

    public function SetLugarProcedimiento($lugar){
        $this->lugarProcedimiento=$lugar;
    }

    public function GetMedico(){
        return $this->medico;
    }

    public function SetMedico($med){
        $this->medico=$med;
    }

    public function GetEnfermero(){
        return $this->enfermero;
    }

    public function SetEnfermero($enfer){
        $this->enfermero=$enfer;
    }

    public function GetNumeroPunciones(){
        return $this->numeroPunciones;
    }

    public function SetNumeroPunciones($num){
        $this->numeroPunciones=$num;
    }

    public function GetFechaRetiro(){
        return $this->fechaRetiro;
    }

    public function SetFechaRetiro($fech){
        $this->fechaRetiro=$fech;
    }


    public function GetMotivoRetiro(){
        return $this->motivoRetiro;
    }

    public function SetMotivoRetiro($mot){
        $this->motivoRetiro=$mot;
    }

    public function GetCultivo(){
        return $this->cultivo;
    }

    public function SetCultivo($cul){
        $this->cultivo=$cul;
    }

    public function GetReporte(){
        return $this->reporte;
    }

    public function SetReporte($rep){
        $this->reporte=$rep;
    }

}

?>