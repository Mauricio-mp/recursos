<?php 


require('fpdf/WriteTag.php');
require('ConversionLetras.php');
include('Funciones.php');


$Identidad=$_GET["Identidad"];
$FechaIni=$_GET["FechaIni"];
$FechaFin=$_GET["FechaFin"];

$nombre= mostrarDatosEmpleado($Identidad);

$data=mostrarhistorial($Identidad,$FechaIni,$FechaFin);

$contarData=count($data);

$saltolineaPermiso=85;

class PDF extends PDF_WriteTag
{
function Header()
{

    // Logo
    //$this->Image('../img/9.png',70,6,75);
    // Arial bold 15
      $this->Ln(7);
     $this->SetFont('Arial','B',14);
     $this->Cell(185,0,'MINISTERIO PUBICO',0,0,'C');
     $this->Ln(7);
     $this->Cell(185,0,'Departamento de Personal',0,0,'C');
     $this->Ln(7);
     $this->Cell(185,0,'HISTORIAL DE PERMISOS',0,0,'C');
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
  // Número de página
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

// $pdf->Cell(30,0,"Nombre Completo",0,1,'L'); 
// $pdf->Cell(30,0,"Nombre Completo",0,1,'L'); 
// $pdf->Cell(30,0,"Nombre Completo",0,1,'L'); 
// $pdf->Cell(120,0,utf8_encode(trim($Data[0])." ".trim($Data[1])),1,1,'R'); 
// $pdf->Ln(10);
// $pdf->Cell(30,0,"Identidad",0,1,'L'); 
// $pdf->Cell(120,0,utf8_encode(trim($Data[0])),0,1,'R'); 



$pdf->SetXY(20, 50);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(15,6,"Nombre Completo",0,1,"L"); 
$pdf->Ln(10);
$pdf->SetXY(80, 50);
$pdf->SetFont('Arial','',14);
$pdf->Cell(15,6,trim($nombre[0])." ".trim($nombre[1]),0,1,"L"); 
$pdf->SetXY(20, 60);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(15,6,"Identidad",0,1,"L"); 
$pdf->SetXY(80, 60);
$pdf->SetFont('Arial','',14);
$pdf->Cell(15,6,$Identidad,0,1,"L"); 

$pdf->Ln(10);
$pdf->SetXY(18, 80);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(15,6,"Permiso/Licencia",0,1,"L"); 
$pdf->SetXY(60, 80);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(15,6,"Inicio",0,1,"L"); 
$pdf->SetXY(90, 80);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(15,6,"Fin",0,1,"L"); 
$pdf->SetXY(113, 80);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(15,6,"Dias",0,1,"L"); 
$pdf->SetXY(126, 80);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(15,6,"Horas",0,1,"L"); 
$pdf->SetXY(143, 80);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(15,6,"Motivo",0,1,"L");
$pdf->SetXY(165, 80);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(15,6,"Periodo",0,1,"L");
$pdf->SetLineWidth(0.4);
$pdf->line(20, 87, 190, 87);

for ($i=0; $i <$contarData ; $i++) { 
$pdf->SetFont('Arial','',11);
  $pdf->Cell(15,5,"",0,1,"L");
$pdf->Cell(15,3,$data[$i]['cMotivo'],0,1,"L");

$pdf->Cell(60,-3,"",0,1,"C");
$pdf->Cell(60,3,$data[$i]['fDesde'],0,1,"R");

$pdf->Cell(90,-3,"",0,1,"C");
$pdf->Cell(90,3,$data[$i]['fHasta'],0,1,"R");

$pdf->Cell(105,-3,"",0,1,"C");
$pdf->Cell(105,3,$data[$i]['iDias'],0,1,"R");

$pdf->Cell(120,-3,"",0,1,"C");
$pdf->Cell(120,3,$data[$i]['iHorasDiarias'],0,1,"R");

$pdf->Cell(143,-3,"",0,1,"C");
$pdf->Cell(143,3,$data[$i]['cMotivo'],0,1,"R");

$pdf->Cell(170,-3,"",0,1,"C");
$pdf->Cell(170,3,$data[$i]['cPeriodo'],0,1,"R");



  }
$pdf->Cell(15,6,"",0,1,"L");
$pdf->Cell(175,6,"-----------------  Fin de Pagina  ------------------",0,1,"C");



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