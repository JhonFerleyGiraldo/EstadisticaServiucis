<?php
session_start();/*Retomamos sesion activa*/

if(!isset($_SESSION["documentoUsuario"])){/*se valida si la sesion no esta activa*/
  header("location:" . BASEURL . "Login/Iniciar");
}
//Llamamos archivos requeridos
require_once("app/Models/Mysql/Sede.php");
require_once("app/Models/Mysql/RegistroDispositivos.php");
require_once("app/Models/Mysql/ControlCateteres.php");
require_once("app/Models/Mysql/ControlSondasVesicales.php");
require_once("app/Models/Mysql/Ingreso.php");
require_once("app/Models/Mysql/Estancia.php");
require_once("app/Models/Mysql/TerapiaFisica.php");
require_once("app/Models/Mysql/EstadisticaTerapiafisica.php");
require_once("app/Models/Mysql/FuerzaIngreso.php");
require_once("app/Models/Mysql/FuerzaEgreso.php");
require_once("app/Utiles/PDF/fpdf/clasesPropias/PDF.php");

//libreria de excel usando composer
require("app/Utiles/Excel/vendor/autoload.php");
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\PHPExcel_Style_Alignment;




/*
    @autor Jhon Giraldo
    Clase encargada del manejo de reportes
*/
class ControllerReportes{

     /*
        @autor Jhon Giraldo
        Metodo constructor vacio
    */
    public function __construct(){

    }


    /*
        @autor Jhon Giraldo
        Metodo iniciar para agregar la vista reportes
    */
    public function Iniciar(){
        try{
                


            $sedeLogueo=$_SESSION["sede"];//sede e la que ingreso el usuario
            if($sedeLogueo==110){
                $sedeLogueo="RIONEGRO";
            }else{
                $sedeLogueo="APARTADO";
            }
            
            $Osedes=new Sede();
            $sedes=$Osedes->GetSedes();
            
            require_once("app/Views/Reportes/ViewIndex.php"); //agregamos la vista
            
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }


    /*
        @autor Jhon Giraldo
        Genera el reporte de excel de registro de dispositivos
    */
    public function GetConsultarRegistroDispositivos(){

        //recibimos parametros por get
        $fechaInicio=$_GET["fechaInicio"];
        $fechaFin=$_GET["fechaFin"];
        $sede=$_GET["sede"];

        //instanciamos modelo
        $Odispo = new RegistroDispositivos();
        
        //obtenemos los registros
        $registros=$Odispo->GetListadoRegistroDispositivosXfecha($fechaInicio,$fechaFin,$sede);
        
        //ponemos nombre a la sede
        if($sede=='110'){
            $sede="RIONEGRO";
        }else if($sede=='120'){
            $sede="APARTADO";
        }

        //empezamos a crear el excel
        $documento = new Spreadsheet();
        $documento
            ->getProperties()
            ->setCreator("PHPSpreadsheet")
            ->setLastModifiedBy('PHPSpreadsheet') // última vez modificado por
            ->setTitle('Reporte Registros Dispositivos')
            ->setSubject('Reporte')
            ->setDescription('Este documento contiene un reporte de la plataforma Estadistica Enfermeria')
            ->setKeywords('reporte excel registro')
            ->setCategory('Reporte');
        
        $hoja = $documento->getActiveSheet();
        $hoja->setTitle("Datos Reporte");

        //cambiamos el ancho de algunas columnas
        $hoja->getColumnDimension('A')->setWidth(14);
        $hoja->getColumnDimension('B')->setWidth(14);
        $hoja->getColumnDimension('C')->setWidth(14);
        $hoja->getColumnDimension('D')->setWidth(14);
        $hoja->getColumnDimension('E')->setWidth(10);
        $hoja->getColumnDimension('F')->setWidth(10);
        $hoja->getColumnDimension('H')->setWidth(40);

        //titulos del reporte, y uniones de celda
        $hoja->mergeCells('A1:F1');
        $hoja->setCellValue("A1", "Reporte Registro Dispositivos");
        $hoja->mergeCells('A2:B2');
        $hoja->setCellValue("A2", "Fecha Inicial (" . $fechaInicio . ")");
        $hoja->mergeCells('C2:D2');
        $hoja->setCellValue("C2", "Fecha Final (" . $fechaFin . ")");
        $hoja->mergeCells('E2:F2');
        $hoja->setCellValue("E2", "Sede (" . $sede . ")");
        $hoja->mergeCells('G1:H2');

        //creamos instancia de imagen
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('Logo');
        $drawing->setPath('app/img/serviucis.jpg');
        $drawing->setHeight(90);
        $drawing->setCoordinates('G1');
        $drawing->setWorksheet($hoja); //enviamos la imagen a la hoja activa

        //auto ajustar tamaño de celdas automatico
        //foreach(range('A1','H2') as $columnID) {
        //    $documento->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        //}


        //cambiamos el alto de las filas
        $hoja->getRowDimension(1)->setRowHeight(35);
        $hoja->getRowDimension(2)->setRowHeight(35);
        
        //Array del estilo de el encabezado del reporte
        $EstiloEncabezado = [
            'font' => [
                'bold' => true,
                'size' => 13,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_FILL,
            ],
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'FFFFFF',
                ],
                'endColor' => [
                    'argb' => 'FFFFFF',
                ],
            ],
        ];

        //le pasamos a el rango de celdas el estilo anterior
        $hoja->getStyle('A1:H2')->applyFromArray($EstiloEncabezado);

