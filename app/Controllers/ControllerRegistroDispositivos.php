<?php
session_start();/*Retomamos sesion activa*/

if(!isset($_SESSION["documentoUsuario"])){/*se valida si la sesion no esta activa*/
  header("location:" . BASEURL . "Login/Iniciar");
}

//Llamamos archivos requeridos
require_once("app/Models/Mysql/RegistroDispositivos.php");

/*
    @autor Jhon Giraldo
    Clase encargada del manejo de dispositivos
*/
class ControllerRegistroDispositivos{

    /*
       @autor Jhon Giraldo
       Metodo constructor vacio
   */
   public function __construct(){

   }


    /*
        @autor Jhon Giraldo
        Metodo iniciar para agregar la vista pronipal de registro dispositivos
    */
    public function Iniciar(){
        try{
                
            //se llama el metodo para listar pacientes
            $registroDispositivos=$this->GetListadoRegistroDispositivos();

            $sedeLogueo=$_SESSION["sede"];//sede e la que ingreso el usuario
            if($sedeLogueo==110){
                $sedeLogueo="RIONEGRO";
            }else{
                $sedeLogueo="APARTADO";
            }
            
            require_once("app/Views/Enfermeria/RegistroDispositivos/ViewRegistroDispositivos.php"); //agregamos la vista
            
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public function GetVistaNuevoRegistroDispositivos(){
        try{

            $sedeLogueo=$_SESSION["sede"];//sede e la que ingreso el usuario
            if($sedeLogueo==110){
                $sedeLogueo="RIONEGRO";
            }else{
                $sedeLogueo="APARTADO";
            }


            require_once("app/Views/Enfermeria/RegistroDispositivos/ViewRegistroDispositivosAgregarNuevo.php"); //agregamos la vista

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        Metodo para consultar el listado de registro de dispositivos
    */
    public function GetListadoRegistroDispositivos(){
        try{
            
            $sede=$_SESSION["sede"];


            $OregistroDis=new RegistroDispositivos();
            return $OregistroDis->GetListadoRegistroDispositivos($sede);

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public function GetUltimoRegistroDispositivos(){
        try{
            //parametros por url
            $sede=$_POST["sede"];
 

            //instanciamos clase y seteamos atributos
            $OregistroDis=new RegistroDispositivos();
            $OregistroDis->SetSede($sede);


        //devolvemos json con la repuesta de nuevo registro
        echo json_encode($OregistroDis->GetUltimoRegistroDispositivos($OregistroDis));

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }


    public function SetAgregarNuevoRegistroDispositivo(){
        try{
            //pparametros por url
            $fecha=$_POST["fecha"];
            $numPacientes=$_POST["numPacientes"];
            $cvc=$_POST["cvc"];
            $sv=$_POST["sv"];
            $vm=$_POST["vm"];
            $cvp=$_POST["cvp"];
            $enfermero=$_POST["enfermero"];
            $sede=$_POST["sede"];

            //instanciamos clase y seteamos atributos
            $OregistroDis=new RegistroDispositivos();
            $OregistroDis->SetFecha($fecha);
            $OregistroDis->SetNumeroPacientes($numPacientes);
            $OregistroDis->SetCvc($cvc);
            $OregistroDis->SetSv($sv);
            $OregistroDis->SetVm($vm);
            $OregistroDis->SetCvp($cvp);
            $OregistroDis->SetEnfermero($enfermero);
            $OregistroDis->SetSede($sede);

            //devolvemos json con la repuesta de nuevo registro
            echo json_encode($OregistroDis->SetNuevoRegistroDispositivo($OregistroDis));

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

}