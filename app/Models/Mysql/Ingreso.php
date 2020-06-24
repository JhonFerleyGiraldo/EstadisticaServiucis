<?php

require_once("Conexion.php");

/*
    @autor Jhon Giraldo
    clase encargada del manejo de la tabla ingreso
*/
class Ingreso extends Conexion{

    //atributos de la clase
    private $codigo;
    private $historiaClinica;
    private $codigoIngresoPaciente;
    private $fechaIngreso;
    private $sedeAtencion;
    private $codigoDx1Ingreso;
    private $dx1Ingreso;
    private $codigoDx2Ingreso;
    private $dx2Ingreso;
    private $apache2;
    private $mortPredicha;
    private $sofa;
    private $cama;
    private $estadoIngreso;
    private $egresoVivo;
    private $lugarEgreso;
    private $nombreHospital;
    private $usuarioDelCierre;
    private $fechaCierre;
    private $usuarioDelIngreso;
    private $fechaIngresoUci;
    private $fechaIngresoUce;

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
        metodo encargado de consultar listado de pacientes
    */
    public function GetListadoPacientes($sede){
        try{

            $this->Conectar();

            $consulta="CALL SP_consultar_listadoPacientes(:sede);";
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(':sede'=>$sede));
            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);

            $this->Desconectar();

