<?php

require_once("Conexion.php");

/*
    @autor Jhon Giraldo
    clase encargada del manejo de la tabla persona
*/
class Persona extends Conexion{

    //atributos de clase
    private $documento;
    private $tipoDoc;
    private $nombres;
    private $apellidos;


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
        Consulta el listado de personas
    */
    public function GetListaPersonas(){
        try{
            
            $this->Conectar();

            $consulta="CALL SP_consultar_listadoPersonas();";

            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array());
            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);

            $this->Desconectar();

            return $resultado;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }   
    }

    /*
        @autor Jhon Giraldo
        consulta los datos de una persona por documento
    */
    public function GetDatosPersonaXDocumento($documento){
        try{  
            $this->Conectar();
            $consulta=" SELECT 	USU.codigo AS 'codigo',
                                USU.usuario AS 'usuario',
                                USU.password AS 'password',
                                USU.perfil AS 'codPerfil',
                                PERF.nombre AS 'perfil',
                                USU.estado AS 'estado',
                                PER.tipoDoc AS 'tipoDoc',
                                PER.documento AS 'documento',
                                PER.nombres AS 'nombres',
                                PER.apellidos AS 'apellidos'
                        FROM 	tbl_usuario AS USU INNER JOIN tbl_persona AS PER ON PER.documento=USU.persona
                                INNER JOIN tbl_perfil AS PERF ON PERF.codigo=USU.perfil 
                        WHERE persona=:documento";  

            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(':documento'=>$documento));
            $resultado=$registros->fetchall(PDO::FETCH_ASSOC);

            $this->Desconectar();
            return $resultado;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }    
    }

    /*
        @autor Jhon Giraldo
        agrega nueva persona
    */
    public function SetNuevaPersona(Persona $Opersona){
        try{
            $this->Conectar();

            $consulta="CALL SP_insertar_personanueva(  :documento,:tipoDoc,:nombres,:apellidos)";
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(  ':documento'=>$Opersona->GetDocumento(),':tipoDoc'=>$Opersona->GetTipoDoc(),':nombres'=>$Opersona->GetNombres(),':apellidos'=>$Opersona->GetApellidos()));
            $this->Desconectar();

            //Logger::Log($_SESSION["documentoUsuario"],date("Y-m-d H:i:s"),"INSERTAR NUEVO PACIENTE",DBNAMEM,"SP_insertar_pacienteNuevo");

            return $registros->rowCount();

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    //metodos getter y setter
    public function GetDocumento(){
        return $this->documento;
    }

    public function SetDocumento($doc){
        $this->documento=$doc;
    }

    public function GetTipoDoc(){
        return $this->tipoDoc;
    }

    public function SetTipoDoc($tip){
        $this->tipoDoc=$tip;
    }

    public function GetNombres(){
        return $this->nombres;
    }

    public function SetNombres($nom){
        $this->nombres=$nom;
    }

    public function GetApellidos(){
        return $this->apellidos;
    }

    public function SetApellidos($ape){
        $this->apellidos=$ape;
    }

}