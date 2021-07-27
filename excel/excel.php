<?php 

// error_reporting(E_ALL);
//   ini_set('display_errors', '1');
require "../Classes/PHPExcel.php";
require "../Classes/PHPExcel/Writer/Excel5.php"; 

session_start();
ob_start();
ini_set('memory_limit', '-1');

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

$sheet = $objPHPExcel->getActiveSheet();

//Start adding next sheets



       //Start adding next sheets
       $archivo=$_SESSION['val'];
       for ($i=0; $i <6 ; $i++) { 
        
       
        $objWorkSheet = $objPHPExcel->createSheet($i); //Setting index when creating
if($i==0){
   
 // Add new sheet


 //Write cells
 
 $objWorkSheet->setCellValue('A3', 'Codigo de Empleado')
        ->setCellValue('B3', 'Nombre')
        ->setCellValue('C3', 'Codigo de Pago')
        ->setCellValue('D3', 'Descripcion de pago')
        ->setCellValue('E3', 'Catidad de pago')
        ->setCellValue('F3', 'Transaccion Numero')
        ->setCellValue('G3', 'Sueldo de empleado')
        ->setCellValue('H3', 'Transaccion fecha')
        ->setCellValue('I3', 'Planilla codigo');

              $cont=4;
              for ($m=0; $m <=count($archivo['imp']) ; $m++) { 
                  $objWorkSheet->setCellValue('A'.$cont, $archivo['imp'][$m]['cempno'])
                  ->setCellValue('B'.$cont, $archivo['imp'][$m]['nombre'])
                  ->setCellValue('C'.$cont, $archivo['imp'][$m]['cpaycode'])
                  ->setCellValue('D'.$cont, $archivo['imp'][$m]['cref'])
                  ->setCellValue('E'.$cont, $archivo['imp'][$m]['monto'])
                  ->setCellValue('F'.$cont, $archivo['imp'][$m]['ctrsno'])
                  ->setCellValue('G'.$cont, $archivo['imp'][$m]['monto'])
                  ->setCellValue('H'.$cont, $archivo['imp'][$m]['dtrs'])
                  ->setCellValue('I'.$cont, $archivo['imp'][$m]['cplnid']);
                  $cont++;
              }


 // Rename sheet
 $msg="Sueldos y otros";

}
if($i==1){
   
    // Add new sheet
   
   
    //Write cells
    
    $objWorkSheet->setCellValue('A3', 'Codigo de Empleado')
            ->setCellValue('B3', 'Nombre')
            ->setCellValue('C3', 'Deducciones Codigo')
            ->setCellValue('D3', 'Descripcion de Codigo')
            ->setCellValue('E3', 'Catidad de la deducciones')
            ->setCellValue('F3', 'Sueldo de empleado')
            ->setCellValue('G3', 'Transaccion numero')
            ->setCellValue('H3', 'Transaccion Fechas')
            ->setCellValue('I3', 'Tipo de Planilla');
     
   
                 $cont1=4;
                 for ($p=0; $p <=count($archivo['isr']) ; $p++) { 
                     $objWorkSheet->setCellValue('A'.$cont1, $archivo['isr'][$p]['cempno'])
                     ->setCellValue('B'.$cont1, $archivo['isr'][$p]['nombre'])
                     ->setCellValue('C'.$cont1, $archivo['isr'][$p]['cdedcode'])
                     ->setCellValue('D'.$cont1, $archivo['isr'][$p]['cdesc'])
                     ->setCellValue('E'.$cont1, $archivo['isr'][$p]['ndedamt'])
                     ->setCellValue('F'.$cont1, $archivo['isr'][$p]['nmonthpay'])
                     ->setCellValue('G'.$cont1, $archivo['isr'][$p]['ctrsno'])
                     ->setCellValue('H'.$cont1, $archivo['isr'][$p]['tmodrec'])
                     ->setCellValue('I'.$cont1, $archivo['isr'][$p]['cplnid']);
          
                     $cont1++;
                 }
   
   
    // Rename sheet
    $msg="ISR_EQUIDAD";
  
   }
   if($i==2){
   
    // Add new sheet
   
   
    //Write cells
    
    $objWorkSheet->setCellValue('A3', 'Codigo de Empleado')
            ->setCellValue('B3', 'Nombre')
            ->setCellValue('C3', 'Deducciones Codigo')
            ->setCellValue('D3', 'Descripcion de Codigo')
            ->setCellValue('E3', 'Catidad de la deducciones')
            ->setCellValue('F3', 'Sueldo de empleado')
            ->setCellValue('G3', 'Transaccion numero')
            ->setCellValue('H3', 'Numero de Checke')
            ->setCellValue('I3', 'Tipo de Planilla')
            ->setCellValue('J3', 'Transaccion Fecha');
     
   
                 $cont3=4;
                 for ($a=0; $a <=count($archivo['susp']) ; $a++) { 
                     $objWorkSheet->setCellValue('A'.$cont3, $archivo['susp'][$a]['cempno'])
                     ->setCellValue('B'.$cont3, $archivo['susp'][$a]['nombre'])
                     ->setCellValue('C'.$cont3, $archivo['susp'][$a]['cpaycode'])
                     ->setCellValue('D'.$cont3, $archivo['susp'][$a]['cref'])
                     ->setCellValue('E'.$cont3, $archivo['susp'][$a]['nothntax'])
                     ->setCellValue('F'.$cont3, $archivo['susp'][$a]['nmonthpay'])
                     ->setCellValue('G'.$cont3, $archivo['susp'][$a]['ctrsno'])
                     ->setCellValue('H'.$cont3, $archivo['susp'][$a]['cchkno'])
                     ->setCellValue('I'.$cont3, $archivo['susp'][$a]['cplnid'])
                     ->setCellValue('J'.$cont3, $archivo['susp'][$a]['dtrs']);
                  
          
                     $cont3++;
                 }
   
   
    // Rename sheet
  
    $msg="ISR_EQUIDAD";
   }

   if($i==3){
   
    // Add new sheet
   
   
    //Write cells
    
    $objWorkSheet->setCellValue('A3', 'Codigo de Empleado')
            ->setCellValue('B3', 'Nombre')
            ->setCellValue('C3', 'Deducciones Codigo')
            ->setCellValue('D3', 'Descripcion de Codigo')
            ->setCellValue('E3', 'Catidad de la deducciones')
            ->setCellValue('F3', 'Sueldo de empleado')
            ->setCellValue('G3', 'Transaccion numero')
            ->setCellValue('H3', 'Transaccion Fechas')
            ->setCellValue('I3', 'Tipo de Planilla');
     
   
                 $cont4=4;
                 for ($b=0; $b <=count($archivo['hoja3']) ; $b++) { 
                     $objWorkSheet->setCellValue('A'.$cont4, $archivo['hoja3'][$b]['cempno'])
                     ->setCellValue('B'.$cont4, $archivo['hoja3'][$b]['nombre'])
                     ->setCellValue('C'.$cont4, $archivo['hoja3'][$b]['cdedcode'])
                     ->setCellValue('D'.$cont4, $archivo['hoja3'][$b]['cdesc'])
                     ->setCellValue('E'.$cont4, $archivo['hoja3'][$b]['ndedamt'])
                     ->setCellValue('F'.$cont4, $archivo['hoja3'][$b]['nmonthpay'])
                     ->setCellValue('G'.$cont4, $archivo['hoja3'][$b]['ctrsno'])
                     ->setCellValue('H'.$cont4, $archivo['hoja3'][$b]['tmodrec'])
                     ->setCellValue('I'.$cont4, $archivo['hoja3'][$b]['cplnid']);
          
                     $cont4++;
                 }
   
   
    // Rename sheet
  
    $msg="ISR_EQUIDAD";
   }
   if($i==4){
   
    // Add new sheet
   
   
    //Write cells
    
    $objWorkSheet->setCellValue('A3', 'Codigo de Empleado')
            ->setCellValue('B3', 'Nombre')
            ->setCellValue('C3', 'Deducciones Codigo')
            ->setCellValue('D3', 'Descripcion de Codigo')
            ->setCellValue('E3', 'Catidad de la deducciones')
            ->setCellValue('F3', 'Sueldo de empleado')
            ->setCellValue('G3', 'Transaccion numero')
            ->setCellValue('H3', 'Transaccion Fechas')
            ->setCellValue('I3', 'Tipo de Planilla');
     
   
                 $cont5=4;
                 for ($c=0; $c <=count($archivo['Colegiaciones']) ; $c++) { 
                     $objWorkSheet->setCellValue('A'.$cont5, $archivo['Colegiaciones'][$c]['cempno'])
                     ->setCellValue('B'.$cont5, $archivo['Colegiaciones'][$c]['nombre'])
                     ->setCellValue('C'.$cont5, $archivo['Colegiaciones'][$c]['cdedcode'])
                     ->setCellValue('D'.$cont5, $archivo['Colegiaciones'][$c]['cdesc'])
                     ->setCellValue('E'.$cont5, $archivo['Colegiaciones'][$c]['ndedamt'])
                     ->setCellValue('F'.$cont5, $archivo['Colegiaciones'][$c]['nmonthpay'])
                     ->setCellValue('G'.$cont5, $archivo['Colegiaciones'][$c]['ctrsno'])
                     ->setCellValue('H'.$cont5, $archivo['Colegiaciones'][$c]['tmodrec'])
                     ->setCellValue('I'.$cont5, $archivo['Colegiaciones'][$c]['cplnid']);
          
                     $cont5++;
                 }
   
   
    // Rename sheet
  
    $msg="ISR_EQUIDAD";
   }
   if($i==5){
   
    // Add new sheet
   
   
    //Write cells
    
    $objWorkSheet->setCellValue('A3', 'Codigo de Empleado')
            ->setCellValue('B3', 'Nombre')
            ->setCellValue('C3', 'Deducciones Codigo')
            ->setCellValue('D3', 'Descripcion de Codigo')
            ->setCellValue('E3', 'Catidad de la deducciones')
            ->setCellValue('F3', 'Sueldo de empleado')
            ->setCellValue('G3', 'Transaccion numero')
            ->setCellValue('H3', 'Numero de Checke')
            ->setCellValue('I3', 'Tipo de Planilla')
            ->setCellValue('J3', 'Transaccion Fecha');
     
   
                 $cont6=4;
                 for ($n=0; $n <=count($archivo['ihss']) ; $n++) { 
                     $objWorkSheet->setCellValue('A'.$cont6, $archivo['ihss'][$n]['cempno'])
                     ->setCellValue('B'.$cont6, $archivo['ihss'][$n]['nombre'])
                     ->setCellValue('C'.$cont6, $archivo['ihss'][$n]['cpaycode'])
                     ->setCellValue('D'.$cont6, $archivo['ihss'][$n]['cref'])
                     ->setCellValue('E'.$cont6, $archivo['ihss'][$n]['nothntax'])
                     ->setCellValue('F'.$cont6, $archivo['ihss'][$n]['nmonthpay'])
                     ->setCellValue('G'.$cont6, $archivo['ihss'][$n]['ctrsno'])
                     ->setCellValue('H'.$cont6, $archivo['ihss'][$n]['cchkno'])
                     ->setCellValue('I'.$cont6, $archivo['ihss'][$n]['cplnid'])
                     ->setCellValue('J'.$cont6, $archivo['ihss'][$n]['dtrs']);
                  
          
                     $cont6++;
                 }
   
   
    // Rename sheet
    $msg="ISR_EQUIDAD";
  
   }
   $objWorkSheet->setTitle("$i");

     
       }
 

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