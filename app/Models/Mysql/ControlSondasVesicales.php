<?php

require_once("Conexion.php");

/*
    @autor Jhon Giraldo
    clase encargada del manejo de la tabla control sondas vesicales
*/
class ControlSondasVesicales extends Conexion{

    //atributos de la clase
    private $codigo;
    private $codigoIngreso;
    private $numeroSonda;
    private $fechaInsercion;
    private $lugarProcedimiento;
    private $enfermero;
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
        metodo encargado de insertar nueva sonda
    */
    public function SetNuevaSonda(ControlSondasVesicales $OctrSonda){
        try{

            $this->Conectar();

            $consulta=" INSERT INTO tbl_ctrl_sondas_vesicales VALUES(NULL,:codIngreso,:numSonda,:fechaInsercion,:lugarProcedimiento,
                        :enfermero,null,null,null,null);";
                                                        
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(  ":codIngreso"=>$OctrSonda->GetCodigoIngreso(),":fechaInsercion"=>$OctrSonda->GetFechaInsercion(),":numSonda"=>$OctrSonda->GetNumeroSonda(),
                                        ":lugarProcedimiento"=>$OctrSonda->GetLugarProcedimiento(),":enfermero"=>$OctrSonda->GetEnfermero()));

            $idCtrlCateter=$this->conexion->lastInsertId();

            $this->Desconectar();

            return $idCtrlCateter;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        metodo encargado de consultar listado de sondas del ingreso
    */
    public function GetListadoSondasVesicalesXingreso($codigoIngreso){
        try{

            $this->Conectar();

            $consulta="CALL SP_consultar_listadoSondasXpaciente(:codIng);";
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
        metodo encargado de consultar listado de sondas por fechas
    */
    public function GetListadoSondasVesicalesXfechas($sede,$fechaInicio,$fechaFin){
        try{

            $this->Conectar();

            $consulta="CALL SP_consultar_listadoSondVesiXfecha(:sede,:inicio,:fin);";
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(':sede'=>$sede,":inicio"=>$fechaInicio,":fin"=>$fechaFin));
            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);

            $this->Desconectar();

            return $resultado;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }


    /*
        @autor Jhon Giraldo
        metodo encargado de retirar el cateter
    */
    public function SetRetirarSonda(ControlSondasVesicales $OctrSonda){

        $this->Conectar();

        $consulta="CALL SP_actualizar_sondaVesical(  :codigo,:ingreso,:fechaRetiro,:motivo,:cultivo,:reporte)";

        $registros=$this->conexion->prepare($consulta);

        $registros->execute(array(  ':codigo'=>$OctrSonda->GetCodigo(),':ingreso'=>$OctrSonda->GetCodigoIngreso(),':fechaRetiro'=>$OctrSonda->GetFechaRetiro(),
                                    ':motivo'=>$OctrSonda->GetMotivoRetiro(),':cultivo'=>$OctrSonda->GetCultivo(),':reporte'=>$OctrSonda->GetReporte()));
        $this->Desconectar();

        //Logger::Log($_SESSION["documentoUsuario"],date("Y-m-d H:i:s"),"RETIRAR SONDA",DBNAMEM,"SP_actualizar_cateter");

        return $registros->rowCount();
    }


    /*
        @autor Jhon Giraldo
        metodo encargado de consultar el cateter por codigo
    */
    public function GetSondarXcodigo(ControlSondasVesicales $OctrSonda){
        try{

            $this->Conectar();

            $consulta="CALL SP_consultar_sondaXcodigo(:codSonda,:codIngreso);";
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(':codSonda'=>$OctrSonda->GetCodigo(),':codIngreso'=>$OctrSonda->GetCodigoIngreso()));
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

    public function GetNumeroSonda(){
        return $this->numeroSonda;
    }

    public function SetNumeroSonda($num){
        $this->numeroSonda=$num;
    }

    public function GetFechaInsercion(){
        return $this->fechaInsercion;
    }

    public function SetFechaInsercion($fech){
        $this->fechaInsercion=$fech;
    }

    public function GetLugarProcedimiento(){
        return $this->lugarProcedimiento;
    }

    public function SetLugarProcedimiento($lug){
        $this->lugarProcedimiento=$lug;
    }

    public function GetEnfermero(){
        return $this->enfermero;
    }

    public function SetEnfermero($enf){
        $this->enfermero=$enf;
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

    public function SetCultivo($cult){
        $this->cultivo=$cult;
    }

    public function GetReporte(){
        return $this->reporte;
    }

    public function SetReporte($rep){
        $this->reporte=$rep;
    }

}

?>