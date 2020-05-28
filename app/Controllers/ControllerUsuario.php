<?php
session_start();/*Retomamos sesion activa*/

if(!isset($_SESSION["documentoUsuario"])){/*se valida si la sesion no esta activa*/
  header("location:" . BASEURL . "Login/Iniciar");
}

//Llamamos archivos requeridos
require_once("app/Models/Mysql/Persona.php");
require_once("app/Models/Mysql/Usuario.php");
require_once("app/Models/Mysql/UsuarioSede.php");

/*
    @autor Jhon Giraldo
    Clase encargada del manejo de los usuarios
*/
class ControllerUsuario{

    /*
       @autor Jhon Giraldo
       Metodo constructor vacio
   */
   public function __construct(){

   }

    /*
        @autor Jhon Giraldo
        Metodo iniciar para agregar la vista pronipal de pacientes
    */
    public function Iniciar(){
        try{
             
            //se llama el metodo para listar pacientes
            $personas=$this->GetListaPersonas();

            $sedeLogueo=$_SESSION["sede"];//sede e la que ingreso el usuario

            if($sedeLogueo==110){
                $sedeLogueo="RIONEGRO";
            }else{
                $sedeLogueo="APARTADO";
            }
            
            require_once("app/Views/Usuario/ViewUsuario.php"); //agregamos la vista
            
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        Metodo consulta listado personas
    */
    public function GetListaPersonas(){
        try{
            $Opersona=new Persona();
            return $Opersona->GetListaPersonas();
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        Metodo consulta datos del usuario
    */
    public function GetConsultarDatosUsuario(){
        //recibimos parametros por post
        $documento=$_POST["documento"];

        //instanciamos y seteamos atributos
        $Opersona=new Persona();

        //devolvemos los datos del cateter
        echo json_encode($Opersona->GetDatosPersonaXDocumento($documento));

    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de cargar la vista para agregar nuevos usuarios
    */
    public function GetVistaAgregarUsuario(){
        try{


            $sedeLogueo=$_SESSION["sede"];//sede e la que ingreso el usuario
            //validamos que sede es
            if($sedeLogueo==110){
                $sedeLogueo="RIONEGRO";
            }else{
                $sedeLogueo="APARTADO";
            }

            //si la sede es nula generemos error
            if($_SESSION["sede"]==NULL){
                echo "Error variable de sesión para sede vacia";
                exit();
            }

            require_once("app/Views/Usuario/ViewUsuarioAgregarNuevo.php");//mostrar vista

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        Metodo actualiza estado sede usuario
    */
    public function SetActualizarEstadoSedeUsuario(){
        //recibimos valores por post
        $codigoUsuario=$_POST["codUsu"];
        $codigoSede=$_POST["codSed"];
        $estado=$_POST["estado"];


        $OusuarioSede=new UsuarioSede();
        $OusuarioSede->SetCodigoUsuario($codigoUsuario);
        $OusuarioSede->SetCodigoSede($codigoSede);
        $OusuarioSede->SetEstado($estado);

        echo json_encode($OusuarioSede->SetActualizarEstadoSedeUsuario($OusuarioSede));

    }

    /*
        @autor Jhon Giraldo
        Metodo actualiza clave usuario
    */
    public function SetActualizarClaveUsuario(){
         //recibimos valores por post
         $codigoUsuario=$_POST["codUsu"];
         $password=$_POST["pass"];

         $claveEncriptada="";
         if($password==''){
             $claveEncriptada=null;
         }else{
             $claveEncriptada=$this->EncriptarClave($password);
         }
 
         $Ousuario=new Usuario();
         $Ousuario->SetCodigoUsuario($codigoUsuario);
         $Ousuario->Setpassword($claveEncriptada);
 
         echo json_encode($Ousuario->SetActualizarClaveUsuario($Ousuario));
    }

    /*
        @autor Jhon Giraldo
        Metodo actualizar usuario
    */
    public function SetActualizarUsuario(){
        //recibimos valores por post
        $codigoUsuario=$_POST["codUsu"];
        $password=$_POST["pass"];
        $perfil=$_POST["perf"];
        $estado=$_POST["est"];
        $claveEncriptada="";
        if($password==''){
            $claveEncriptada=null;
        }else{
            $claveEncriptada=$this->EncriptarClave($password);
        }

        $Ousuario=new Usuario();
        $Ousuario->SetCodigoUsuario($codigoUsuario);
        $Ousuario->Setpassword($claveEncriptada);
        $Ousuario->SetPerfil($perfil);
        $Ousuario->SetEstado($estado);

        echo json_encode($Ousuario->SetActualizarUsuario($Ousuario));

    }

    /*
        @autor Jhon Giraldo
        Metodoactualiza perfil
    */
    public function GetVistaActualizarPerfil(){
        try{

            $sedeLogueo=$_SESSION["sede"];//sede e la que ingreso el usuario
            //validamos que sede es
            if($sedeLogueo==110){
                $sedeLogueo="RIONEGRO";
            }else{
                $sedeLogueo="APARTADO";
            }

            if($_SESSION["sede"]==NULL){
                echo "Error variable de sesión para sede vacia";
                exit();
            }


            require_once("app/Views/Usuario/ViewUsuarioActualizarPerfil.php");//agregamos la vista


        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        } 
    }

    /*
        @autor Jhon Giraldo
        Metodo muestra vista actualizar usuario
    */
    public function GetVistaActualizarUsuario(){
        try{

            //pparametros por url
            $documento=$_GET["documento"];

            $sedeLogueo=$_SESSION["sede"];//sede e la que ingreso el usuario
            //validamos que sede es
            if($sedeLogueo==110){
                $sedeLogueo="RIONEGRO";
            }else{
                $sedeLogueo="APARTADO";
            }

            if($_SESSION["sede"]==NULL){
                echo "Error variable de sesión para sede vacia";
                exit();
            }

            require_once("app/Views/Usuario/ViewUsuarioActualizar.php");//agregamos la vista
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        } 
    }

    /*
        @autor Jhon Giraldo
        Metodo inserta sede usuario
    */
    public function SetInsertarSedeUsuario(){

        //recibimos valores por post
        $codigoUsuario=$_POST["codUsu"];
        $codigoSede=$_POST["codSed"];
        $estado=$_POST["estado"];

        $OusuarioSede=new UsuarioSede();
        $OusuarioSede->SetCodigoUsuario($codigoUsuario);
        $OusuarioSede->SetCodigoSede($codigoSede);
        $OusuarioSede->SetEstado($estado);

        echo json_encode($OusuarioSede->SetInsertarSedeUsuario($OusuarioSede));

    }

    /*
        @autor Jhon Giraldo
        Metodo agrega nuevo usuario
    */
    public function SetNuevoUsuario(){
 
        //recibimos valores por post
        $documento=$_POST["doc"];
        $tipoDoc=$_POST["tip"];
        $nombre=$_POST["nom"];
        $apellido=$_POST["ape"];
        $passw=$_POST["pass"];
        $perfil=$_POST["perf"];
        $estado=$_POST["estado"];

        //instanciamos la clase y seteamos los atributos
        $Opersona= new Persona();
        $Opersona->SetDocumento($documento);
        $Opersona->SetTipoDoc($tipoDoc);
        $Opersona->SetNombres($nombre);
        $Opersona->SetApellidos($apellido);

        if($Opersona->SetNuevaPersona($Opersona)==1){

            //encriptamos la clave
            $claveEncriptada=$this->EncriptarClave($passw);

            //instanciamos la clase y seteamos los atributos
            $Ousuario=new Usuario();
            $Ousuario->SetPersona($documento);
            $Ousuario->Setusuario($documento);
            $Ousuario->Setpassword($claveEncriptada);
            $Ousuario->SetPerfil($perfil);
            $Ousuario->SetEstado($estado);
            
            echo json_encode($Ousuario->SetNuevoUsuario($Ousuario));

        }else{
            echo json_encode(false);
        }


    }

    /*
        @autor Jhon Giraldo
        encripta clave
    */
    public function EncriptarClave($claveSinEncriptar){
        try{

            $pass=password_hash($claveSinEncriptar, PASSWORD_DEFAULT,array("cost"=>12));

            return $pass;

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

}