<?php
ob_start();
require_once("app/Models/Mysql/Usuario.php");
require_once("app/Models/Mysql/UsuarioSede.php");
require_once("app/Logs/Logger.php");

/*
    @autor Jhon Giraldo
    Clase encargada del manejo del login
*/
class ControllerLogin{
    /*
        @autor Jhon Giraldo
        Metodo constructor vacio
    */
    public function __construct(){
        
    }

    /*
        @autor Jhon Giraldo
        Metodo iniciar para traer la vista
    */
    public function Iniciar(){
        try{
            //Llamamos la vista
            require_once("app/Views/ViewLogin.php");
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de validar el login
    */
    public function ValidarLogin(){     
        try{
            
            //validamos si los parametros fueron enviados y los capturamos
            if(isset($_POST["sede"])){ 
                $sede=$_POST["sede"];
            }
            if(isset($_POST["usuario"])){ 
                $usuario=$_POST["usuario"];
            }
            if(isset($_POST["clave"])){ 
                $clave=$_POST["clave"];
            }
            
            //Instanciamos clase usuario
            $Ousuario=new Usuario();
            //seteamos datos
            $Ousuario->Setusuario($usuario);
            $Ousuario->Setpassword($clave);

            $validaLogin=$Ousuario->GetValidarUsuario($Ousuario);//metodo para validar usuario, se le manda la clase
            $Ousuario=$Ousuario->GetDatosUsuarioXDocumento($usuario); //se traen los datos del usuario

            //si el logeo es correcto
            if($validaLogin){
                //iniciamos sesion y guardamos variables de sesiones
                session_start();
                $_SESSION["codigoUsuario"]=$Ousuario->GetCodigoUsuario();
                $_SESSION["documentoUsuario"]=$Ousuario->Getusuario();
                $_SESSION["perfilUsuario"]=$Ousuario->GetPerfilNombre();
                $_SESSION["nombreUsuario"]=$Ousuario->GetNombreUsuario();
                $_SESSION["sede"]=$sede;
                $_SESSION["estado"]=$Ousuario->GetEstado(); //validamos estado del usuario

                if($_SESSION["estado"]!="S"){ //si esta inactivo

                    require_once("app/Views/ViewLogin.php"); //agregar la vista

                    ?>
                        <script>
                            //se muestra ventana de error al usuario
                            $(document).Toasts('create', {
                                class: 'bg-danger', 
                                title: 'Validación',
                                subtitle: 'Error',
                                body: 'Usuario se encuentra inactivo, favor validar.'
                            });

                        </script>
                    <?php

                }else{ //si el usuario esta activo
                    Logger::Log($_SESSION["documentoUsuario"],date("Y-m-d H:i:s"),"INICIO SESION",DBNAMEM,"tbl_usuario");
                    header("Location:../Inicio/Iniciar"); //redirecciona al metodo iniciar del controller iniciar
                }
                
                
            }else{ //si el logeo no es correcto

                require_once("app/Views/ViewLogin.php"); //agregamos la ruta
                
                ?>
                <script>
                    //se muestra ventana de error al usuario
                    $(document).Toasts('create', {
                        class: 'bg-danger', 
                        title: 'Validación',
                        subtitle: 'Error',
                        body: 'Usuario o contraseña incorrecta, favor validar.'
                    });

                </script>
                <?php
            }
            
        }catch(Exception $e){
            echo "Error validando usuario " . $e->getMessage();
        }    
    }

    /*
        @autor Jhon Giraldo
        metodo encargado de consultar sedes de usuario activas
    */
    public function GetSedesUsuario(){
        try{
            $usuario=$_POST["usuario"];

            $OusuarioSedes=new UsuarioSede();
            $Ousuario=new Usuario();

            $datosU=$Ousuario->GetDatosUsuarioXDocumento($usuario);
            echo json_encode($OusuarioSedes->GetSedesUsuario($datosU->GetCodigoUsuario()));

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }  
    }

    /*
        @autor Jhon Giraldo
        metodo encargado de cerrar sesion
    */
    public function CerrarSesion(){
        try{

            session_start();
            session_destroy();

            header("Location:" . BASEURL);

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        } 
    }

}
?>