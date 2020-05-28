<?php

require_once("Conexion.php");

/*
    @autor Jhon Giraldo
    clase encargada manejar la tabla paciente
*/
class Paciente extends Conexion{

    //atributos de clase
    private $documento;
    private $tipoDoc;
    private $historiaClinica;
    private $primerNombre;
    private $segundoNombre;
    private $primerApellido;
    private $segundoApellido;
    private $fechaNacimiento;
    private $genero;

    /*
        @autor Jhon Giraldo
        contructor vacio
    */
    public function __construct(){
        try{
                 
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        } 
    }

    /*
        @autor Jhon Giraldo
        metodo encargado de validar si existe el paciente
    */
    public function GetValidarSiExistePaciente($tipoDoc,$documento){
        try{
            $this->Conectar();

            $consulta="SELECT * 
                        FROM tbl_paciente
                        WHERE tipoDoc=:tipoDoc AND documento=:documento";
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(':tipoDoc'=>$tipoDoc,':documento'=>$documento));

            $this->Desconectar();

            return  $registros->rowCount();

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /*
        @autor Jhon Giraldo
        metodo encargado de insertar un nuevo paciente
    */
    public function SetInsertarNuevoPaciente(Paciente $OPaciente){
        try{
            $this->Conectar();

            $consulta="CALL SP_insertar_pacienteNuevo(  :documento,:tipoDoc,:historiaClinica,:primerNombre,
                                                        :segundoNombre,:primerApellido,:segundoApellido,:fechaNacimiento,:genero)";
            $registros=$this->conexion->prepare($consulta);
            $registros->execute(array(  ':documento'=>$OPaciente->GetDocumento(),':tipoDoc'=>$OPaciente->GetTipoDoc(),':historiaClinica'=>$OPaciente->GetNumeroHistoriaClinica(),
                                        ':primerNombre'=>$OPaciente->GetPrimerNombre(),':segundoNombre'=>$OPaciente->GetSegundoNombre(),':primerApellido'=>$OPaciente->GetPrimerApellido(),
                                        ':segundoApellido'=>$OPaciente->GetSegundoApellido(),':fechaNacimiento'=>$OPaciente->GetFechaNacimiento(),':genero'=>$OPaciente->GetGenero()));
            $this->Desconectar();

            Logger::Log($_SESSION["documentoUsuario"],date("Y-m-d H:i:s"),"INSERTAR NUEVO PACIENTE",DBNAMEM,"SP_insertar_pacienteNuevo");

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

    public function GetNumeroHistoriaClinica(){
        return $this->historiaClinica;
    }

    public function SetNumeroHistoriaClinica($hc){
        $this->historiaClinica=$hc;
    }

    public function GetPrimerNombre(){
        return $this->primerNombre;
    }

    public function SetPrimerNombre($primerN){
        $this->primerNombre=$primerN;
    }

    public function GetSegundoNombre(){
        return $this->segundoNombre;
    }

    public function SetSegundoNombre($segundoN){
        $this->segundoNombre=$segundoN;
    }

    public function GetPrimerApellido(){
        return $this->primerApellido;
    }

    public function SetPrimerApellido($primerA){
        $this->primerApellido=$primerA;
    }

    public function GetSegundoApellido(){
        return $this->segundoApellido;
    }

    public function SetSegundoApellido($segundoA){
        $this->segundoApellido=$segundoA;
    }

    public function GetFechaNacimiento(){
        return $this->fechaNacimiento;
    }

    public function SetFechaNacimiento($fechaN){
        $this->fechaNacimiento=$fechaN;
    }

    public function GetGenero(){
        return $this->genero;
    }

    public function SetGenero($gene){
        $this->genero=$gene;
    }

}

?>