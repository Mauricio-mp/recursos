<?php 
session_start();
ob_start();

require('fpdf/WriteTag.php');
require('ConversionLetras.php');
include('Funciones.php');
  $periodoempleado=$_SESSION["myString"];
 $identidad=$_SESSION["idem"];
 $jefes1=$_SESSION["jefes1"];


//$datos=mostrardatosTrab($mes);
//$num=count($datos);
class PDF extends PDF_WriteTag
{
function Header()
{

    // Logo
    //$this->Image('../img/9.png',70,6,75);
    $this->Image("../images/logo.png",65,5,75,0,"","../index.php?page=home");
    // Arial bold 15
      $this->Ln(30);
     $this->SetFont('Arial','B',11);
     $this->Cell(185,0,'INFORME DE VACACIONES',0,0,'C');
     
    
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

  
  


    ConexionSQLRecursosHumanos();
    $sql=mssql_query("select h.fDesde,h.fHasta,h.iDias,h.iHorasDiarias,s.cPeriodo, h.cObservaciones from PR_Permisos s inner join PR_PermisoH h on s.cPermisoId = h.cPermisoId where s.cPeriodo in($periodoempleado) and s.cPersonaId='$identidad'");
    while($row=mssql_fetch_array($sql)) {
      $pdf->Cell(45, 10, 'Fecha Inicio (Inclusive) ', 0, 0, 'C', false); 
      $pdf->Cell(45, 10, 'Fecha fin (Inclusive)', 0, 0, 'C', false);
      $pdf->Cell(15, 10, 'Dias', 0 ,0, 'C', false);
      $pdf->Cell(30, 10, 'Horas por Dia', 0, 0, 'C', false);
      $pdf->Cell(45, 10, 'Periodo', 0, 1, 'C', false);
      
      $pdf->Cell(45, 5, $row['fDesde']=date('d/m/Y',strtotime($row['fDesde'])), 0, 0, 'C', false);
      $pdf->Cell(35, 5, $row['fHasta']=date('d/m/Y',strtotime($row['fHasta'])), 0, 0, 'C', false);
      $pdf->Cell(35, 5, $row['iDias']= round($row['iDias']), 0, 0, 'C', false);
      $pdf->Cell(10,5, $row['iHorasDiarias']= round($row['iHorasDiarias']), 0, 0, 'C', false);
      $pdf->Cell(65,5, $row['cPeriodo'], 0, 1, 'C', false);
      $pdf->Cell(0,5, 'Autorizado Por:Denis', 0, 1, 'L', false);
      $pdf->Cell(0,5,'Observacion: ' .$row['cObservaciones'], 0, 1, 'L', false);
      $pdf->Cell(0,5,'----------------------------------------------------------------------------------------------------------------------------------------------', 0, 1, 'L', false);
        
        $pdf->Ln(1);
}


$pdf->Ln(10);
$pdf->Cell(0,5,'Saldo a la fecha: ', 0, 1, 'L', false);

$sql1=mssql_query("select iDisponibilidad, cPeriodo from pr_permisos where cPersonaId='$identidad' and cPeriodo in($periodoempleado)");
while($row=mssql_fetch_array($sql1)){
  $pdf->Cell(0,5,$row['cPeriodo'].':'.' '. $row['iDisponibilidad'].' '.'dias habiles', 0, 1, 'L', false);
}
$pdf->Cell(0,10,'Tegucigalpa M.D.C'.' '.date('d').' '.'dias del mes de'.' '.date('F').' '.'del'.' '.date('Y'),0,1,'L');
$pdf->Ln(25);

$pdf->Cell(0, 10, '_____________________________'.'                                                '.'_____________________________', 0, 1, 'L', false);
$pdf->Cell(0, 10, '             '.'Elaborado por'.'                                                                          '. utf8_decode($jefes1), 0, 1, 'L', false);








$pdf->Output();
?>