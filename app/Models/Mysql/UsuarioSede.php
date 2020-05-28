<?php

require_once("Conexion.php");

/*
    @autor Jhon Giraldo
    clase encargada del manejo de la tabla usuario sedes
*/
class UsuarioSede extends Conexion{
    

    //atributos de clase
    private $codigoUsuario;
    private $codigoSede;
    private $estado;

    public function __construct(){
        try{
                 
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        metodo encargado de consultar las sedes activas del usuario
    */
    public function GetSedesUsuario($usuario){
        try{
            
            $this->Conectar();
            $consulta=" SELECT 	SEDUSU.codigoUsuario,
                                SEDUSU.codigoSede,
                                SED.nombre,
                                SEDUSU.estado
                        FROM tbl_usuario_sede AS SEDUSU INNER JOIN tbl_sede AS SED ON SED.codigo=SEDUSU.codigoSede
                        WHERE codigoUsuario=:usuario AND estado='S' ";
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(':usuario'=>$usuario));
            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);
            $this->Desconectar();

            return $resultado;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }


    /*
        @autor Jhon Giraldo
        inserta la sede a un usuario
    */
    public function SetInsertarSedeUsuario(UsuarioSede $OusuarioSede){
        try{
            $this->Conectar();

            $consulta="CALL SP_insertar_sedeXusuario(  :codUsuario,:codSede,:estado)";

            $registros=$this->conexion->prepare($consulta);

            $registros->execute(array(  ':codUsuario'=>$OusuarioSede->GetCodigoUsuario(),':codSede'=>$OusuarioSede->GetCodigoSede(),':estado'=>$OusuarioSede->GetEstado()));
            $this->Desconectar();

            //Logger::Log($_SESSION["documentoUsuario"],date("Y-m-d H:i:s"),"RETIRAR CATETER",DBNAMEM,"SP_actualizar_cateter");

            return $registros->rowCount();

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        actualiza el estado de la sede del usuario
    */
    public function SetActualizarEstadoSedeUsuario(UsuarioSede $OusuarioSede){
        try{
            $this->Conectar();

            $consulta="CALL SP_actualizar_estadosedeusuario(  :codUsuario,:codSede,:estado)";

            $registros=$this->conexion->prepare($consulta);

            $registros->execute(array(  ':codUsuario'=>$OusuarioSede->GetCodigoUsuario(),':codSede'=>$OusuarioSede->GetCodigoSede(),':estado'=>$OusuarioSede->GetEstado()));
            $this->Desconectar();

            //Logger::Log($_SESSION["documentoUsuario"],date("Y-m-d H:i:s"),"RETIRAR CATETER",DBNAMEM,"SP_actualizar_cateter");

            return $registros->rowCount();

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }


    /*
        @autor Jhon Giraldo
        consulta las sedes del usuario
    */
    public function GetSedesXusuario(UsuarioSede $OusuarioSede){
        try{  
            $this->Conectar();
            $consulta="CALL SP_consultar_sedesXusuario(:codUsuario)";  

            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(":codUsuario"=>$OusuarioSede->GetCodigoUsuario()));
            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);

            $this->Desconectar();

            return $resultado;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }


    //metodos getter y setter
    public function SetCodigoUsuario($cod){
        $this->codigoUsuario=$cod;
    }

    public function GetCodigoUsuario(){
       return  $this->codigoUsuario;
    }

    public function SetCodigoSede($cod){
        $this->codigoSede=$cod;
    }

    public function GetCodigoSede(){
       return  $this->codigoSede;
    }

    public function SetEstado($est){
        $this->estado=$est;
    }

    public function GetEstado(){
       return  $this->estado;
    }

}

?>