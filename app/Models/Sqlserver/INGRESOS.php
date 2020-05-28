<?php

//se incluye conexion sqlserver
require_once("ConexionSqlsrv.php");

    /*
        @autor Jhon Giraldo
        Clase encargada de consultar ingresos de hosvital
    */
class INGRESOS extends ConexionSqlsrv{

    public function __construct(){

    }

    /*
        @autor Jhon Giraldo
        metodo encargado de consultar los datos basicos del paciente desde HOSVITAL
    */
    public function GetDatosBasicosIngresoXpaciente($tipoDoc,$documento,$numIngreso){
        try{

            $this->Conectar();
            $consulta=" 
                        DECLARE @documento VARCHAR(20);
                        DECLARE @tipoDoc VARCHAR(4);
                        DECLARE @numIngreso INT;
                        
                        SET @documento=?;
                        SET @tipoDoc=?;
                        SET @numIngreso=?;
                        
                        SELECT	CAP.MPTDoc AS 'tipoDoc',
                        CAP.MPCedu AS 'documento',
                        ING.IngCsc AS 'numIngreso',
                        CAP.MPNom1 AS 'primerNombre',
                        CAP.MPNom2 AS 'segundoNombre',
                        CAP.MPApe1 AS 'primerApellido',
                        CAP.MPApe2 AS 'segundoApellido',
                        CAP.MPSexo AS 'genero',
                        CAP.MPFchN AS 'fechaNacimiento',
                        ING.IngFecAdm AS 'fechaIngreso',
                        PAB.MPCodP AS 'codigoPabellonIngreso',
                        PAB.MPNomP AS 'pabellonIngreso',
                        PAB.MPMCDpto AS 'codigoSedeIngreso',
                        PAB.MPMCDnom AS 'sedeIngreso',
                        (	SELECT ING.IngEntDx
                            FROM INGRESOS AS ING INNER JOIN MAEDIA AS MAE ON MAE.DMCodi=ING.IngEntDx
                            WHERE ING.MPCedu =@documento AND ING.MPTDoc=@tipoDoc and ING.IngCsc=@numIngreso) AS 'codDxIng1',
                        (	SELECT MAE.DMNomb
                            FROM INGRESOS AS ING INNER JOIN MAEDIA AS MAE ON MAE.DMCodi=ING.IngEntDx
                            WHERE ING.MPCedu =@documento AND ING.MPTDoc=@tipoDoc and ING.IngCsc=@numIngreso) AS 'nomDxIng1',
                        (	SELECT ING.IngEntDx2
                            FROM INGRESOS AS ING INNER JOIN MAEDIA AS MAE ON MAE.DMCodi=ING.IngEntDx2
                            WHERE ING.MPCedu =@documento AND ING.MPTDoc=@tipoDoc and ING.IngCsc=@numIngreso) AS 'codDxIng2',
                        (	SELECT MAE.DMNomb
                            FROM INGRESOS AS ING INNER JOIN MAEDIA AS MAE ON MAE.DMCodi=ING.IngEntDx2
                            WHERE ING.MPCedu =@documento AND ING.MPTDoc=@tipoDoc and ING.IngCsc=@numIngreso) AS 'nomDxIng2'
                        FROM	INGRESOS AS ING INNER JOIN CAPBAS AS CAP ON CAP.MPTDoc=ING.MPTDoc AND CAP.MPCedu=ING.MPCedu
                                INNER JOIN MAEPAB AS PAB ON PAB.MPCodP=ING.MPCodP
                        WHERE CAP.MPTDoc=@tipoDoc AND CAP.MPCedu=@documento AND ING.IngCsc=@numIngreso
           ";
           
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array($documento,$tipoDoc,$numIngreso));
            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);
            $this->Desconectar();

            return $resultado;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        } 
    }

}

?>