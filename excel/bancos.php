<?php 

// error_reporting(E_ALL);
//   ini_set('display_errors', '1');
require "../Classes/PHPExcel.php";
require "../Classes/PHPExcel/Writer/Excel5.php"; 
header('Content-Type: text/html; charset=ISO-8859-1');
session_start();
ob_start();
ini_set('memory_limit', '-1');
$var=$_SESSION['datosbanco'];
$bancos=$_SESSION['bancos'];
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
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(60);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);

$objPHPExcel->getActiveSheet()->getStyle("A3")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("B3")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("C3")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("D3")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("E3")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("F3")->getFont()->setBold(true);


$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A3', 'Apellido')
->setCellValue('B3', 'Nombre')
->setCellValue('C3', 'Identidad')
->setCellValue('D3', 'Monto')
->setCellValue('E3', 'Cuenta')
->setCellValue('F3', 'Descripcion');




// Miscellaneous glyphs, UTF-8

$cont=4;
$total=0;
for ($k=0; $k <=count($bancos) ; $k++) { 
    $subtotal=0;
    for ($i=0; $i <=count($var) ; $i++) { 
      # code...
     
if(trim($bancos[$k]['cbankname1'])==trim($var[$i]['cbankname1'])){

$subtotal=$var[$i]['nchkamt']+$subtotal;
$total=$var[$i]['nchkamt']+$total;
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$cont, $var[$i]['clname']);
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$cont, $var[$i]['cfname']);
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$cont, $var[$i]['cfedid']);
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$cont, $var[$i]['nchkamt']);
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$cont, $var[$i]['cbankacct1']);
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$cont, $var[$i]['cbankname1']);
    $cont++;
}
 
  
 
  
    
}

$objPHPExcel->getActiveSheet()->SetCellValue('D'.$cont,number_format($subtotal,2))->getStyle('D'.$cont)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->SetCellValue('F'.$cont,"Total \t".$bancos[$k]['cbankname1'])->getStyle('F'.$cont)->getFont()->setBold(true);

$cont++;

}

$objPHPExcel->getActiveSheet()->SetCellValue('A'.$cont,"Total:".number_format($total,2));




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