<?php

require_once("Conexion.php");
require_once("app/Logs/Logger.php");

/*
    @autor Jhon Giraldo
    clase encargada del manejo de la tabla estancia
*/
class Estancia extends Conexion{

    //atributos de clase
    private $codigo;
    private $fechaIngreso;
    private $fechaEgreso;
    private $tipoServicio;
    private $numIngreso;

    public function __construct(){
        try{
                 
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        } 
    }

    /*
        @autor Jhon Giraldo
        metodo encargado de insertar nueva estancia
    */
    public function SetNuevaEstancia(Estancia $Oestancia){
        try{
            $this->Conectar();

            $consulta="CALL SP_insertar_nuevaEstancia(    :fechaIngreso,:tipoServicio,:numIngreso)";
            $registros=$this->conexion->prepare($consulta);
   
            $registros->execute(array(':fechaIngreso'=>$Oestancia->GetFechaIngreso(),':tipoServicio'=>$Oestancia->GetTipoServicio(),':numIngreso'=>$Oestancia->GetNumIngreso()));
            
            $this->Desconectar();

            Logger::Log($_SESSION["documentoUsuario"],date("Y-m-d H:i:s"),"INSERTAR NUEVA ESTANCIA",DBNAMEM,"SP_insertar_nuevaEstancia");

            return  $registros->rowCount();

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        metodo encargado de consultar estancias por ingreso
    */
    public function GetConsultarEstanciasPorIngreso($Oestancia){
        try{
            $this->Conectar();

            $consulta="SELECT * FROM tbl_estancia WHERE numIngreso=:numingreso";
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(':numingreso'=>$Oestancia->GetNumIngreso()));
            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);

            $this->Desconectar();

            return $resultado;
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        metodo encargado de consultar estancias por ingreso
    */
    public function GetConsultarReporteEstanciasIngreso($numIng){
        try{
            $this->Conectar();

            $consulta="CALL SP_consultarReporteEstanciasIngreso(:numingreso)";
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(':numingreso'=>$numIng));
            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);

            $this->Desconectar();

            return $resultado;
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        metodo encargado de cerrar estancia
    */
    public function SetCerrarEstancia(Estancia $Oestancia){
        try{
            $this->Conectar();

            $consulta="CALL SP_actualizar_cierreEstancia( :fechaEgreso,:numIngreso)";
            $registros=$this->conexion->prepare($consulta);
   
            $registros->execute(array(':fechaEgreso'=>$Oestancia->GetFechaEgreso(),':numIngreso'=>$Oestancia->GetNumIngreso()));
            
            $this->Desconectar();

            Logger::Log($_SESSION["documentoUsuario"],date("Y-m-d H:i:s"),"CERRAR ESTANCIA",DBNAMEM,"SP_actualizar_cierreEstancia");

            return  $registros->rowCount();

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        metodo encargado de consultar estancias sin cerrar del ingreso
    */
    public function GetEstanciaSinCerrarPorIngreso(Estancia $Oestancia){
        try{
            $this->Conectar();

            $consulta="SELECT * FROM tbl_estancia WHERE numIngreso=:numIngreso AND fechaEgreso IS NULL";
            $registros=$this->conexion->prepare($consulta);
   
            $registros->execute(array(':numIngreso'=>$Oestancia->GetNumIngreso()));
            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);
            $this->Desconectar();

            Logger::Log($_SESSION["documentoUsuario"],date("Y-m-d H:i:s"),"CERRAR ESTANCIA",DBNAMEM,"SP_actualizar_cierreEstancia");

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

    public function SetFechaIngreso($fecha){
        $this->fechaIngreso=$fecha;
    }

    public function GetFechaIngreso(){
        return $this->fechaIngreso;
    }

    public function SetFechaEgreso($fecha){
        $this->fechaEgreso=$fecha;
    }

    public function GetFechaEgreso(){
        return $this->fechaEgreso;
    }

    public function SetTipoServicio($tipo){
        $this->tipoServicio=$tipo;
    }

    public function GetTipoServicio(){
        return $this->tipoServicio;
    }

    public function SetNumIngreso($numIng){
        $this->numIngreso=$numIng;
    }

    public function GetNumIngreso(){
        return $this->numIngreso;
    }

}

?>