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
$arraydatos=$_SESSION['codidoEmpleado'];
if($_SESSION['codidoEmpleado']=='' || $_SESSION["periodoseleccionar"]==''){
  header('Location: index.php');
}









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
     $this->Cell(185,0,'SALDO DE VACACIONES',0,0,'C');
     
    
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

function TablaBasica($header)
   {
    //Cabecera
    foreach($header as $col)
    // $this->Cell(40,7,$col,1);
    $contrato="Sin fecha Acuerdo";
    if(strtotime($col['dcntrct'])==''){
      $contrato="Sin fecha Acuerdo";
    }
    if(strtotime($col['dhire'])==strtotime($col['dcntrct'])){
      //$contrato= date('d',strtotime($col['dcntrct']))." de ".GetMes(date('m',strtotime($col['dcntrct'])))." del ".date('Y',strtotime($col['dcntrct']));
      $contrato=date('d/m/Y',strtotime($col['dcntrct']));
    }else if(strtotime($col['dhire'])< strtotime($col['dcntrct'])){
      //$contrato= date('d',strtotime($col['dcntrct']))." de ".GetMes(date('m',strtotime($col['dcntrct'])))." del ".date('Y',strtotime($col['dcntrct']));
      $contrato=date('d/m/Y',strtotime($col['dcntrct']));
    }
    $this->Ln();
   
      $this->Cell(65,12,"CODIGO",0);
      $this->Cell(65,12,$col['cempno'],0);
     
      $this->Ln();
      $this->Cell(65,12,"NOMBRE ",0);
      $this->Cell(65,12,utf8_decode(trim($col['cfname']))."\t".utf8_decode(trim($col['clname'])) ,0);
      $this->Ln();
      $this->Cell(65,12,"IDENTIDAD ",0);
      $this->Cell(65,12,trim($col['cfedid']),0);
      $this->Ln();
      $this->Cell(65,12,"ACUERDO ",0);
      $this->Cell(65,12,$contrato,0);
      $this->Ln();
      $this->Cell(65,12,"CARGO ",0);
      $this->Cell(65,12,utf8_decode($col['Cargo']),0);
      $this->Ln();
      $this->Cell(65,12,"DEPENDENCIA ",0);
      $this->Cell(65,12,utf8_decode($col['Departamento']),0);
     
      $this->Ln();
   }
  function Tabla()
   {
    $mensaje='Tegucigalpa M.D.C'.' '.date('d').' '.'dias del mes de'.' '.date('M').' '.'del'.' '.date('Y');
    $this->Cell(65,12,"LUGAR Y FECHA:",0);
    $this->SetFont('Arial','I',11);
    
    $this->Cell(65, 12, $mensaje, 0, 1, 'R', false);
    $this->SetFont('Arial','B',9);
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
$pdf->SetStyle("p","Arial","I",10,"0,0,0",0);
$pdf->SetStyle("h1","arial","B",11,"0,0,0",0);
$pdf->SetStyle("a","arial","BU",13,"0,0,0");
$pdf->SetStyle("pers","arial","I",0,"0,0,0");
$pdf->SetStyle("place","arial","U",0,"0,0,0");
$pdf->SetStyle("vb","arial","B",11,"0,0,0");


$pdf->SetFont('Arial','B',10);
//$header=array('Columna 1','Columna 2','Columna 3','Columna 4');
$pdf->AliasNbPages();
//Primera página

$pdf->SetY(65);
//$pdf->AddPage()
$pdf->TablaBasica($arraydatos);
/*$pdf->Cell(45, 10, 'NOMBRE DEL EMPLEADO ', 0, 1, 'L', false); 
      $pdf->Cell(45, 10, 'IDENTIDAD', 0, 1, 'L', false);
      $pdf->Cell(15, 10, 'CARGO', 0 ,1, 'L', false);
      $pdf->Cell(30, 10, 'ACUERDO', 0, 1, 'L', false);
      $pdf->Cell(45, 10, 'LOCALIZACION', 0, 1, 'L', false);
      $pdf->Cell(45, 10, utf8_decode('AÑO'), 0, 1, 'L', false); */
      $pdf->Cell(45, 10, 'OBSERVACIONES:', 0, 1, 'L', false);

      
      $pdf->SetFont('Arial','I',10);
      foreach($observacion as $obs){
        $pdf->MultiCell(175,5,'- '. utf8_decode($obs) ,0,'J',false);
        $pdf->Ln(5);
        
      }

      $pdf->SetFont('Arial','B',10);

     
      $pdf->Ln(5);
      $pdf->Tabla();
 
      $pdf->Ln(25);
   
      
    
   

      $pdf->Ln();
      $pdf->Cell(85,10,"_______________________________________",0,0,'C',0);
      $pdf->Cell(85,10,"______________________________________ ",0,0,'C',0);
      
      $pdf->Ln();
      $pdf->Cell(85,5,utf8_decode($nombre),0,0,'C',0);
      $pdf->Cell(85,5,utf8_decode($jefes),0,0,'C',0);
      $pdf->Ln();
      $pdf->Cell(85,5,"ELABORADO POR",0,0,'C',0);
      $pdf->Cell(85,5,"JEFE DE SECCION DE TRAMITE",0,0,'C',0);









$pdf->Output();


?>