        //Array de estilos para titulo de la tabla
        $EstiloTitulosTabla = [
            'font' => [
                'bold' => true,
                'size' => 11,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'FFFFFF',
                ],
                'endColor' => [
                    'argb' => 'FFFFFF',
                ],
            ],
        ];

        //Aplicamos al titulo de la tabla el array de estilos
        $hoja->getStyle('A4:H4')->applyFromArray($EstiloTitulosTabla);
    


        //titulos tabla
        $hoja->setCellValue("A4", "Códido");
        $hoja->setCellValue("B4", "Fecha");
        $hoja->setCellValue("C4", "Num. Pacientes");
        $hoja->setCellValue("D4", "CVC");
        $hoja->setCellValue("E4", "SV");
        $hoja->setCellValue("F4", "VM");
        $hoja->setCellValue("G4", "CVP");
        $hoja->setCellValue("H4", "ENFERMERO");
        
        //color encabezados de tabla
        $hoja->getStyle('A4:H4')->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('4472C4');

        $posicion=5;//primera posicion para recorrer el excel
        //recorremos los registros del array devuelto por la consulta
        foreach($registros as $item){
            //validamos filas pares para colorear
            if($posicion % 2==0){
                $hoja->getStyle('A' . $posicion . ':H' . $posicion)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('D9E1F2');
            }
            $hoja->setCellValue("A".$posicion, $item["codigo"]);
            $hoja->setCellValue("B".$posicion, $item["fecha"]);
            $hoja->setCellValue("C".$posicion, $item["numeroPacientes"]);
            $hoja->setCellValue("D".$posicion, $item["cvc"]);
            $hoja->setCellValue("E".$posicion, $item["sv"]);
            $hoja->setCellValue("F".$posicion, $item["vm"]);
            $hoja->setCellValue("G".$posicion, $item["cvp"]);
            $hoja->setCellValue("H".$posicion, $item["enfermero"]);
            $posicion++;
        }

        //ingresamos el filtro al encabezado
        $hoja->setAutoFilter('A4:H4');

        //ingresamos el pie de la tabla los totales
        $hoja->setCellValue("B".$posicion,"TOTAL");
        $hoja->setCellValue("C".$posicion,"=SUM(C".($posicion-1) . ":C5)");
        $hoja->setCellValue("D".$posicion,"=SUM(D".($posicion-1) . ":D5)");
        $hoja->setCellValue("E".$posicion,"=SUM(E".($posicion-1) . ":E5)");
        $hoja->setCellValue("F".$posicion,"=SUM(F".($posicion-1) . ":F5)");
        $hoja->setCellValue("G".$posicion,"=SUM(G".($posicion-1) . ":G5)");

        //agregamos color a los totales
        $hoja->getStyle('B' . $posicion . ':G' . $posicion)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FCE4D6');
       
         // Los siguientes encabezados son necesarios para que
         // el navegador entienda que no le estamos mandando
         // simple HTML
         // Por cierto: no hagas ningún echo ni cosas de esas; es decir, no imprimas nada
         
        $nombreDelDocumento = "Reporte Registros Dispositivos " . date("Y-m-d") . ".xlsx";
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
        header('Cache-Control: max-age=0');
        
        $writer = IOFactory::createWriter($documento, 'Xlsx');

        //Esta función desecha el contenido del búfer de salida en cola y lo desactiva ob_end_clean()
        //usada para no corromper el archivo de salida
        ob_end_clean();

        $writer->save('php://output'); //mandamos a php a guardar el archivo desde el navegador

        exit();
        
    }

    /*
        @autor Jhon Giraldo
        Genera el reporte de excel de control cateteres
    */
    public function GetConsultarControlCateteres(){
        
        $fechaInicio=$_GET["fechaInicio"];
        $fechaFin=$_GET["fechaFin"];
        $sede=$_GET["sede"];

        //Instanciamos el modelo
        $Ocateter = new ControlCateteres();
        
        //obtenemos todos los registros de control cateteres
        $registros=$Ocateter->GetListadoCateteresXfechas($fechaInicio,$fechaFin,$sede);


        //ponemos nombre a la sede
        if($sede=='110'){
            $sede="RIONEGRO";
        }else if($sede=='120'){
            $sede="APARTADO";
        }

        //empezamos a crear el excel
        $documento = new Spreadsheet();
        $documento
            ->getProperties()
            ->setCreator("PHPSpreadsheet")
            ->setLastModifiedBy('PHPSpreadsheet') // última vez modificado por
            ->setTitle('Reporte Control Catéteres')
            ->setSubject('Reporte')
            ->setDescription('Este documento contiene un reporte de la plataforma Estadistica Enfermeria')
            ->setKeywords('Reporte excel Control')
            ->setCategory('Reporte');
        
        $hoja = $documento->getActiveSheet();
        $hoja->setTitle("Datos Reporte");

        //cambiamos el ancho de algunas columnas
        $hoja->getColumnDimension('A')->setWidth(14);
        $hoja->getColumnDimension('B')->setWidth(14);
        $hoja->getColumnDimension('C')->setWidth(14);
        $hoja->getColumnDimension('D')->setWidth(14);
        $hoja->getColumnDimension('E')->setWidth(10);
        $hoja->getColumnDimension('F')->setWidth(10);
        $hoja->getColumnDimension('H')->setWidth(40);

        //titulos del reporte, y uniones de celda
        $hoja->mergeCells('A1:F1');
        $hoja->setCellValue("A1", "Reporte Control Catéteres");
        $hoja->mergeCells('A2:B2');
        $hoja->setCellValue("A2", "Fecha Inicial (" . $fechaInicio . ")");
        $hoja->mergeCells('C2:D2');
        $hoja->setCellValue("C2", "Fecha Final (" . $fechaFin . ")");
        $hoja->mergeCells('E2:F2');
        $hoja->setCellValue("E2", "Sede (" . $sede . ")");
        $hoja->mergeCells('G1:H2');

        //creamos instancia de imagen
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('Logo');
        $drawing->setPath('app/img/serviucis.jpg');
        $drawing->setHeight(90);
        $drawing->setCoordinates('G1');
        $drawing->setWorksheet($hoja); //enviamos la imagen a la hoja activa

        //auto ajustar tamaño de celdas automatico
        //foreach(range('A1','H2') as $columnID) {
        //    $documento->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        //}


        //cambiamos el alto de las filas
        $hoja->getRowDimension(1)->setRowHeight(35);
        $hoja->getRowDimension(2)->setRowHeight(35);
        
        //Array del estilo de el encabezado del reporte
        $EstiloEncabezado = [
            'font' => [
                'bold' => true,
                'size' => 13,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_FILL,
            ],
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'FFFFFF',
                ],
                'endColor' => [
                    'argb' => 'FFFFFF',
                ],
            ],
        ];

        //le pasamos a el rango de celdas el estilo anterior
        $hoja->getStyle('A1:H2')->applyFromArray($EstiloEncabezado);

        //Array de estilos para titulo de la tabla
        $EstiloTitulosTabla = [
            'font' => [
                'bold' => true,
                'size' => 11,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'FFFFFF',
                ],
                'endColor' => [
                    'argb' => 'FFFFFF',
                ],
            ],
        ];

        //Aplicamos al titulo de la tabla el array de estilos
        $hoja->getStyle('A4:H4')->applyFromArray($EstiloTitulosTabla);
    


        //titulos tabla
        $hoja->setCellValue("A4", "Paciente");
        $hoja->setCellValue("B4", "Tipo Doc.");
        $hoja->setCellValue("C4", "Documnento");
        $hoja->setCellValue("D4", "Num. Historia");
        $hoja->setCellValue("E4", "Num. Ingreso");
        $hoja->setCellValue("F4", "Fecha Inserción");
        $hoja->setCellValue("G4", "Tipo Catéter");
        $hoja->setCellValue("H4", "Ubic. Anatómica");
        $hoja->setCellValue("I4", "Lugar Proce.");
        $hoja->setCellValue("J4", "Médico");
        $hoja->setCellValue("K4", "Enfermer@");
        $hoja->setCellValue("L4", "Num. Punciones");
        $hoja->setCellValue("M4", "Fecha Retiro");
        $hoja->setCellValue("N4", "Total Días");
        $hoja->setCellValue("O4", "Motivo Retiro");
        $hoja->setCellValue("P4", "Cultivo");
        $hoja->setCellValue("Q4", "Reporte");

        
        //color encabezados de tabla
        $hoja->getStyle('A4:Q4')->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('4472C4');

        $posicion=5;//primera posicion para recorrer el excel
        //recorremos los registros del array devuelto por la consulta
        foreach($registros as $item){
            //validamos filas pares para colorear
            if($posicion % 2==0){
                $hoja->getStyle('A' . $posicion . ':Q' . $posicion)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('D9E1F2');
            }
            $hoja->setCellValue("A".$posicion, $item["paciente"]);
            $hoja->setCellValue("B".$posicion, $item["tipoDoc"]);
            $hoja->setCellValue("C".$posicion, $item["documento"]);
            $hoja->setCellValue("D".$posicion, $item["numHistoria"]);
            $hoja->setCellValue("E".$posicion, $item["numIngreso"]);
            $hoja->setCellValue("F".$posicion, $item["insercion"]);
            $hoja->setCellValue("G".$posicion, $item["tipoCateter"]);
            $hoja->setCellValue("H".$posicion, $item["ubicacion"]);
            $hoja->setCellValue("I".$posicion, $item["lugar"]);
            $hoja->setCellValue("J".$posicion, $item["medico"]);
            $hoja->setCellValue("K".$posicion, $item["enfermero"]);
            $hoja->setCellValue("L".$posicion, $item["numPunciones"]);
            $hoja->setCellValue("M".$posicion, $item["fechaRetiro"]);
            //validamos si la fecha de retiro es null
            if($item["fechaRetiro"]==NULL){
                //cambiamps de color la fila para alertar al usuario de el cateter no se ha retirado
                $hoja->getStyle('A' . $posicion . ':Q' . $posicion)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FCE4D6');
            }
            //validamos dias cateter
            if($item["diasCateter"]==0){
                //si es 0 es porque es del mismo dia, igual contamos 1 dia
                $hoja->setCellValue("N".$posicion, "1");
            }else{ 
                $hoja->setCellValue("N".$posicion, $item["diasCateter"]);
            }
            $hoja->setCellValue("O".$posicion, $item["motivoRet"]);
            $hoja->setCellValue("P".$posicion, $item["cultivo"]);
            $hoja->setCellValue("Q".$posicion, $item["reporte"]);

            $posicion++;
        }

        //ingresamos el filtro al encabezado
        $hoja->setAutoFilter('A4:Q4');

         // Los siguientes encabezados son necesarios para que
         // el navegador entienda que no le estamos mandando
         // simple HTML
         // Por cierto: no hagas ningún echo ni cosas de esas; es decir, no imprimas nada
         
        $nombreDelDocumento = "Reporte Control Catéteres " . date("Y-m-d") . ".xlsx";
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
        header('Cache-Control: max-age=0');
        
        $writer = IOFactory::createWriter($documento, 'Xlsx');

        //Esta función desecha el contenido del búfer de salida en cola y lo desactiva ob_end_clean()
        //usada para no corromper el archivo de salida
        ob_end_clean();

        $writer->save('php://output'); //mandamos a php a guardar el archivo desde el navegador

        exit();

    }


    /*
        @autor Jhon Giraldo
        Genera el reporte de excel de sondas vesicales
    */
    public function GetConsultarSondasVesicales(){
        
        //recibimos parametros por get
        $fechaInicio=$_GET["fechaInicio"];
        $fechaFin=$_GET["fechaFin"];
        $sede=$_GET["sede"];

        //instanciamos el modelo
        $Osondas = new ControlSondasVesicales();
        
        //obtenemos los regsistros
        $registros=$Osondas->GetListadoSondasVesicalesXfechas($sede,$fechaInicio,$fechaFin);

        
        //ponemos nombre a la sede
        if($sede=='110'){
            $sede="RIONEGRO";
        }else if($sede=='120'){
            $sede="APARTADO";
        }

        //empezamos a crear el excel
        $documento = new Spreadsheet();
        $documento
            ->getProperties()
            ->setCreator("PHPSpreadsheet")
            ->setLastModifiedBy('PHPSpreadsheet') // última vez modificado por
            ->setTitle('Reporte Control Sondas')
            ->setSubject('Reporte')
            ->setDescription('Este documento contiene un reporte de la plataforma Estadistica Enfermeria')
            ->setKeywords('Reporte excel Control sondas')
            ->setCategory('Reporte');
        
        $hoja = $documento->getActiveSheet();
        $hoja->setTitle("Datos Reporte");

        //cambiamos el ancho de algunas columnas
        $hoja->getColumnDimension('A')->setWidth(14);
        $hoja->getColumnDimension('B')->setWidth(14);
        $hoja->getColumnDimension('C')->setWidth(14);
        $hoja->getColumnDimension('D')->setWidth(14);
        $hoja->getColumnDimension('E')->setWidth(10);
        $hoja->getColumnDimension('F')->setWidth(10);
        $hoja->getColumnDimension('H')->setWidth(40);

        //titulos del reporte, y uniones de celda
        $hoja->mergeCells('A1:F1');
        $hoja->setCellValue("A1", "Reporte Control Sondas Vesicales");
        $hoja->mergeCells('A2:B2');
        $hoja->setCellValue("A2", "Fecha Inicial (" . $fechaInicio . ")");
        $hoja->mergeCells('C2:D2');
        $hoja->setCellValue("C2", "Fecha Final (" . $fechaFin . ")");
        $hoja->mergeCells('E2:F2');
        $hoja->setCellValue("E2", "Sede (" . $sede . ")");
        $hoja->mergeCells('G1:H2');

        //creamos instancia de imagen
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('Logo');
        $drawing->setPath('app/img/serviucis.jpg');
        $drawing->setHeight(90);
        $drawing->setCoordinates('G1');
        $drawing->setWorksheet($hoja); //enviamos la imagen a la hoja activa

        //auto ajustar tamaño de celdas automatico
        //foreach(range('A1','H2') as $columnID) {
        //    $documento->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        //}


        //cambiamos el alto de las filas
        $hoja->getRowDimension(1)->setRowHeight(35);
        $hoja->getRowDimension(2)->setRowHeight(35);
        
        //Array del estilo de el encabezado del reporte
        $EstiloEncabezado = [
            'font' => [
                'bold' => true,
                'size' => 13,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_FILL,
            ],
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'FFFFFF',
                ],
                'endColor' => [
                    'argb' => 'FFFFFF',
                ],
            ],
        ];

        //le pasamos a el rango de celdas el estilo anterior
        $hoja->getStyle('A1:H2')->applyFromArray($EstiloEncabezado);

        //Array de estilos para titulo de la tabla
        $EstiloTitulosTabla = [
            'font' => [
                'bold' => true,
                'size' => 11,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'FFFFFF',
                ],
                'endColor' => [
                    'argb' => 'FFFFFF',
                ],
            ],
        ];

        //Aplicamos al titulo de la tabla el array de estilos
        $hoja->getStyle('A4:H4')->applyFromArray($EstiloTitulosTabla);
    

        //titulos tabla
        $hoja->setCellValue("A4", "Paciente");
        $hoja->setCellValue("B4", "Tipo Doc.");
        $hoja->setCellValue("C4", "Documnento");
        $hoja->setCellValue("D4", "Num. Historia");
        $hoja->setCellValue("E4", "Num. Ingreso");
        $hoja->setCellValue("F4", "Fecha Inserción");
        $hoja->setCellValue("G4", "Num. Sonda");
        $hoja->setCellValue("H4", "Lugar Proce.");
        $hoja->setCellValue("I4", "Enfermer@");
        $hoja->setCellValue("J4", "Fecha Retiro");
        $hoja->setCellValue("K4", "Total Días");
        $hoja->setCellValue("L4", "Motivo Retiro");
        $hoja->setCellValue("M4", "Cultivo");
        $hoja->setCellValue("N4", "Reporte");

        
        //color encabezados de tabla
        $hoja->getStyle('A4:N4')->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('4472C4');

        $posicion=5;//primera posicion para recorrer el excel
        //recorremos los registros del array devuelto por la consulta
        foreach($registros as $item){
            //validamos filas pares para colorear
            if($posicion % 2==0){
                $hoja->getStyle('A' . $posicion . ':N' . $posicion)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('D9E1F2');
            }
            $hoja->setCellValue("A".$posicion, $item["paciente"]);
            $hoja->setCellValue("B".$posicion, $item["tipoDoc"]);
            $hoja->setCellValue("C".$posicion, $item["documento"]);
            $hoja->setCellValue("D".$posicion, $item["numHistoria"]);
            $hoja->setCellValue("E".$posicion, $item["numIngreso"]);
            $hoja->setCellValue("F".$posicion, $item["insercion"]);
            $hoja->setCellValue("G".$posicion, $item["numSonda"]);
            $hoja->setCellValue("H".$posicion, $item["lugar"]);
            $hoja->setCellValue("I".$posicion, $item["enfermero"]);
            $hoja->setCellValue("J".$posicion, $item["fechaRetiro"]);
            //validamos si la fecha de retiro es null
            if($item["fechaRetiro"]==NULL){
                //cambiamps de color la fila para alertar al usuario de la sonda no se ha retirado
                $hoja->getStyle('A' . $posicion . ':N' . $posicion)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FCE4D6');
            }
            //validamos dias sonda
            if($item["diasSonda"]==0){
                //si es 0 es porque es del mismo dia, igual contamos 1 dia
                $hoja->setCellValue("K".$posicion, "1");
            }else{ 
                $hoja->setCellValue("K".$posicion, $item["diasSonda"]);
            }
            $hoja->setCellValue("L".$posicion, $item["motivoRet"]);
            $hoja->setCellValue("M".$posicion, $item["cultivo"]);
            $hoja->setCellValue("N".$posicion, $item["reporte"]);

            $posicion++;
        }

        //ingresamos el filtro al encabezado
        $hoja->setAutoFilter('A4:N4');

         // Los siguientes encabezados son necesarios para que
         // el navegador entienda que no le estamos mandando
         // simple HTML
         // Por cierto: no hagas ningún echo ni cosas de esas; es decir, no imprimas nada
         
        $nombreDelDocumento = "Reporte Control Sondas " . date("Y-m-d") . ".xlsx";
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
        header('Cache-Control: max-age=0');
        
        $writer = IOFactory::createWriter($documento, 'Xlsx');

        //Esta función desecha el contenido del búfer de salida en cola y lo desactiva ob_end_clean()
        //usada para no corromper el archivo de salida
        ob_end_clean();

        $writer->save('php://output'); //mandamos a php a guardar el archivo desde el navegador

        exit();

    }


    /*
        @autor Jhon Giraldo
        Genera el reporte de excel de ingreso generales
    */
    public function GetConsultarIngresosGenerales(){
        
        //recibimos parametros por get
        $fechaInicio=$_GET["fechaInicio"];
        $fechaFin=$_GET["fechaFin"];
        $sede=$_GET["sede"];

        //instancia modelo
        $OIng = new Ingreso();
        
        //recibimos los registros de la consulta
        $registros=$OIng->GetListadoIngresosXfecha($sede,$fechaInicio,$fechaFin);

        //ponemos nombre a la sede
        if($sede=='110'){
            $sede="RIONEGRO";
        }else if($sede=='120'){
            $sede="APARTADO";
        }

        //empezamos a crear el excel
        $documento = new Spreadsheet();
        $documento
            ->getProperties()
            ->setCreator("PHPSpreadsheet")
            ->setLastModifiedBy('PHPSpreadsheet') // última vez modificado por
            ->setTitle('Reporte Ingreso General')
            ->setSubject('Reporte')
            ->setDescription('Este documento contiene un reporte de la plataforma Estadistica Enfermeria')
            ->setKeywords('Reporte excel Ingresos General')
            ->setCategory('Reporte');
        
        $hoja = $documento->getActiveSheet();
        $hoja->setTitle("Datos Reporte");
        
        




        //cambiamos el ancho de algunas columnas
        $hoja->getColumnDimension('A')->setWidth(14);
        $hoja->getColumnDimension('B')->setWidth(14);
        $hoja->getColumnDimension('C')->setWidth(14);
        $hoja->getColumnDimension('D')->setWidth(14);
        $hoja->getColumnDimension('E')->setWidth(10);
        $hoja->getColumnDimension('F')->setWidth(10);
        $hoja->getColumnDimension('H')->setWidth(40);

        //titulos del reporte, y uniones de celda
        $hoja->mergeCells('A1:F1');
        $hoja->setCellValue("A1", "Reporte Ingresos General");
        $hoja->mergeCells('A2:B2');
        $hoja->setCellValue("A2", "Fecha Inicial (" . $fechaInicio . ")");
        $hoja->mergeCells('C2:D2');
        $hoja->setCellValue("C2", "Fecha Final (" . $fechaFin . ")");
        $hoja->mergeCells('E2:F2');
        $hoja->setCellValue("E2", "Sede (" . $sede . ")");
        $hoja->mergeCells('G1:H2');

        //creamos instancia de imagen
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('Logo');
        $drawing->setPath('app/img/serviucis.jpg');
        $drawing->setHeight(90);
        $drawing->setCoordinates('G1');
        $drawing->setWorksheet($hoja); //enviamos la imagen a la hoja activa

        //auto ajustar tamaño de celdas automatico
        //foreach(range('A1','H2') as $columnID) {
        //    $documento->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        //}


        //cambiamos el alto de las filas
        $hoja->getRowDimension(1)->setRowHeight(35);
        $hoja->getRowDimension(2)->setRowHeight(35);
        
        //Array del estilo de el encabezado del reporte
        $EstiloEncabezado = [
            'font' => [
                'bold' => true,
                'size' => 13,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_FILL,
            ],
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'FFFFFF',
                ],
                'endColor' => [
                    'argb' => 'FFFFFF',
                ],
            ],
        ];

        //le pasamos a el rango de celdas el estilo anterior
        $hoja->getStyle('A1:H2')->applyFromArray($EstiloEncabezado);

        //Array de estilos para titulo de la tabla
        $EstiloTitulosTabla = [
            'font' => [
                'bold' => true,
                'size' => 11,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'FFFFFF',
                ],
                'endColor' => [
                    'argb' => 'FFFFFF',
                ],
            ],
        ];

        //Aplicamos al titulo de la tabla el array de estilos
        $hoja->getStyle('A4:AD4')->applyFromArray($EstiloTitulosTabla);
    

        //titulos tabla
        $hoja->setCellValue("A4", "Documento");
        $hoja->setCellValue("B4", "tipo Doc.");
        $hoja->setCellValue("C4", "Num. Historia");
        $hoja->setCellValue("D4", "Nombres");
        $hoja->setCellValue("E4", "Apellidos");
        $hoja->setCellValue("F4", "Fecha Nacimiento");
        $hoja->setCellValue("G4", "Edad");
        $hoja->setCellValue("H4", "Genero");
        $hoja->setCellValue("I4", "Ctvo Ingreso");
        $hoja->setCellValue("J4", "Fecha Ingreso");
        $hoja->setCellValue("K4", "Cod. Sede");
        $hoja->setCellValue("L4", "Sede");
        $hoja->setCellValue("M4", "Apache2");
        $hoja->setCellValue("N4", "Mortalidad Pred.");
        $hoja->setCellValue("O4", "Sofa");
        $hoja->setCellValue("P4", "Egreso Vivo?");
        $hoja->setCellValue("Q4", "Cama");
        $hoja->setCellValue("R4", "codDX1");
        $hoja->setCellValue("S4", "Dx1");
        $hoja->setCellValue("T4", "codDx2");
        $hoja->setCellValue("U4", "Dx2");
        $hoja->setCellValue("V4", "Estado");
        $hoja->setCellValue("W4", "Fecha Egreso");
        $hoja->setCellValue("X4", "Lugar Egreso");
        $hoja->setCellValue("Y4", "Nom. Hospital");
        $hoja->setCellValue("Z4", "Doc. Usuario");
        $hoja->setCellValue("AA4", "Usuario Cierre");
        $hoja->setCellValue("AB4", "Doc Usuario");
        $hoja->setCellValue("AC4", "Usuario Ingreso");
        $hoja->setCellValue("AD4", "Ultima estancia");
        $hoja->setCellValue("AE4", "Días UCE");
        $hoja->setCellValue("AF4", "Días UCI");


        
        //color encabezados de tabla
        $hoja->getStyle('A4:AF4')->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('4472C4');

        $posicion=5;//primera posicion para recorrer el excel
        //recorremos los registros del array devuelto por la consulta
        foreach($registros as $item){
            //validamos filas pares para colorear
            if($posicion % 2==0){
                $hoja->getStyle('A' . $posicion . ':AF' . $posicion)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('D9E1F2');
            }
   
            $hoja->setCellValue("A".$posicion, $item["documento"]);
            $hoja->setCellValue("B".$posicion, $item["tipoDoc"]);
            $hoja->setCellValue("C".$posicion, $item["historia"]);
            $hoja->setCellValue("D".$posicion, $item["nombres"]);
            $hoja->setCellValue("E".$posicion, $item["apellidos"]);
            $hoja->setCellValue("F".$posicion, $item["fechaNacimiento"]);
            $edad=date("Y")-date("Y", strtotime($item["fechaNacimiento"]));
            $hoja->setCellValue("G".$posicion, $edad);
            $hoja->setCellValue("H".$posicion, $item["genero"]);
            $hoja->setCellValue("I".$posicion, $item["numIngreso"]);
            $hoja->setCellValue("J".$posicion, $item["fechaIngreso"]);
            $hoja->setCellValue("K".$posicion, $item["codSede"]);
            $hoja->setCellValue("L".$posicion, $item["sede"]);
            $hoja->setCellValue("M".$posicion, $item["apache2"]);
            $hoja->setCellValue("N".$posicion, $item["mortalidad"]);
            $hoja->setCellValue("O".$posicion, $item["sofa"]);
            $hoja->setCellValue("P".$posicion, $item["egresoVivo"]);
            $hoja->setCellValue("Q".$posicion, $item["cama"]);
            $hoja->setCellValue("R".$posicion, $item["codIng1"]);
            $hoja->setCellValue("S".$posicion, $item["dx1"]);
            $hoja->setCellValue("T".$posicion, $item["codIng2"]);
            $hoja->setCellValue("U".$posicion, $item["dx2"]);
            $hoja->setCellValue("V".$posicion, $item["estado"]);
            //validamos el estado
            if($item["estado"]=="ABIERTO"){
                //cambiamps de color la fila para alertar al usuario que el ingreso no se ha cerrado
                $hoja->getStyle('A' . $posicion . ':AF' . $posicion)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FCE4D6');
            }
            $hoja->setCellValue("W".$posicion, $item["fechaEgreso"]);
            $hoja->setCellValue("X".$posicion, $item["lugar"]);
            $hoja->setCellValue("Y".$posicion, $item["hospital"]);
            $hoja->setCellValue("Z".$posicion, $item["docUsuCierre"]);
            $hoja->setCellValue("AA".$posicion, $item["usuCierre"]);
            $hoja->setCellValue("AB".$posicion, $item["docUsuIngr"]);
            $hoja->setCellValue("AC".$posicion, $item["usuIngreso"]);
            $hoja->setCellValue("AD".$posicion, $item["ultimaEstancia"]);

            //validamos si los dias de uce esta en null para enviar un 0
            if($item["diasUce"]==NULL){
                $hoja->setCellValue("AE".$posicion, 0);
            }else{
                $hoja->setCellValue("AE".$posicion, $item["diasUce"]); 
            }

            //vallidamos si los dias de uci son null ponemos un 0
            if($item["diasUci"]==NULL){
                $hoja->setCellValue("AF".$posicion, 0);
            }else{
                $hoja->setCellValue("AF".$posicion, $item["diasUci"]); 
            }

            $posicion++;
        }

        //ingresamos el filtro al encabezado
        $hoja->setAutoFilter('A4:AF4');

        //aumenta el numero de hoja a trabajar
        $contador=1;
        //recorremos todos los pacientes nuevamente para crear hojas con su detalle de estancias
        foreach($registros as $item){
            // Create a new worksheet, after the default sheet
            $documento->createSheet();
            // Add some data to the second sheet, resembling some different data types
            $hoja=$documento->setActiveSheetIndex($contador);
            $hoja->setTitle($item["documento"]);

            //datos del paciente
            $hoja->setCellValue('A1',$item["documento"]);
            $hoja->setCellValue('B1',$item["tipoDoc"]);
            $hoja->setCellValue('C1',$item["nombres"]);
            $hoja->setCellValue('D1',$item["apellidos"]);
            
            //color encabezados de tabla
                $hoja->getStyle('A3:D3')->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setARGB('4472C4');

            //auto ajustar tamaño de celdas automatico
            foreach(range('A1','D1') as $columnID) {
                $documento->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
            }

            //titulos tabla
            $hoja->setCellValue("A3", "Tipo Servicio");
            $hoja->setCellValue("B3", "Fecha Ingreso");
            $hoja->setCellValue("C3", "Fecha Egreso");
            $hoja->setCellValue("D3", "Total Días");

            $estancia=new Estancia();
            $estancia->SetNumIngreso($item["codIngreso"]);
            $registrosEstancias=$estancia->GetConsultarReporteEstanciasIngreso($estancia->GetNumIngreso());//consultar estancias del paciente

            $posicion=4;//primera posicion para recorrer el excel
            //recorremos las estancias del paciente y las vamos ingresando al excel
            foreach($registrosEstancias as $item2){
                //validamos filas pares para colorear
                if($posicion % 2==0){
                    $hoja->getStyle('A' . $posicion . ':D' . $posicion)->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()->setARGB('D9E1F2');
                }
                $hoja->setCellValue("A".$posicion, $item2["tipo"]);
                $hoja->setCellValue("B".$posicion, $item2["fechaIng"]);

                //validamos si la fecha de egreso es nula
                if($item2["fechaEgreso"]==NULL){
                    $hoja->setCellValue("C".$posicion, "SIN EGRESAR");
                }else{
                    $hoja->setCellValue("C".$posicion, $item2["fechaEgreso"]); 
                }
                
                $hoja->setCellValue("D".$posicion, $item2["totalDias"]);
                $posicion++;
            }

            $contador++;
        }

        

         // Los siguientes encabezados son necesarios para que
         // el navegador entienda que no le estamos mandando
         // simple HTML
         // Por cierto: no hagas ningún echo ni cosas de esas; es decir, no imprimas nada
         
        $nombreDelDocumento = "Reporte Ingresos General " . date("Y-m-d") . ".xlsx";
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
        header('Cache-Control: max-age=0');
        
        $writer = IOFactory::createWriter($documento, 'Xlsx');

        //Esta función desecha el contenido del búfer de salida en cola y lo desactiva ob_end_clean()
        //usada para no corromper el archivo de salida
        ob_end_clean();

        $writer->save('php://output'); //mandamos a php a guardar el archivo desde el navegador

        exit();


    }

    /*
        @autor Jhon Giraldo
        Muestra la visa de reportes graficos de estadistica fisica
    */
    public function GetVistaReporteEstadisticaFisica(){

        //recibimos parametros por get
        $fechaInicio=$_GET["fechaInicio"];
        $fechaFin=$_GET["fechaFin"];
        $sede=$_GET["sede"];
        $codSede=$_GET["sede"];

        $sedeLogueo=$_SESSION["sede"];//sede e la que ingreso el usuario
        //validamos que sede es
        if($sedeLogueo==110){
            $sedeLogueo="RIONEGRO";
        }else{
            $sedeLogueo="APARTADO";
        }

        //validamos la sede que llego por parametro
        if($sede==110){
            $sede="RIONEGRO";
        }else{
            $sede="APARTADO";
        }

        //si la sede es nula generemos error
        if($_SESSION["sede"]==NULL){
            echo "Error variable de sesión para sede vacia";
            exit();
        }

        require_once("app/Views/Reportes/ViewEstadisticaTerapiaFisica.php");//mostrar vista

    }

    /*
        @autor Jhon Giraldo
        Genera pdf con todos los datos de la estadistica disica
    */
    public function GetConsultarEstadisticaFisica(){
        
        $rutaGraficos="app/Utiles/TempImagenes/";

        //recibimos datos del formulario pos POST

        $codSede=$_POST["codSede"];
        $nomSede=$_POST["nomSede"];

        $fechaInicial=$_POST["fechaInicio"];
        $fechaFin=$_POST["fechaFin"];
        

        //PROCESAMOS PRIMER GRAFICO DE TERAPIAS VENTILACION MECANICA
        $grafiTeraVM = $_POST['terapiasVM'];//recibimos grafico de terapias VM
        $grafiTeraVM = str_replace('data:image/png;base64,', '', $grafiTeraVM);
        $fileData = base64_decode($grafiTeraVM);
        $fileName =$rutaGraficos.'grafico1.png';
        file_put_contents($fileName, $fileData);
        
        //PROCESAMOS SEGUNDO GRAFICO DE CAMBIOS DE POSICION
        $graficaCambiosPos=$_POST['InputcambiosPosicion'];
        $graficaCambiosPos=str_replace('data:image/png;base64,','',$graficaCambiosPos);
        $fileData=base64_decode($graficaCambiosPos);
        $fileName=$rutaGraficos.'grafico2.png';
        file_put_contents($fileName,$fileData);

        //PROCESAMOS TERCER GRAFICO DE TRANSFERENCIA LOGRADA AL ALTA
        $graficaTransferenciaLograda=$_POST['InputTransferenciaLograda'];
        $graficaTransferenciaLograda=str_replace('data:image/png;base64,','',$graficaTransferenciaLograda);
        $fileData=base64_decode($graficaTransferenciaLograda);
        $fileName=$rutaGraficos.'grafico3.png';
        file_put_contents($fileName,$fileData);

        //PROCESAMOS CUARTO GRAFICO DE FUERZA MUSCULAR
        $graficaFuerzaMuscular=$_POST['InputFuerzaMuscular'];
        $graficaFuerzaMuscular=str_replace('data:image/png;base64,','',$graficaFuerzaMuscular);
        $fileData=base64_decode($graficaFuerzaMuscular);
        $fileName=$rutaGraficos.'grafico4.png';
        file_put_contents($fileName,$fileData);


        //PROCESAMOS QUINTO GRAFICO DE PERME INICIAL Y FINAL
        $graficaPermeInicialyFinal=$_POST['InputPermeInicialyFinal'];
        $graficaPermeInicialyFinal=str_replace('data:image/png;base64,','',$graficaPermeInicialyFinal);
        $fileData=base64_decode($graficaPermeInicialyFinal);
        $fileName=$rutaGraficos.'grafico5.png';
        file_put_contents($fileName,$fileData);

        //PROCESAMOS SEXTO GRAFICO DE PACIENTES VENTILADOS
        $graficaPacientesVentilados=$_POST['InputPacientesVentilados'];
        $graficaPacientesVentilados=str_replace('data:image/png;base64,','',$graficaPacientesVentilados);
        $fileData=base64_decode($graficaPacientesVentilados);
        $fileName=$rutaGraficos.'grafico6.png';
        file_put_contents($fileName,$fileData);


        //CREAMOS EL PDF
        $fpdf=new PDF('P','mm','letter',true);//agregamos un parametro adicional al constructtor que nos cambia a utf8 si ingresamos true
        $fpdf->AddPage();
        $fpdf->SetFont('Arial','B',12);
        $fpdf->SetY(30);
        $fpdf->SetTextColor(16,87,97);
        $fpdf->Cell(0,5,'REPORTE ESTADÍSTICA MENSUAL TERAPIA FÍSICA',0,0,'C');
        $fpdf->SetDrawColor(61,174,233);
        $fpdf->SetLineWidth(1);
        $fpdf->Line(55,$fpdf->GetY()+6 ,161,$fpdf->GetY()+6);


        $fpdf->SetTextColor(0,0,0);
        $fpdf->SetFont('Arial','B',10);
        $fpdf->Ln(10);
        $fpdf->Cell(0,5,'Fecha creación',0,0,'L');
        $fpdf->SetX(42);
        $fpdf->SetFont('Arial','',10);
        $fpdf->Cell(0,5,date('Y-m-d H:i:m'),0,0,'L');

        $fpdf->Ln();
        $fpdf->SetFont('Arial','B',10);
        $fpdf->Cell(0,5,'Usuario creación',0,0,'L');
        $fpdf->SetX(42);
        $fpdf->SetFont('Arial','',10);
        $fpdf->Cell(0,5,$_SESSION["documentoUsuario"] . ' ' . $_SESSION["nombreUsuario"] ,0,0,'L');

        $fpdf->Ln();
        $fpdf->SetFont('Arial','B',10);
        $fpdf->Cell(0,5,'Fecha inicial',0,0,'L');
        $fpdf->SetX(42);
        $fpdf->SetFont('Arial','',10);
        $fpdf->Cell(0,5,$fechaInicial ,0,0,'L');

        $fpdf->Ln();
        $fpdf->SetFont('Arial','B',10);
        $fpdf->Cell(0,5,'Fecha final',0,0,'L');
        $fpdf->SetX(42);
        $fpdf->SetFont('Arial','',10);
        $fpdf->Cell(0,5,$fechaFin ,0,0,'L');

        $fpdf->Ln();
        $fpdf->SetFont('Arial','B',10);
        $fpdf->Cell(0,5,'Sede',0,0,'L');
        $fpdf->SetX(42);
        $fpdf->SetFont('Arial','',10);
        $fpdf->Cell(0,5,$codSede . ' - ' . $nomSede ,0,0,'L');

        $fpdf->Ln();
        $fpdf->SetX(0);
        $fpdf->SetFont('Arial','B',12);
        $fpdf->Cell(0,5,'Datos Generales',0,0,'C');

        $fpdf->SetFillColor(16,87,97);
        $fpdf->SetTextColor(255,255,255);
        $fpdf->SetDrawColor(16,87,97);
        $fpdf->SetFont('Arial','B',11);
        
        //instanciamos el modelo
        $objEstTerapiaFisi=new EstadisticaTerapiafisica();

        $fpdf->Ln(7);
        $fpdf->SetX(10);
        $fpdf->SetLineWidth(0.5);
        $fpdf->Cell(45,5,'Pacientes Atendidos',1,0,'L',1);
        $fpdf->SetTextColor(0,0,0);

        //obtenemos cantidad d epacientes atendidos
        $pacientesAtendidos=$objEstTerapiaFisi->GetCantidadPacientesAtendidos($fechaInicial,$fechaFin,$codSede);
        $fpdf->Cell(12,5,$pacientesAtendidos,1,0,'C');
    
        //instanciamos modelo
        $objTerapias=new TerapiaFisica();
        
        $fpdf->SetX(67);
        $fpdf->SetTextColor(255,255,255);
        $fpdf->Cell(45,5,'Sesiones Fisioterapia',1,0,'L',1);
        $fpdf->SetTextColor(0,0,0);
        //obtenemos cantidad de terapias fisicas por fecha y sede
        $fpdf->Cell(12,5,$objTerapias->GetConsultarCantidadTerapiasXfecha($fechaInicial,$fechaFin,$codSede) ,1,0,'C');

        $fpdf->SetX(124);
        $fpdf->SetTextColor(255,255,255);
        $fpdf->Cell(45,5,'Pacientes con VM',1,0,'L',1);
        $fpdf->SetTextColor(0,0,0);
        //obtenemos cantidad pacientes con vm por fecha y sede
        $pacienVm=$objTerapias->GetConsultarCantidadPacientesConVMXfecha($fechaInicial,$fechaFin,$codSede);
        $fpdf->Cell(12,5,$pacienVm,1,0,'C');

        $fpdf->Ln(7);
        $fpdf->SetX(10);
        $fpdf->SetTextColor(255,255,255);
        $fpdf->Cell(45,5,'Pacientes Fallecidos',1,0,'L',1);
        $fpdf->SetTextColor(0,0,0);
        //obtenemos cantidad de pacientes fallecidos
        $fpdf->Cell(12,5,$objEstTerapiaFisi->GetCantidadPacientesAtendidosFallecidos($fechaInicial,$fechaFin,$codSede),1,0,'C');

        $fpdf->SetX(67);
        $fpdf->SetTextColor(255,255,255);
        $fpdf->Cell(45,5,'Total Días VM',1,0,'L',1);
        $fpdf->SetTextColor(0,0,0);
        //Obtenemos el total de dias de vm de todos los pacientes
        $totDiasvm=$objTerapias->GetConsultarCantidadDiasConVMPacientesXfecha($fechaInicial,$fechaFin,$codSede);
        $fpdf->Cell(12,5,$totDiasvm,1,0,'C');

        $fpdf->SetX(124);
        $fpdf->SetTextColor(255,255,255);
        $fpdf->Cell(45,5,'Promedio Días VM',1,0,'L',1);
        $fpdf->SetTextColor(0,0,0);
        $fpdf->Cell(12,5, round($totDiasvm/$pacienVm,2),1,0,'C');


        //INICIO GRAFICO Y DATOS DE CAMBIO DE POSICION
        $fpdf->SetFont('Arial','B',12);
        $fpdf->Ln(20);
        $fpdf->SetX(40);
        $fpdf->SetY(100);
        //abrimos la imagen del grafico
        $fpdf->Image($rutaGraficos.'grafico2.png',10,100,90,50,'png');
        $fpdf->SetX(90);
        $fpdf->Cell(0,5,'Cambios de Posición Durante Terapia',0,0,'C');
        $fpdf->SetDrawColor(16,87,97);
        $fpdf->Ln(7);
        $fpdf->SetFillColor(16,87,97);
        $fpdf->SetTextColor(255,255,255);

        //ontenemos cambios de posicion
        $cambiosPosicion=$objTerapias->GetCambiosPosicionXfecha($fechaInicial,$fechaFin,$codSede);

        $fpdf->SetFont('Arial','',11);
        //recorremos todos los cambios de posicion con su total
        foreach($cambiosPosicion as $item){
            $fpdf->SetX(110);
            $fpdf->SetLineWidth(0.5);
            $fpdf->SetTextColor(255,255,255);
            $fpdf->Cell(45,5,$item["descrip"],1,0,'L',1);
            $fpdf->SetTextColor(0,0,0);
            $fpdf->Cell(35,5,$item["cantidad"],1,0,'C'); 
            $fpdf->Ln(7);
        }
        
        $fpdf->Ln(7);

        //FIN GRAFICO Y DATOS DE CAMBIO DE POSICION

        //INICIO GRAFICO Y DATOS DE TERAPIA VENTILACION MECANICA
        $fpdf->SetFont('Arial','B',12);
        $fpdf->SetX(0);
        
        $fpdf->Cell(0,5,'Pacientes ventilación mecánica',0,0,'C');
        $fpdf->Ln(0);
        $fpdf->SetX(40);
        $fpdf->SetY(157);
        $fpdf->Image($rutaGraficos.'grafico1.png',0,195,100,50,'png');
        

        $fpdf->SetDrawColor(16,87,97);
        $fpdf->Ln(7);
        $fpdf->SetFillColor(16,87,97);
        $fpdf->SetTextColor(255,255,255);
        
        //consultamos pacientes con vm
        $pacientesvm=$objTerapias->GetPacientesVentilacionMecanicaXfecha($fechaInicial,$fechaFin,$codSede);


        foreach($pacientesvm as $item){
            $pacientesvm=$item["pacientesVM"];
        }

        $pacientessvm=$pacientesAtendidos-$pacientesvm;

        //calculamos porcentaje
        $porcentajeCVM=$pacientesvm*100/$pacientesAtendidos;
        $porcentajeSVM=$pacientessvm*100/$pacientesAtendidos;

        $fpdf->SetFont('Arial','',11);
        $fpdf->SetX(10);
        $fpdf->SetLineWidth(0.5);
        $fpdf->Cell(45,5,'N° Pacientes',1,0,'L',1);
        $fpdf->SetTextColor(0,0,0,0);
        $fpdf->Cell(34,5,$pacientesAtendidos,1,0,'C');

        $paciemtesdeambulanvm=$objTerapias->GetCantidadPacientesDeambulanconVM($fechaInicial,$fechaFin,$codSede);

        $pacientesVentilados=$pacientesvm-$paciemtesdeambulanvm;


        $fpdf->SetTextColor(255,255,255);
        $fpdf->SetFont('Arial','',11);
        $fpdf->SetX(110);
        $fpdf->SetLineWidth(0.5);
        $fpdf->Cell(55,5,'Pacientes con VM',1,0,'L',1);
        $fpdf->SetTextColor(0,0,0,0);
        $fpdf->Cell(17,5,$pacientesVentilados,1,0,'C');
        $fpdf->Cell(17,5,round($pacientesVentilados*100/$pacientesvm,2),1,0,'C');
        
        $fpdf->Ln(7);
        $fpdf->SetX(10);
        $fpdf->SetTextColor(255,255,255);
        $fpdf->Cell(45,5,'Pacientes CVM',1,0,'L',1);
        $fpdf->SetTextColor(0,0,0,0);
        $fpdf->Cell(17,5,$pacientesvm,1,0,'C');
        $fpdf->Cell(17,5,round($porcentajeCVM,2) . '%',1,0,'C');

        $fpdf->SetX(110);
        $fpdf->SetTextColor(255,255,255);
        $fpdf->Cell(55,5,'Pacientes Deambulan con VM',1,0,'L',1);
        $fpdf->SetTextColor(0,0,0,0);
        $fpdf->Cell(17,5,$paciemtesdeambulanvm,1,0,'C');
        $fpdf->Cell(17,5,round($paciemtesdeambulanvm*100/$pacientesvm,2) . '%',1,0,'C');

        $fpdf->Image($rutaGraficos.'grafico6.png',110,195,100,50,'png');

        $fpdf->Ln(7);
        $fpdf->SetX(10);
        $fpdf->SetTextColor(255,255,255);
        $fpdf->Cell(45,5,'Pacientes SVM',1,0,'L',1);
        $fpdf->SetTextColor(0,0,0);
        $fpdf->Cell(17,5,$pacientessvm,1,0,'C');
        $fpdf->Cell(17,5,round($porcentajeSVM,2) . '%',1,0,'C');

        //FIN GRAFICO Y DATOS DE TERAPIA VENTILACION MECANICA

        //agregamos nueva pagina
        $fpdf->AddPage();

        $fpdf->SetFont('Arial','B',12);
        $fpdf->SetY(30);
        $fpdf->SetTextColor(16,87,97);
        $fpdf->Cell(0,5,'REPORTE ESTADÍSTICA MENSUAL TERAPIA FÍSICA',0,0,'C');
        $fpdf->SetDrawColor(61,174,233);
        $fpdf->SetLineWidth(1);
        $fpdf->Line(55,$fpdf->GetY()+6 ,161,$fpdf->GetY()+6);

        $fpdf->SetTextColor(0,0,0);
        $fpdf->SetFont('Arial','B',10);
        $fpdf->Ln(10);

        //INICIO GRAFICO Y DATOS DE TRANSFERENCIA LOGRADA AL ALTA
        $fpdf->SetFont('Arial','B',12);
        $fpdf->SetX(40);
        $fpdf->SetY(45);
        //abrimos la imagen del grafico
        $fpdf->Image($rutaGraficos.'grafico3.png',10,45,90,50,'png');
        $fpdf->SetX(90);
        $fpdf->Cell(0,5,'Transferencia Lograda al Alta',0,0,'C');
        $fpdf->SetDrawColor(16,87,97);
        $fpdf->Ln(7);
        $fpdf->SetFillColor(16,87,97);
        $fpdf->SetTextColor(255,255,255);

        //ontenemos cambios de posicion
        $transferenciaLograda=$objEstTerapiaFisi->GetTransferenciasAlAltaXfechas($fechaInicial,$fechaFin,$codSede);
        
        //Sumamos el total de las transferencias para sacar porcentajes
        $totTrans=0;
        foreach($transferenciaLograda as $item){
            $totTrans=$totTrans+$item["cantidad"];
        }

        $fpdf->SetFont('Arial','',11);
        //recorremos todos los cambios de posicion con su total
        foreach($transferenciaLograda as $item){
            $fpdf->SetX(110);
            $fpdf->SetLineWidth(0.5);
            $fpdf->SetTextColor(255,255,255);
            $fpdf->Cell(45,5,$item["descrip"],1,0,'L',1);
            $fpdf->SetTextColor(0,0,0);
            $fpdf->Cell(17,5,$item["cantidad"],1,0,'C');
            $fpdf->Cell(17,5,round($item["cantidad"]*100/$totTrans,2) . "%",1,0,'C'); 
            $fpdf->Ln(7);
        }
        
        $fpdf->Ln(10);

        //FIN GRAFICO Y DATOS DE TRANSFERENCIA LOGRADA AL ALTA


        //INICIO GRAFICO Y DATOS DE FUERZA MUSCULAR
        $fpdf->SetFont('Arial','B',12);
        $fpdf->SetX(40);
        $fpdf->SetY(100);
        //abrimos la imagen del grafico
        $fpdf->Image($rutaGraficos.'grafico4.png',100,120,90,50,'png');
        $fpdf->SetX(0);
        $fpdf->Cell(0,5,'Fuerza Muscular de Ingreso y Egreso',0,0,'C');
        $fpdf->SetDrawColor(16,87,97);
        $fpdf->Ln(7);
        $fpdf->SetFillColor(16,87,97);
        $fpdf->SetTextColor(0,0,0);

        //estanciamos la clase
        $fuerza= new FuerzaIngreso();
        $fuerzaMuscularIngreso=$fuerza->GetConsultarFuerzasIngresoXfechas($fechaInicial,$fechaFin,$codSede);

        //obtenemos el total de pacientes de fuerza d eingreso para calcular porcentajes
        $totFuerzIngreso=0;
        foreach($fuerzaMuscularIngreso as $item){
            $totFuerzIngreso=$totFuerzIngreso+$item["fuerzaTotalIngreso"];
        }


        $fpdf->SetFont('Arial','',11);
        $fpdf->Ln(10);
        $fpdf->SetX(10);
        $fpdf->SetY(110);
        $fpdf->Write(5,'FUERZAS INGRESO ');
        $fpdf->Ln(10);
        //recorremos todos los cambios de posicion con su total
        foreach($fuerzaMuscularIngreso as $item){
            $fpdf->SetX(10);
            $fpdf->SetLineWidth(0.5);
            $fpdf->SetTextColor(255,255,255);
            $fpdf->Cell(45,5,$item["CATEGORIA"],1,0,'L',1);
            $fpdf->SetTextColor(0,0,0);
            $fpdf->Cell(17,5,$item["fuerzaTotalIngreso"],1,0,'C'); 
            $fpdf->Cell(17,5,round($item["fuerzaTotalIngreso"]*100/$totFuerzIngreso,2) . "%",1,0,'C'); 
            $fpdf->Ln(7);
        }
        
        $fpdf->Ln(10);  

        //instanciamos clase
        $fuerza= new FuerzaEgreso();
        $fuerzaMuscularEgreso=$fuerza->GetConsultarFuerzasEgresoXfechas($fechaInicial,$fechaFin,$codSede);


        //obtenemos el total de pacientes de fuerza de egreso para calcular porcentajes
        $totFuerzEgreso=0;
        foreach($fuerzaMuscularEgreso as $item){
            $totFuerzEgreso=$totFuerzEgreso+$item["fuerzaTotalEgreso"];
        }


        $fpdf->SetFont('Arial','',11);
        $fpdf->SetX(10);
        $fpdf->SetY(145);
        $fpdf->Write(5,'FUERZAS EGRESO ');
        $fpdf->SetY(155);
        //recorremos todos los cambios de posicion con su total
        foreach($fuerzaMuscularEgreso as $item){
            $fpdf->SetX(10);
            $fpdf->SetLineWidth(0.5);
            $fpdf->SetTextColor(255,255,255);
            $fpdf->Cell(45,5,$item["CATEGORIA"],1,0,'L',1);
            $fpdf->SetTextColor(0,0,0);
            $fpdf->Cell(17,5,$item["fuerzaTotalEgreso"],1,0,'C');
            $fpdf->Cell(17,5,round($item["fuerzaTotalEgreso"]*100/$totFuerzEgreso,2) . "%",1,0,'C');  
            $fpdf->Ln(7);
        }

        //FIN GRAFICO Y DATOS DE FUERZA MUSCULAR


        //INICIO GRAFICO Y DATOS DE PERME INICIAL Y FINAL
        $fpdf->SetFont('Arial','B',12);
        $fpdf->SetX(40);
        $fpdf->SetY(180);
        //abrimos la imagen del grafico
        $fpdf->Image($rutaGraficos.'grafico5.png',10,190,90,50,'png');
        $fpdf->SetX(0);
        $fpdf->Cell(0,5,'Perme Ingreso y Perme Egreso',0,0,'C');
        $fpdf->SetDrawColor(16,87,97);
        $fpdf->Ln(7);
        $fpdf->SetFillColor(16,87,97);
        $fpdf->SetTextColor(0,0,0);

        $permeInicial=$objEstTerapiaFisi->GetPermeInicialXfechas($fechaInicial,$fechaFin,$codSede);

        //obtenemos la cantidad total de perme inicial
        $totPermeInicial=0;
        foreach($permeInicial as $item){
            $totPermeInicial=$totPermeInicial+$item["permeInicial"];
        }


        $fpdf->SetFont('Arial','',11);
        $fpdf->Ln(10);
        $fpdf->SetY(195);
        $fpdf->SetX(110);
        $fpdf->Write(5,'PERME INGRESO');
        $fpdf->Ln(10);
        $fpdf->SetY(202);
        //recorremos todos los cambios de posicion con su total
        foreach($permeInicial as $item){
            $fpdf->SetX(110);
            $fpdf->SetLineWidth(0.5);
            $fpdf->SetTextColor(255,255,255);
            $fpdf->Cell(45,5,$item["CATEGORIA"],1,0,'L',1);
            $fpdf->SetTextColor(0,0,0);
            $fpdf->Cell(17,5,$item["permeInicial"],1,0,'C'); 
            $fpdf->Cell(17,5,round($item["permeInicial"]*100/$totPermeInicial,2) . "%",1,0,'C'); 
            $fpdf->Ln(7);
        }
        
        $fpdf->Ln(10); 

        $permeFinal=$objEstTerapiaFisi->GetPermeFinalXfechas($fechaInicial,$fechaFin,$codSede);

        //obtenemos el total d eperme final para calcular porcentajes
        $totPermeFinal=0;
        foreach($permeFinal as $item){
            $totPermeFinal=$totPermeFinal+$item["permeFinal"];
        }

        $fpdf->SetFont('Arial','',11);
        
        $fpdf->SetY(222);
        $fpdf->SetX(110);
        $fpdf->Write(5,'PERME EGRESO ');
        $fpdf->SetY(230);
        //recorremos todos los cambios de posicion con su total
        foreach($permeFinal as $item){
            $fpdf->SetX(110);
            $fpdf->SetLineWidth(0.5);
            $fpdf->SetTextColor(255,255,255);
            $fpdf->Cell(45,5,$item["CATEGORIA"],1,0,'L',1);
            $fpdf->SetTextColor(0,0,0);
            $fpdf->Cell(17,5,$item["permeFinal"],1,0,'C'); 
            $fpdf->Cell(17,5,round($item["permeFinal"]*100/$totPermeFinal,2) . "%",1,0,'C'); 
            $fpdf->Ln(7);
        }

        //FIN GRAFICO Y DATOS DE PERME INICIAL Y FINAL

        $nombreArchivo="ReporteTerapiaFisica".date('Y-m-d').'.pdf';

        //para descargar pdf
        //$fpdf->Output($nombreArchivo,'D'); 
        //Para visualizar en el navegador
        $fpdf->Output('php://output','I'); 
    }

    /*
        @autor Jhon Giraldo
        Consulta las terapias para traer ventilacion mecanica o no
    */
    public function GetConsultarPacientesVentilacionMecanica(){
        //recibimos parametro por post
        $fechaInicio=$_POST["fechaInicio"];
        $fechaFin=$_POST["fechaFin"];
        $sede=$_POST["sede"];
        
        //instanciamos clase
        $estadistica= new TerapiaFisica();
        $datos=$estadistica->GetPacientesVentilacionMecanicaXfecha($fechaInicio,$fechaFin,$sede);
        
        //devolvemos json 
        echo json_encode($datos);
       
    }


    /*
        @autor Jhon Giraldo
        Consulta los pacientes atendidos
    */
    public function GetConsultarPacientesAtendidos(){
        //recibimos parametro por post
        $fechaInicio=$_POST["fechaInicio"];
        $fechaFin=$_POST["fechaFin"];
        $sede=$_POST["sede"];
        
        //instanciamos clase
        $estadistica= new EstadisticaTerapiafisica();
        $datos=$estadistica->GetCantidadPacientesAtendidos($fechaInicio,$fechaFin,$sede);
        
        //devolvemos json 
        echo json_encode($datos);
       
    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de consultar cantidad cambios de posicion
    */
    public function GetCambiosPosicionXfecha(){
        //recibimos parametro por post
        $fechaInicio=$_POST["fechaInicio"];
        $fechaFin=$_POST["fechaFin"];
        $sede=$_POST["sede"];
        
        //instanciamos clase
        $terapia= new TerapiaFisica();
        $datos=$terapia->GetCambiosPosicionXfecha($fechaInicio,$fechaFin,$sede);
        
        //devolvemos json 
        echo json_encode($datos);
       
    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de consultar las transferencias a la alta
    */
    public function GetTransferenciasAlAlta(){
        //recibimos parametro por post
        $fechaInicio=$_POST["fechaInicio"];
        $fechaFin=$_POST["fechaFin"];
        $sede=$_POST["sede"];
        
        //instanciamos clase
        $estadistica= new EstadisticaTerapiafisica();
        $datos=$estadistica->GetTransferenciasAlAltaXfechas($fechaInicio,$fechaFin,$sede);
        
        //devolvemos json 
        echo json_encode($datos);
       
    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de consultar las fuerzas de ingreso
    */
    public function GetConsultarFuerzasIngresoXfechas(){
        //recibimos parametro por post
        $fechaInicio=$_POST["fechaInicio"];
        $fechaFin=$_POST["fechaFin"];
        $sede=$_POST["sede"];
        
        //instanciamos clase
        $fuerza= new FuerzaIngreso();
        $datos=$fuerza->GetConsultarFuerzasIngresoXfechas($fechaInicio,$fechaFin,$sede);
        
        //devolvemos json 
        echo json_encode($datos);
       
    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de consultar las fuerzas de egreso
    */
    public function GetConsultarFuerzasEgresoXfechas(){
        //recibimos parametro por post
        $fechaInicio=$_POST["fechaInicio"];
        $fechaFin=$_POST["fechaFin"];
        $sede=$_POST["sede"];
        
        //instanciamos clase
        $fuerza= new FuerzaEgreso();
        $datos=$fuerza->GetConsultarFuerzasEgresoXfechas($fechaInicio,$fechaFin,$sede);
        
        //devolvemos json 
        echo json_encode($datos);
       
    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de consultar el perme inicial
    */
    public function GetPermeInicialXfechas(){
        //recibimos parametro por post
        $fechaInicio=$_POST["fechaInicio"];
        $fechaFin=$_POST["fechaFin"];
        $sede=$_POST["sede"];
        
        //instanciamos clase
        $estadistica= new EstadisticaTerapiafisica();
        $datos=$estadistica->GetPermeInicialXfechas($fechaInicio,$fechaFin,$sede);
        
        //devolvemos json 
        echo json_encode($datos);
       
    }


    /*
        @autor Jhon Giraldo
        Metodo encargado de consultar el perme  final
    */
    public function GetPermeFinalXfechas(){
        //recibimos parametro por post
        $fechaInicio=$_POST["fechaInicio"];
        $fechaFin=$_POST["fechaFin"];
        $sede=$_POST["sede"];
        
        //instanciamos clase
        $estadistica= new EstadisticaTerapiafisica();
        $datos=$estadistica->GetPermeFinalXfechas($fechaInicio,$fechaFin,$sede);
        
        //devolvemos json 
        echo json_encode($datos);
       
    }

    /*
        @autor Jhon Giraldo
        Metodo encargado de consultar pacientes que deambulan con vm
    */
    public function GetCantidadPacientesDeambulanconVM(){
        //recibimos parametro por post
        $fechaInicio=$_POST["fechaInicio"];
        $fechaFin=$_POST["fechaFin"];
        $sede=$_POST["sede"];
        
        //instanciamos clase
        $terapia= new TerapiaFisica();
        $datos=$terapia->GetCantidadPacientesDeambulanconVM($fechaInicio,$fechaFin,$sede);
        
        //devolvemos json 
        echo json_encode($datos);
       
    }

}

?>