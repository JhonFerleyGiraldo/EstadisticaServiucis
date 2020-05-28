<?php

require_once("app/Utiles/PDF/fpdf/fpdf.php");

/*
    @autor Jhon Giraldo
    Clase PDF hereda de FPDF, se crea para sobre escribir encabezado y pie de pagina
*/
class PDF extends FPDF{

    public function header(){

        $this->SetFont('Arial','B',10);
        $this->Cell(0,5,'SERVIUCIS S.A.S',0,0,'C');
        $this->Ln();
        $this->Cell(0,5,'NIT 811042050-0',0,0,'C');
        $this->Image(BASEURL.'app/img/logoEstadistica.png',185,5,20,20,'png');
        $this->Image(BASEURL.'app/img/serviucis.jpg',10,5,30,20,'jpg');
    }

    public function footer(){

        $this->SetFont('Arial','B',10);
        $this->SetY(-15);
        $this->Write(5,'Creado por : Sistema Estadística');
        $this->SetX(-25);
        $this->AliasNbPages();
        $this->Write(5,$this->PageNo().'/{nb}');
    }

}

?>