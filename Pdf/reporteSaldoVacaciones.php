<?php 
session_start();
ob_start();

require('fpdf/WriteTag.php');
require('ConversionLetras.php');
include('Funciones.php');


$identidad=$_SESSION["idem"];
$periodo=$_SESSION["periodoseleccionar"];
$jefes=$_SESSION["jefes"];
$observacion=$_SESSION["observacionsaldo"];
$nombre= $_SESSION['logeo'];










//$datos=mostrardatosTrab($mes);
//$num=count($datos);
class PDF extends PDF_WriteTag
{
function Header()
{

  setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
    // Logo
    $this->Image("../images/logo.png",65,5,75,0,"","../index.php?page=home");
  
    // Arial bold 15
      $this->Ln(30);
     $this->SetFont('Arial','B',11);
     $this->Cell(185,0,'INFORME SALDO DE VACACIONES',0,0,'C');
     
    
    //$this->SetTextColor(194,8,8);
    //$this->Cell(45,0,'Prueba',0,0,'C');
    // Move to the right
     $this->SetFont('Times','B',14);
     $this->SetTextColor(0,0,0);
    $this->Ln(30);
   // $this->Cell(72);
    // Title

    //$this->Cell(45,0,'CONSTANCIA',0,0,'C');
    // Line break
    //$this->Ln(20);
}

// Page footer
function Footer()
{
    

  $this->SetFont('Arial','',8);
  
  $this->SetY(-10);
  $this->Cell(0,10,'Pagina '.$this->PageNo().' de {nb}',0,0,'C');

}

}

// Instanciation of inherited class


$pdf=new PDF();
$pdf->AddPage();

//marca de agua


$pdf->SetAlpha(0.2);


 $pdf->Image('../img/9.png',0,85,225);

 $pdf->SetAlpha(1);

$pdf->SetFont('Arial','',13);
$pdf->SetLeftMargin(18); #Establecemos los márgenes izquierda: 
$pdf->SetRightMargin(18); #Establecemos los márgenes Derecha: 
$pdf->AliasNbPages();





// Stylesheet
$pdf->SetStyle("p","Arial","",10,"0,0,0",0);
$pdf->SetStyle("h1","arial","N",13,"0,0,0",0);
$pdf->SetStyle("a","arial","BU",13,"0,0,0");
$pdf->SetStyle("pers","arial","I",0,"0,0,0");
$pdf->SetStyle("place","arial","U",0,"0,0,0");
$pdf->SetStyle("vb","arial","B",11,"0,0,0");


$pdf->SetFont('Arial','B',10);

$pdf->Cell(45, 10, 'NOMBRE DEL EMPLEADO ', 0, 1, 'L', false); 
      $pdf->Cell(45, 10, 'IDENTIDAD', 0, 1, 'L', false);
      $pdf->Cell(15, 10, 'CARGO', 0 ,1, 'L', false);
      $pdf->Cell(30, 10, 'ACUERDO', 0, 1, 'L', false);
      $pdf->Cell(45, 10, 'LOCALIZACION', 0, 1, 'L', false);
      $pdf->Cell(45, 10, utf8_decode('AÑO'), 0, 1, 'L', false);
      $pdf->Cell(45, 10, 'OBSERVACIONES', 0, 1, 'L', false);



      
      foreach($observacion as $obs){
        $pdf->MultiCell(120,5,'* '. utf8_decode($obs) ,0,'J',false);
        $pdf->Ln(5);
        
      }
    

     
      $pdf->Ln(5);

  
  
      $pdf->Cell(0,10,'Tegucigalpa M.D.C'.' '.date('d').' '.'dias del mes de'.' '.date('M').' '.'del'.' '.date('Y'),0,1,'L');
      $pdf->Ln(25);
      
      $pdf->Cell(0, 10, '_____________________________'.'                                                '.'_____________________________', 0, 1, 'L', false);
      $pdf->Cell(0, 1, '             '.$nombre.'                                                                         '.utf8_decode($jefes), 0, 1, 'L', false);
      $pdf->Cell(0, 10, '           '.'ELABORADO POR'.'                                                                   '.'JEFE SECCION DE TRAMITE', 0, 1, 'L', false);
   











$pdf->Output();
?>