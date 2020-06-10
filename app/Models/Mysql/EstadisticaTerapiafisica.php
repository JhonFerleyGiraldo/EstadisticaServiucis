<?php

require_once("Conexion.php");

/*
    @autor Jhon Giraldo
    clase encargada del manejo de la tabla estadistica terapia fisica
*/
class EstadisticaTerapiafisica extends Conexion{

    //atributos de la clase
    private $codigo;
    private $codigoIngreso;
    private $fechaInicioFisioterapia;
    private $permeInicial;
    private $claseFuncional;
    private $observacionesFuncionales;
    private $permeFinal;
    private $complicaciones;
    private $transferenciaMaxima;
    private $usuarioApertura;
    private $usuarioUltimaActualizacion;
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
        metodo encargado de insertar nueva estadistica
    */
    public function SetNuevaEstadistica(EstadisticaTerapiafisica $Oestadi){
        try{

            $this->Conectar();

            $consulta=" INSERT INTO tbl_estadistica_terapiafisica VALUES (NULL,:codIngr,:fechaIni,:permeIni,NULL,NULL,NULL,NULL,NULL
                        ,:usuarioApe,:usuarioUltima,'ABIERTO');";
                                                        
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(  ":codIngr"=>$Oestadi->GetCodigoIngreso(),":fechaIni"=>$Oestadi->GetFechaInicioFisioterapia(),":permeIni"=>$Oestadi->GetPermeInicial(),
                                        ":usuarioApe"=>$Oestadi->GetUsuarioApertura(),":usuarioUltima"=>$Oestadi->GetUsuarioUltimaActualizacion()));

            $idEstadistica=$this->conexion->lastInsertId();

            $this->Desconectar();

            return $idEstadistica;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        metodo encargado de consultar datos de la estadistica por ingreso
    */
    public function GetDatosEstadisticaXingreso(EstadisticaTerapiafisica $Oestadi){
        try{

            $this->Conectar();

            $consulta="CALL SP_consultar_estadisticaFisicaXingreso(:codIngr);";
                                                        
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(  ":codIngr"=>$Oestadi->GetCodigoIngreso()));

            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);

            $this->Desconectar();

            return $resultado;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        metodo encargado de consultar transferencias a la alta por fechas
    */
    public function GetTransferenciasAlAltaXfechas($fechaIncio,$fechaFin,$sede){
        try{

            $this->Conectar();

            $consulta="CALL SP_consultar_transferenciaLogradaAlta(:fechaInicio,:fechaFin,:sede);";
                                                        
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(  ":fechaInicio"=>$fechaIncio,":fechaFin"=>$fechaFin,":sede"=>$sede));

            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);

            $this->Desconectar();