            return $resultado;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }


    /*
        @autor Jhon Giraldo
        metodo encargado de consultar listado de ingresos por fecha
    */
    public function GetListadoIngresosXfecha($sede,$fechaInicio,$fechaFin){
        try{

            $this->Conectar();

            $consulta="CALL SP_consultar_listadoIngresosXfecha(:sede,:fechaInicio,:fechaFin);";
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(':sede'=>$sede,':fechaInicio'=>$fechaInicio,':fechaFin'=>$fechaFin));
            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);

            $this->Desconectar();

            return $resultado;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }


    /*
        @autor Jhon Giraldo
        metodo encargado de consultar listado de pacientes de fisioterapia
    */
    public function GetListadoPacientesFisioterapia($sede){
        try{

            $this->Conectar();

            $consulta="CALL SP_consultar_listadoPacientesFisioterapia(:sede);";
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(':sede'=>$sede));
            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);

            $this->Desconectar();

            return $resultado;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }


    /*
        @autor Jhon Giraldo
        metodo encargado de consultar listado de pacientes de terapia respiratoria
    */
    public function GetListadoPacientesTerapiaRespiratoria($sede){
        try{

            $this->Conectar();

            $consulta="CALL SP_consultar_listadoPacientesTerapiaRespiratoria(:sede);";
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(':sede'=>$sede));
            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);

            $this->Desconectar();

            return $resultado;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        metodo encargado de consultar listado de pacientes que estan en cama y no han egresado
    */
    public function GetListadoPacientesEnCama($sede){
        try{

            $this->Conectar();

            $consulta="CALL SP_consultar_listadoPacientesEnCama(:sede);";
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(':sede'=>$sede));
            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);

            $this->Desconectar();

            return $resultado;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        metodo encargado de consultar el ingreso por paciente
    */
    public function GetIngresoPorPaciente(Ingreso $Oingreso){
        try{
            $this->Conectar();

            $consulta="CALL SP_consultar_ingresoPorPaciente(:historiaClinica,:numIngreso);";
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(':historiaClinica'=>$Oingreso->GetNumeroHistoriaClinica(),':numIngreso'=>$Oingreso->GetCodigoIngresoPaciente()));
            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);

            $this->Desconectar();

            return $resultado;
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }


    /*
        @autor Jhon Giraldo
        metodo encargado de insertar el ingreso de paciente
    */
    public function SetInsertarIngresoDePaciente(Ingreso $Oingreso){
        try{

            $this->Conectar();

            $consulta=" INSERT INTO tbl_ingreso VALUES(NULL,:historiaClinica,:codigoIngresoPaciente,:fechaIngreso,:sedeAtencion,NULL,NULL,NULL,NULL,NULL,
                        :codigoDx1Ingreso,:dx1Ingreso,:codigoDx2Ingreso,:dx2Ingreso,'ABIERTO',NULL,NULL,NULL,NULL,:usuarioIngreso)";

            $registros=$this->conexion->prepare($consulta);
            
            $registros->execute(array(  ':historiaClinica'=>$Oingreso->GetNumeroHistoriaClinica(),':codigoIngresoPaciente'=>$Oingreso->GetCodigoIngresoPaciente(),
                                        ':fechaIngreso'=>$Oingreso->GetFechaIngreso(),':sedeAtencion'=>$Oingreso->GetSedeAtencion(),
                                        ':codigoDx1Ingreso'=>$Oingreso->GetCodigoDx1Ingreso(),':dx1Ingreso'=>$Oingreso->GetDx1Ingreso(),
                                        ':usuarioIngreso'=>$Oingreso->GetUsuarioDelIngreso(),':codigoDx2Ingreso'=>$Oingreso->GetCodigoDx2Ingreso(),':dx2Ingreso'=>$Oingreso->GetDx2Ingreso()));
                                    
            $idIngreso=$this->conexion->lastInsertId();

            $this->Desconectar();

            Logger::Log($_SESSION["documentoUsuario"],date("Y-m-d H:i:s"),"INSERTAR INGRESO DE PACIENTE",DBNAMEM,"tbl_ingreso");

            return $idIngreso;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        metodo encargado de validar si existe el ingreso de un paciente en la bd local
    */
    public function GetValidarSiExisteIngresoDePaciente($documento,$numIngreso){
        try{

            $this->Conectar();

            $consulta=" SELECT * 
                        FROM tbl_ingreso
                        WHERE historiaClinica=:documento AND codigoIngresoPaciente=:numIngreso";
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(":documento"=>$documento,":numIngreso"=>$numIngreso));

            $this->Desconectar();

            return $registros->rowCount();

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        metodo encargado de actualizar el ingreso lo que le toca al medico
    */
    public function SetMedicoActualizaIngreso(Ingreso $Oingreso){
        try{

            $this->Conectar();

            $consulta="CALL SP_actualizar_ingresoMedico(:hc,:numIng,:apac,:mortPre,:sof)";
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(  ":hc"=>$Oingreso->GetNumeroHistoriaClinica(),":numIng"=>$Oingreso->GetCodigoIngresoPaciente(),
                                        ":apac"=>$Oingreso->GetApache2(),":mortPre"=>$Oingreso->GetMortalidadPredicha(),":sof"=>$Oingreso->GetSofa()));

            $this->Desconectar();

            return $registros->rowCount();

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        metodo encargado de actualizar el ingreso lo que le toca a enfermeria
    */
    public function SetEnfermeriaActualizaIngreso(Ingreso $Oingreso){
        try{

            $this->Conectar();

            $consulta="CALL SP_actualizar_ingresoEnfermeria(:hc,:numIng,:cama,:estadoIngreso,:egresoVivo,:lugarEgreso,:fechaCierre,:usuarioCierre,:nombreHospital)";
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(  ":hc"=>$Oingreso->GetNumeroHistoriaClinica(),":numIng"=>$Oingreso->GetCodigoIngresoPaciente(),
                                        ":cama"=>$Oingreso->GetCama(),":estadoIngreso"=>$Oingreso->GetEstadoIngreso(),":egresoVivo"=>$Oingreso->GetEgresoVivo(),
                                        ":lugarEgreso"=>$Oingreso->GetLugarEgreso(),":fechaCierre"=>$Oingreso->GetFechaCierre(),":usuarioCierre"=>$Oingreso->GetUsuarioCierre(),":nombreHospital"=>$Oingreso->GetNombreHospital()));

            $this->Desconectar();

            return $registros->rowCount();

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        metodo encargado de validar si la cama esta ocupada
    */
    public function GetValidarSiCamaOcupada($cama,$sede){
        try{

            $this->Conectar();

            $consulta="SELECT * FROM tbl_ingreso WHERE cama=:cama AND estadoIngreso='ABIERTO' AND sedeAtencion=:sede";
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array( ":cama"=>$cama,":sede"=>$sede));
            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);
            $this->Desconectar();

            return $resultado;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    //metodos getter y setter

    public function SetNumeroHistoriaClinica($numhc){
        $this->historiaClinica=$numhc;
    }

    public function GetNumeroHistoriaClinica(){
        return $this->historiaClinica;
    }

    public function SetCodigoIngresoPaciente($ingre){
        $this->codigoIngresoPaciente=$ingre;
    }

    public function GetCodigoIngresoPaciente(){
        return $this->codigoIngresoPaciente;
    }

    public function SetFechaIngreso($fecha){
        $this->fechaIngreso=$fecha;
    }

    public function GetFechaIngreso(){
        return $this->fechaIngreso;
    }

    public function SetSedeAtencion($sede){
        $this->sedeAtencion=$sede;
    }

    public function GetSedeAtencion(){
        return $this->sedeAtencion;
    }

    public function SetCodigoDx1Ingreso($codigo){
        $this->codigoDx1Ingreso=$codigo;
    }

    public function GetCodigoDx1Ingreso(){
        return $this->codigoDx1Ingreso;
    }

    public function SetDx1Ingreso($dx1){
        $this->dx1Ingreso=$dx1;
    }

    public function GetDx1Ingreso(){
        return $this->dx1Ingreso;
    }

    public function SetCodigoDx2Ingreso($codigo){
        $this->codigoDx2Ingreso=$codigo;
    }

    public function GetCodigoDx2Ingreso(){
        return $this->codigoDx2Ingreso;
    }

    public function SetDx2Ingreso($dx2){
        $this->dx2Ingreso=$dx2;
    }

    public function GetDx2Ingreso(){
        return $this->dx2Ingreso;
    }

    public function SetUsuarioDelIngreso($usuario){
        $this->usuarioDelIngreso=$usuario;
    }

    public function GetUsuarioDelIngreso(){
        return $this->usuarioDelIngreso;
    }

    public function SetFechaIngresoUci($fecha){
        $this->fechaIngresoUci=$fecha;
    }

    public function GetFechaIngresoUci(){
        return $this->fechaIngresoUci;
    }

    public function SetFechaIngresoUce($fecha){
        $this->fechaIngresoUce=$fecha;
    }

    public function GetFechaIngresoUce(){
        return $this->fechaIngresoUce;
    }

    public function SetApache2($apac){
        $this->apache2=$apac;
    }

    public function GetApache2(){
        return $this->apache2;
    }

    public function SetMortalidadPredicha($mort){
        $this->mortPredicha=$mort;
    }

    public function GetMortalidadPredicha(){
        return $this->mortPredicha;
    }

    public function SetSofa($sof){
        $this->sofa=$sof;
    }

    public function GetSofa(){
        return $this->sofa;
    }

    public function SetCama($cam){
        $this->cama=$cam;
    }

    public function GetCama(){
        return $this->cama;
    }

    public function SetEstadoIngreso($estado){
        $this->estadoIngreso=$estado;
    }

    public function GetEstadoIngreso(){
        return $this->estadoIngreso;
    }

    public function SetEgresoVivo($evivo){
        $this->egresoVivo=$evivo;
    }

    public function GetEgresoVivo(){
        return $this->egresoVivo;
    }

    public function SetLugarEgreso($legreso){
        $this->lugarEgreso=$legreso;
    }

    public function GetLugarEgreso(){
        return $this->lugarEgreso;
    }

    public function SetNombreHospital($nom){
        $this->nombreHospital=$nom;
    }

    public function GetNombreHospital(){
        return $this->nombreHospital;
    }

    public function SetFechaCierre($fech){
        $this->fechaCierre=$fech;
    }

    public function GetFechaCierre(){
        return $this->fechaCierre;
    }

    public function SetUsuarioCierre($usuario){
        $this->usuarioDelCierre=$usuario;
    }

    public function GetUsuarioCierre(){
        return $this->usuarioDelCierre;
    }

    public function SetCodigo($cod){
        $this->codigo=$cod;
    }

    public function GetCodigo(){
        return $this->codigo;
    }

}

?>