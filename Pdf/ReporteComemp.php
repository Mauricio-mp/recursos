<?php 
session_start();
ob_start();

require('fpdf/WriteTag.php');
require('ConversionLetras.php');
include('Funciones.php');
$mes=$_GET['mes'];

$datos=mostrardatosCOMEMP($mes);
$num=count($datos);
class PDF extends PDF_WriteTag
{
function Header()
{

    // Logo
    //$this->Image('../img/9.png',70,6,75);
    $this->Image("../images/logo.png",70,5,75,0,"","../index.php?page=home");
    // Arial bold 15
      $this->Ln(30);
     $this->SetFont('Arial','B',11);
     $this->Cell(185,0,'DEPARTAMENTO DE PERSONAL',0,0,'C');
     $this->Ln(5);
     $this->Cell(185,0,'SECCION DE PANILLAS',0,0,'C');
     $this->Ln(9);
     $this->Cell(185,0,'REPORTE DE DEDDUCCIONES ',0,0,'C');
    
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
    
  //   global $nombreCompleto;
  //   global $Empleado;
  //   global $identidad;
  //  $this->SetFont('Arial','I',8);
 
  // $this->SetY(-15);
  // $this->Cell(185,0,'Nombre: '.$nombreCompleto,0,0,'L');
  //  $this->Ln(3);
  //  $this->Cell(185,0,'Codigo: '.$Empleado,0,0,'L');
  //  $this->Ln(3);
  //  $this->Cell(185,0,'Identidad: '.$identidad,0,0,'L');
  // Arial italic 8
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








// $pdf->Cell(30,0,"Nombre Completo",0,1,'L'); 
// $pdf->Cell(30,0,"Nombre Completo",0,1,'L'); 
// $pdf->Cell(30,0,"Nombre Completo",0,1,'L'); 
// $pdf->Cell(120,0,utf8_encode(trim($Data[0])." ".trim($Data[1])),1,1,'R'); 
// $pdf->Ln(10);
// $pdf->Cell(30,0,"Identidad",0,1,'L'); 
// $pdf->Cell(120,0,utf8_encode(trim($Data[0])),0,1,'R'); 



// $pdf->SetXY(20, 50);
// $pdf->SetFont('Arial','B',14);
// $pdf->Cell(15,6,"Nombre Completo",0,1,"L"); 
// $pdf->Ln(10);
// $pdf->SetXY(80, 50);
// $pdf->SetFont('Arial','',14);
// $pdf->Cell(15,6,"Denis Mauricio"." "."Lopez Larreynaga",0,1,"L"); 
// $pdf->SetXY(20, 60);
// $pdf->SetFont('Arial','B',14);
// $pdf->Cell(15,6,"Identidad",0,1,"L"); 
// $pdf->SetXY(80, 60);
// $pdf->SetFont('Arial','',14);
// $pdf->Cell(15,6,"0318-1994-01214",0,1,"L"); 

$pdf->Ln(10);
$cont1=87;
$cont2=87;
$cont3=128;

$cont4=87;
$cont5=93;

$cont6=99;

$pdf->SetFont('Arial','B',10);
  $pdf->Cell(20, 7, 'Nombre', 0, 1, 'L', false);
  $pdf->Cell(70, -6, 'Codigo', 0, 1, 'R', false);
  $pdf->Cell(95, 6, 'Monto', 0, 1, 'R', false);
  $pdf->Cell(138, -6, 'Descripcion', 0, 1, 'R', false);
  $pdf->Cell(155, 6, 'Planilla', 0, 1, 'R', false);
  $pdf->Cell(170, -6, 'fecha', 0, 1, 'R', false);
  $pdf->Ln(5);
for($i=0;$i<$num;$i++){
  $cont1=$cont1+7;

  $cont2=$cont2+15;
  $cont3=$cont3+10;

  $cont4=$cont4+6;
  $cont5=$cont5+15;

  $cont6=$cont6+15;

  $pdf->Ln(3);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(20, 5, $datos[$i]['nombre'], 0, 1, 'L', false);
  $pdf->Ln(-3);
  $pdf->Cell(70, 0, $datos[$i]['cempno'], 0, 1, 'R', false);
  $pdf->Ln(2);
  $pdf->Cell(95, -3, $datos[$i]['ndedamt'], 0, 1, 'R', false);
  $pdf->Ln(2);
  $pdf->Cell(138, -2, $datos[$i]['cdesc'], 0, 1, 'R', false);
  $pdf->Ln(2);
  $pdf->Cell(155, -2, trim($datos[$i]['cplnid']), 0, 1, 'R', false);
  $pdf->Ln(2);
  $pdf->Cell(170, -2, trim($datos[$i]['tlstdate']), 0, 1, 'R', false);

 
 
  
  





  //$pdf->Line(20, $cont3, 170, $cont3);
  
}

// $pdf->Line(20, 80, 170, 80);


// /* --- Cell --- */
// $pdf->SetXY(20, 87);
// $pdf->Cell(20, 7, $num, 0, 1, 'L', false);
// /* --- Cell --- */
// $pdf->SetXY(58, 87);
// $pdf->Cell(71, 7, 'Denis Lopez', 0, 1, 'L', false);
// /* --- Cell --- */
// $pdf->SetXY(20, 93);
// $pdf->Cell(0, 7, 'Codigo', 0, 1, 'L', false);
// /* --- Cell --- */
// $pdf->SetXY(58, 93);
// $pdf->Cell(0, 7, '006352', 0, 1, 'L', false);
// /* --- Cell --- */
// $pdf->SetXY(20, 99);
// $pdf->Cell(24, 7, 'Planilla', 0, 1, 'L', false);
// /* --- Cell --- */
// $pdf->SetXY(58, 99);
// $pdf->Cell(0, 7, 'OG', 0, 1, 'L', false);

// $pdf->SetXY(20, 105);
// $pdf->Cell(24, 7, 'Fecha de ingreso', 0, 1, 'L', false);
// /* --- Cell --- */
// $pdf->SetXY(58, 105);
// $pdf->Cell(0, 7, '01/08/2020', 0, 1, 'L', false);

// $pdf->SetXY(20, 111);
// $pdf->Cell(24, 7, 'monto', 0, 1, 'L', false);
// /* --- Cell --- */
// $pdf->SetXY(58, 111);
// $pdf->Cell(0, 7, 'L.98,09', 0, 1, 'L', false);

// /* --- Cell --- */
// $pdf->SetXY(20, 117);
// $pdf->Cell(0, 7, 'Descripcion', 0, 1, 'L', false);

// /* --- Cell --- */
// $pdf->SetXY(58, 117);
// $pdf->Cell(0, 7, 'COMEMP', 0, 1, 'L', false);

// $pdf->Line(20, 128, 170, 128);
// for ($i=0; $i <$contarData ; $i++) { 
// $saltolineaPermiso=$saltolineaPermiso+7;


//   $pdf->SetXY(18, $saltolineaPermiso );
//   $pdf->SetFont('Arial','',12);
//   $pdf->Cell(15,6,$data[$i]['cMotivo'],0,1,"L");

//   $pdf->SetXY(77, $saltolineaPermiso );
//   $pdf->Cell(15,6,$data[$i]['fDesde'],0,1,"L");

//   $pdf->SetXY(110, $saltolineaPermiso );
//   $pdf->Cell(15,6,$data[$i]['fHasta'],0,1,"L");


//   $pdf->SetXY(140, $saltolineaPermiso );
//   $pdf->Cell(15,6,$data[$i]['iDias'],0,1,"L");

//    $pdf->SetXY(155, $saltolineaPermiso );
//   $pdf->Cell(15,6,$data[$i]['iHorasDiarias'],0,1,"L");

//   $pdf->SetXY(165, $saltolineaPermiso );
//   $pdf->Cell(15,6,$data[$i]['cMotivo'],0,1,"L");


// }




$pdf->Output();
?>