            return $resultado;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }


    /*
        @autor Jhon Giraldo
        metodo encargado de consultar perme inicial por fechas
    */
    public function GetPermeInicialXfechas($fechaIncio,$fechaFin,$sede){
        try{

            $this->Conectar();

            $consulta="CALL SP_consultar_permeinicialXfechas(:fechaInicio,:fechaFin,:sede);";
                                                        
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(  ":fechaInicio"=>$fechaIncio,":fechaFin"=>$fechaFin,":sede"=>$sede));

            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);

            $this->Desconectar();

            return $resultado;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }


    /*
        @autor Jhon Giraldo
        metodo encargado de consultar perme  final por fechas
    */
    public function GetPermeFinalXfechas($fechaIncio,$fechaFin,$sede){
        try{

            $this->Conectar();

            $consulta="CALL SP_consultar_permefinalXfechas(:fechaInicio,:fechaFin,:sede);";
                                                        
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(  ":fechaInicio"=>$fechaIncio,":fechaFin"=>$fechaFin,":sede"=>$sede));

            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);

            $this->Desconectar();

            return $resultado;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }


    /*
        @autor Jhon Giraldo
        metodo encargado de actualizar mejor transferencia del paciente en la estadistica
    */
    public function SetActualizarMejorTransferencia(EstadisticaTerapiafisica $Oestadi){
        try{

            $this->Conectar();

            $consulta="CALL SP_actualizar_transferenciaMaxima(:codigo,:transf)";
                                                        
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(  ":codigo"=>$Oestadi->GetCodigo(),":transf"=>$Oestadi->GetTransferenciaMaxima()));

            $this->Desconectar();

            return $registros->rowCount();

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        metodo encargado de actualizar la estadistica
    */
    public function SetActualizarEstadistica(EstadisticaTerapiafisica $Oestadi){
        try{

            $this->Conectar();

            $consulta="CALL SP_actualizar_estadisticaterapiafisica(:codigo,:clase,:obser,:perme,:compli,:transMaxima,:usuario,:estado)";
                                                        
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(  ":codigo"=>$Oestadi->GetCodigo(),":clase"=>$Oestadi->GetClaseFuncional(),":obser"=>$Oestadi->GetObservacionesFuncionales(),
                                        ":perme"=>$Oestadi->GetPermeFinal(),":compli"=>$Oestadi->GetComplicaciones(),":transMaxima"=>$Oestadi->GetTransferenciaMaxima(),":usuario"=>$Oestadi->GetUsuarioUltimaActualizacion(),
                                        ":estado"=>$Oestadi->GetEstado()));

            $this->Desconectar();

            return $registros->rowCount();

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        metodo encargado de mostrar la cantidad de pacientes atendidos por fisioterapia de una sede
        en un rango de fechas
    */
    public function GetCantidadPacientesAtendidos($fechaIncio,$fechaFin,$sede){
        try{

            $this->Conectar();

            $consulta=" SELECT EST.codigoIngreso
                        FROM tbl_estadistica_terapiafisica AS EST INNER JOIN tbl_ingreso AS ING ON EST.codigoIngreso=ING.codigo
                        WHERE ING.sedeAtencion=:sede AND EST.fechaInicioFisioterapia BETWEEN :fechaIni AND :fechaFin";

            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(":sede"=>$sede,":fechaIni"=>$fechaIncio,":fechaFin"=>$fechaFin));

            $this->Desconectar();

            return $registros->rowCount();

        }catch(Exception $e){
            echo "Error : " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        metodo encargado de mostrar la cantidad de pacientes atendidos y que fallecieron en una sede
        y un rango de fechas
    */
    public function GetCantidadPacientesAtendidosFallecidos($fechaIncio,$fechaFin,$sede){
        try{

            $this->Conectar();

            $consulta=" SELECT EST.codigoIngreso
                        FROM tbl_estadistica_terapiafisica AS EST INNER JOIN tbl_ingreso AS ING ON EST.codigoIngreso=ING.codigo
                        WHERE ING.sedeAtencion=:sede AND EST.estado='CERRADO' AND ING.egresoVivo='NO' AND ING.fechaCierre BETWEEN :fechaIni AND :fechaFin";

            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(":sede"=>$sede,":fechaIni"=>$fechaIncio,":fechaFin"=>$fechaFin));

            $this->Desconectar();

            return $registros->rowCount();

        }catch(Exception $e){
            echo "Error : " . $e->getMessage();
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

    public function GetFechaInicioFisioterapia(){
        return $this->fechaInicioFisioterapia;
    }

    public function SetFechaInicioFisioterapia($fech){
        $this->fechaInicioFisioterapia=$fech;
    }


    public function GetPermeInicial(){
        return $this->permeInicial;
    }

    public function SetPermeInicial($per){
        $this->permeInicial=$per;
    }

    public function GetUsuarioApertura(){
        return $this->usuarioApertura;
    }

    public function SetUsuarioApertura($usu){
        $this->usuarioApertura=$usu;
    }

    public function GetUsuarioUltimaActualizacion(){
        return $this->usuarioUltimaActualizacion;
    }

    public function SetUsuarioUltimaActualizacion($usu){
        $this->usuarioUltimaActualizacion=$usu;
    }

    public function GetTransferenciaMaxima(){
        return $this->transferenciaMaxima;
    }

    public function SetTransferenciaMaxima($tra){
        $this->transferenciaMaxima=$tra;
    }

    public function GetClaseFuncional(){
        return $this->claseFuncional;
    }

    public function SetClaseFuncional($cla){
        $this->claseFuncional=$cla;
    }

    public function GetObservacionesFuncionales(){
        return $this->observacionesFuncionales;
    }

    public function SetObservacionesFuncionales($obs){
        $this->observacionesFuncionales=$obs;
    }

    public function GetPermeFinal(){
        return $this->permeFinal;
    }

    public function SetPermeFinal($per){
        $this->permeFinal=$per;
    }


    public function GetComplicaciones(){
        return $this->complicaciones;
    }

    public function SetComplicaciones($com){
        $this->complicaciones=$com;
    }

    public function GetEstado(){
        return $this->estado;
    }

    public function SetEstado($est){
        $this->estado=$est;
    }


}

?>