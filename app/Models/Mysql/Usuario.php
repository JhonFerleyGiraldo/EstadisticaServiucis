<?php

require_once("Conexion.php");
require_once("app/Logs/Logger.php");

/*
    @autor Jhon Giraldo
    clase encargada del manejo de la tabla usuario
*/
class Usuario extends Conexion{

    //atributos de clase
    private $codigo;
    private $persona;
    private $usuario;
    private $password;
    private $perfil;
    private $estado;
    private $perfilNombre;
    private $nombreUsuario;

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
        metodo encargado de validar usuario en el login
    */
    public function GetValidarUsuario( Usuario $Ousuario){
        try{

            $this->Conectar();

            $bandera=false;
            $consulta="SELECT * FROM tbl_usuario WHERE usuario=:usuario";
            $resultado=$this->conexion->prepare($consulta);
            $resultado->execute(array(':usuario'=>$Ousuario->usuario));

            while($registros=$resultado->fetch(PDO::FETCH_ASSOC)){
                if(password_verify($Ousuario->password,$registros['password'])){
                    $bandera=true;
                }
            }

            $this->Desconectar();

            return $bandera;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }  
    }


    /*
        @autor Jhon Giraldo
        metodo encargado de consultar datos del usuario por documento
    */
    public function GetDatosUsuarioXDocumento($documento){
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
              
            $Ousuario=new Usuario;
            foreach($resultado as $registro){

                $Ousuario->SetCodigoUsuario($registro["codigo"]);
                $Ousuario->SetPersona($registro["documento"]);
                $Ousuario->Setusuario($registro["usuario"]);
                $Ousuario->Setpassword($registro["password"]);
                $Ousuario->SetPerfil($registro["codPerfil"]);
                $Ousuario->SetEstado($registro["estado"]);
                $Ousuario->SetPerfilNombre($registro["perfil"]);
                $Ousuario->SetNombreUsuario($registro["nombres"] . " " . $registro["apellidos"]);
            }

            return $Ousuario;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }    
    }

    /*
        @autor Jhon Giraldo
        metodo encargado de consultar datos de los medicos activos y por sede
    */
    public function GetMedicosActivos($sede){
        try{  
            $this->Conectar();
            $consulta="CALL SP_consultar_listadoMedicosActivosXsede(:sede)";  

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
        metodo encargado de consultar datos de los enfermeros activos y por sede
    */
    public function GetEnfermerosActivos($sede){
        try{  
            $this->Conectar();
            $consulta="CALL SP_consultar_listadoEnfermerosActivosXsede(:sede)";  

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
        Insertar nuevo usuario
    */
    public function SetNuevoUsuario(Usuario $Ousuario){
        try{
            $this->Conectar();
    
            $consulta=" INSERT INTO tbl_usuario VALUES(NULL,:persona,:usuario,:pass,:perfil,:estado);";
                                                        
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(  ":persona"=>$Ousuario->GetPersona(),":usuario"=>$Ousuario->Getusuario(),":pass"=>$Ousuario->Getpassword(),":perfil"=>$Ousuario->GetPerfil(),":estado"=>$Ousuario->GetEstado()));

            $idUsuario=$this->conexion->lastInsertId();

            $this->Desconectar();

            return $idUsuario;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }


    /*
        @autor Jhon Giraldo
        metodo encargado de actualizar usuario
    */
    public function SetActualizarUsuario(Usuario $Ousuario){
        try{
            $this->Conectar();
    
            $consulta="CALL SP_actualizar_datosUsuario(:codUsuario,:pass,:perfil,:estado);";
                                                        
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(  ":codUsuario"=>$Ousuario->GetCodigoUsuario(),":pass"=>$Ousuario->Getpassword(),":perfil"=>$Ousuario->GetPerfil(),":estado"=>$Ousuario->GetEstado()));
           
            $this->Desconectar();

            return $registros->rowCount();

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }


    /*
        @autor Jhon Giraldo
        metodo encargado de actualizar clave usuario
    */
    public function SetActualizarClaveUsuario(Usuario $Ousuario){
        try{
            $this->Conectar();
    
            $consulta="CALL SP_actualizar_claveUsuario(:codUsuario,:pass);";
                                                        
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(  ":codUsuario"=>$Ousuario->GetCodigoUsuario(),":pass"=>$Ousuario->Getpassword()));
           
            $this->Desconectar();

            return $registros->rowCount();

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    


    //metodos getter y setter
    public function Setusuario($usu){
        $this->usuario=$usu;
    }

    public function Setpassword($pass){
        $this->password=$pass;
    }

    public function SetCodigoUsuario($cod){
        $this->codigo=$cod;
    }

    public function SetPersona($pers){
        $this->persona=$pers;
    }

    public function SetPerfil($perf){
        $this->perfil=$perf;
    }

    public function SetPerfilNombre($perf){
        $this->perfilNombre=$perf;
    }

    public function SetEstado($est){
        $this->estado=$est;
    }

    public function SetNombreUsuario($nom){
        $this->nombreUsuario=$nom;
    }

    public function Getusuario(){
        return $this->usuario;
    }

    public function Getpassword(){
        return $this->password;
    }

    public function GetCodigoUsuario(){
        return $this->codigo;
    }

    public function GetPerfil(){
        return $this->perfil;
    }

    public function GetPerfilNombre(){
        return $this->perfilNombre;
    }

    public function GetEstado(){
        return $this->estado;
    }

    public function GetPersona(){
        return $this->persona;
    }

    public function GetNombreUsuario(){
        return $this->nombreUsuario;
    }

}


?>