<?php 

// error_reporting(E_ALL);
//   ini_set('display_errors', '1');
require "../Classes/PHPExcel.php";
require "../Classes/PHPExcel/Writer/Excel5.php"; 

session_start();
ob_start();
ini_set('memory_limit', '-1');
$var=$_SESSION['generales'];
$objPHPExcel = new PHPExcel();
// Set document properties
$objPHPExcel->getProperties()->setCreator("Govinda")
                             ->setLastModifiedBy("Govinda")
                             ->setTitle("Office 2007 XLSX Test Document")
                             ->setSubject("Office 2007 XLSX Test Document")
                             ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                             ->setKeywords("office 2007 openxml php")
                             ->setCategory("Test result file");

// Add some data
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(35);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(35);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(35);

$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('B3', 'Codigo de empleado')
->setCellValue('C3', 'Nombre')
->setCellValue('D3', 'Identidad')
->setCellValue('E3', 'Estado')
->setCellValue('F3', 'Puesto')
->setCellValue('G3', 'Fecha Nacimineto')
->setCellValue('H3', 'Departamento')
->setCellValue('I3', 'Sueldo Mensual')
->setCellValue('J3', 'Fecha Contrato')
->setCellValue('K3', 'Fecha Acuerdo')
->setCellValue('L3', 'Planilla')
->setCellValue('M3', 'Region de Impuesto')
->setCellValue('N3', 'Sexo')
->setCellValue('O3', 'Direccion 1')
->setCellValue('P3', 'Direccion 2')
->setCellValue('Q3', 'Cuenta Presupuestaria');
// Miscellaneous glyphs, UTF-8

$cont=4;
for ($i=0; $i <=count($var) ; $i++) { 
    
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$cont, $var[$i]['cempno']);
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$cont, utf8_encode(trim($var[$i]['cfname']))." ".utf8_encode(trim($var[$i]['clname'])) );
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$cont, $var[$i]['cfedid']);
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$cont, $var[$i]['cstatus']);
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$cont, utf8_encode($var[$i]['cDesc']));
    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$cont, $var[$i]['dbirth']);
    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$cont, $var[$i]['cdeptname']);
    $objPHPExcel->getActiveSheet()->SetCellValue('I'.$cont, $var[$i]['nmonthpay']);
    $objPHPExcel->getActiveSheet()->SetCellValue('J'.$cont, $var[$i]['dhire']);
    $objPHPExcel->getActiveSheet()->SetCellValue('K'.$cont, $var[$i]['dcntrct']);
    $objPHPExcel->getActiveSheet()->SetCellValue('L'.$cont, $var[$i]['cplnid']);
    $objPHPExcel->getActiveSheet()->SetCellValue('M'.$cont, $var[$i]['ctaxstate']);
    $objPHPExcel->getActiveSheet()->SetCellValue('N'.$cont, $var[$i]['csex']);
    $objPHPExcel->getActiveSheet()->SetCellValue('O'.$cont, utf8_encode($var[$i]['caddr1']));
    $objPHPExcel->getActiveSheet()->SetCellValue('P'.$cont, utf8_encode($var[$i]['caddr2']));
    $objPHPExcel->getActiveSheet()->SetCellValue('Q'.$cont, utf8_encode($var[$i]['cwageacc']));

    
    $cont++;
}
    



// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Hoja1');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment;filename="userList.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');

?>