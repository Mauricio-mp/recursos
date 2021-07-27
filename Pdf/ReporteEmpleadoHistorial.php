<?php 
$Cod=$_GET['x'];
$fmin=$_GET['fmin'];
$fmax=$_GET['fmax'];

include('../libs/dao.php');



require('fpdf/WriteTag.php');
require('ConversionLetras.php');

ConexionSQLserverVAM();

$consultaEmpleado=mssql_query("SELECT * FROM prempy WHERE cempno='$Cod'");
if($datos=mssql_fetch_array($consultaEmpleado)){
  $Nombre= utf8_decode(trim($datos['cfname']));
  $apellido=utf8_decode(trim($datos['clname']));
  $nombreCompleto=utf8_encode($Nombre)."\t".utf8_encode($apellido);
  $sueldo = number_format($datos['nmonthpay'],2);

  $identidad=$datos['cfedid'];
  $Empleado=$datos['cempno'];
  $cargo=utf8_encode(trim($datos['cjobtitle']));
  $asignacion=utf8_encode(trim($datos['cdeptno']));
  $fehacon=$datos['dhire'];
  $fehaAc=$datos['dcntrct'];

  if($datos['dterminate']==''){
    $fechaDespido="sin despido";
  }else{
    $fechaDespido=date('d/m/Y',strtotime($datos['dterminate']));
  }

}
$mostrarDesc=mssql_query("SELECT * FROM prdept WHERE cdeptno='$asignacion'");
if ($asignado=mssql_fetch_array($mostrarDesc)) {
    $asignacion=titleCase(utf8_encode($asignado['cdeptname']));
    // $ConvertiAsignacion=strtolower($asignacion);
    // $asignacion=ucwords($ConvertiAsignacion);
}
$mostrarDesc=mssql_query("SELECT * FROM hrjobs WHERE cJobTitlNO='$cargo'");
if ($ejecutar=mssql_fetch_array($mostrarDesc)) {
    $desempenio=titleCase($ejecutar['cDesc']);

    // $ConvertirDesen=strtolower($desempenio);
    // $desempenio=ucwords($ConvertirDesen);
}

class PDF extends PDF_WriteTag
{
function Header()
{
  

    // Logo
    //$this->Image('../img/9.png',70,6,75);
    // Arial bold 15
     $this->SetFont('Times','B',14);
    //$this->SetTextColor(194,8,8);
    //$this->Cell(45,0,'prueba',0,0,'C');
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
    
    global $nombreCompleto;
    global $Empleado;
    global $identidad;
   $this->SetFont('Arial','I',8);
 
  $this->SetY(-15);
  $this->Cell(185,0,'Nombre: '.$nombreCompleto,0,0,'L');
   $this->Ln(3);
   $this->Cell(185,0,'Codigo: '.$Empleado,0,0,'L');
   $this->Ln(3);
   $this->Cell(185,0,'Identidad: '.$identidad,0,0,'L');
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

$pdf->Cell(30,5,utf8_encode(trim('Nombre Completo:')),0,1,'L'); 
$pdf->Cell(170,-5,'Identidad',0,1,'C'); 
$pdf->Cell(170,5,'Empleado',0,1,'R'); 
$pdf->Ln(3);
$pdf->SetFont('Arial','',8);
$pdf->Cell(30,5,utf8_encode(trim($nombreCompleto)),0,1,'L'); 
$pdf->Cell(170,-5,$identidad,0,1,'C'); 
$pdf->Cell(170,5,$Empleado,0,1,'R'); 
$pdf->Ln(10);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,5,utf8_encode(trim('cargo a la fecha')),0,1,'L'); 
$pdf->Cell(170,-5,'Lugar de trabajo',0,1,'C'); 
$pdf->Cell(170,5,'Sueldo Actual',0,1,'R'); 
$pdf->SetFont('Arial','',8);
$pdf->Cell(30,5,utf8_encode(trim($desempenio)),0,1,'L'); 
$pdf->Cell(170,-5,$asignacion,0,1,'C'); 
$pdf->Cell(170,5,$sueldo,0,1,'R'); 
$pdf->Ln(10);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,5,utf8_encode(trim('Fecha de contrato')),0,1,'L'); 
$pdf->Cell(170,-5,'Fecha de Acuerdo',0,1,'C'); 
$pdf->Cell(170,5,'Fecha Despido',0,1,'R'); 
$pdf->SetFont('Arial','',8);
$pdf->Cell(30,5,date('d/m/Y',strtotime($fehacon)),0,1,'L'); 
$pdf->Cell(170,-5,date('d/m/Y',strtotime($fehaAc)),0,1,'C'); 
$pdf->Cell(170,5,$fechaDespido,0,1,'R'); 

$pdf->Ln(16);
$pdf->Cell(170,-5,'------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------',0,1,'L'); 
$pdf->Ln(8);
$consultar=mssql_query("SELECT distinct cpayno,dtrs  FROM prmisc WHERE cempno='$Cod' and dcheck between '$fmin' and '$fmax' order by dtrs ASC");


ConexionSQLserverPUBLIC();
$consultar1=mssql_query("SELECT distinct cpayno,dtrs FROM prmisc WHERE cempno='$Cod' and dcheck between '$fmin' and '$fmax' order by dtrs ASC");
while($efilas=mssql_fetch_array($consultar1)){
  $array[]=$efilas;
}
$temp = array();
$new = array();
foreach($array as $value)
{
if(!in_array($value["cpayno"],$temp))
{
$temp[] = $value["cpayno"];
$new[] = $value;
}
}

for ($o=0; $o <count($new) ; $o++) 
  # code...
{
  $esumaingresos=0;
  $esumaDeducciones=0;
  $enombreplanilla=$new[$o]['cpayno'];
  $equeryFila=mssql_query("SELECT dtrs FROM prmisc WHERE cpayno='$enombreplanilla'");  
  $rows=mssql_fetch_array($equeryFila);
  $efechaTransaccion=date('d/m/Y',strtotime($rows['dtrs']));
    $eplanilla=$new[$o]['cpayno'];
    if($new[$o]['nothtax']==0.00){
        $evalor= $new[$o]['nothntax'];
    }
    

    if($rows['nothntax']==0.00){
        $evalor= $rows['nothtax'];
    }
    $econsultarIngresos=mssql_query("SELECT * FROM prmisc WHERE cempno='$Cod' and  cpayno='$eplanilla' and cpaycode!='IHSS' and cpaycode!='INJUPEMP'");
    while($eu=mssql_fetch_array($econsultarIngresos)){
      $esumaingresos=$esumaingresos+$eu['nothtax'];
      
    }
     $econsultarDeduccines=mssql_query("SELECT * FROM prmisd WHERE cempno='$Cod' and  cpayno='$eplanilla'");
    while($ec=mssql_fetch_array($econsultarDeduccines)){
      $esumaDeducciones=$esumaDeducciones+$ec['ndedamt'];
    }

    $econsultarIHSS=mssql_query("SELECT * FROM prmisc WHERE cempno='$Cod' and  cpayno='$eplanilla' and cpaycode='IHSS'");
    while($ej=mssql_fetch_array($econsultarIHSS)){
      $esumaDeducciones=$esumaDeducciones+abs($ej['nothntax']);
    }
    $econsultarINGUPEMP=mssql_query("SELECT * FROM prmisc WHERE cempno='$Cod' and  cpayno='$eplanilla' and cpaycode='INJUPEMP'");
    while($ez=mssql_fetch_array($econsultarINGUPEMP)){
      $esumaDeducciones=$esumaDeducciones+abs($ez['nothntax']);
    }


    $etotalNeto= $esumaingresos-$esumaDeducciones;


    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(30,0,'Planilla:'.$new[$o]['cpayno'],0,1,'L'); 
    $pdf->Cell(172,0,'Fecha de Transaccion:    '.$efechaTransaccion,0,1,'R'); 
  $pdf->SetFont('Arial','',10);
    $pdf->Ln(5);
    //$pdf->Cell(30,0,'Planilla:'.$planilla,0,1,'L'); 
    $econsultarPlanilla=mssql_query("SELECT * FROM prmisc WHERE cpayno='$eplanilla' and cempno='$Cod'");
    while($erow=mssql_fetch_array($econsultarPlanilla)){
    
      if($erow['nothtax']==0.00){
        $evalor1= number_format($erow['nothntax'],2);
    }

    if($erow['nothntax']==0.00){
        $evalor1= number_format($erow['nothtax'],2);
    }
    if(trim($erow['cref'])==""){
      $edesc="Sin Definir";
    }else{
      $edesc=$erow['cref'];
    }
  $pdf->Ln(2);
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(30,0,$edesc,0,1,'L'); 
  $pdf->Cell(170,0,'______________________',0,1,'C'); 
  $pdf->Cell(150,0,$evalor1,0,1,'R'); 
  $pdf->Ln(2);
    }
    $econsultarPlanilla1=mssql_query("SELECT * FROM prmisd WHERE cpayno='$eplanilla' and cempno='$Cod'");
    while($ep=mssql_fetch_array($econsultarPlanilla1)){
      $esumaDeducciones=$esumaDeducciones+abs($ep['ndedamt']);
     
      $evalor2=number_format($ep['ndedamt'],2);
      $pdf->Ln(2);
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(30,0,$ep['cdesc'],0,1,'L'); 
  $pdf->Cell(170,0,'______________________',0,1,'C'); 
  $pdf->Cell(150,0,$evalor2,0,1,'R'); 
  $pdf->Ln(2);
    }
  
    $pdf->Ln(2);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(30,0,'Total neto:',0,1,'L'); 
    $pdf->Cell(150,0,number_format($etotalNeto,2),0,1,'R'); 
  }

  ConexionSQLserverVAM();
while($fila=mssql_fetch_array($consultar)){
  $arreglo[]=$fila;
}
$etemp = array();
$enew = array();
foreach($arreglo as $valor)
{
if(!in_array($valor["cpayno"],$etemp))
{
$etemp[] = $valor["cpayno"];
$enew[] = $valor;
}
}

for ($k=0; $k <count($enew) ; $k++) 
  {

  $sumaingresos=0;
  $sumaDeducciones=0;
  $nombreplanilla=$enew[$k]['cpayno'];
  $queryFila=mssql_query("SELECT dtrs FROM prmisc WHERE cpayno='$nombreplanilla'");  
  $rows=mssql_fetch_array($queryFila);
  $fechaTransaccion=date('d/m/Y',strtotime($rows['dtrs']));
    $planilla=$enew[$k]['cpayno'];
    if($enew[$k]['nothtax']==0.00){
        $valor= $enew[$k]['nothntax'];
    }
    

    if($enew[$k]['nothntax']==0.00){
        $valor= $enew[$k]['nothtax'];
    }
    $consultarIngresos=mssql_query("SELECT * FROM prmisc WHERE cempno='$Cod' and  cpayno='$planilla' and cpaycode!='IHSS' and cpaycode!='INJUPEMP'");
    while($u=mssql_fetch_array($consultarIngresos)){
      $sumaingresos=$sumaingresos+$u['nothtax'];
      
    }
     $consultarDeduccines=mssql_query("SELECT * FROM prmisd WHERE cempno='$Cod' and  cpayno='$planilla'");
    while($c=mssql_fetch_array($consultarDeduccines)){
      $sumaDeducciones=$sumaDeducciones+$c['ndedamt'];
    }

    $consultarIHSS=mssql_query("SELECT * FROM prmisc WHERE cempno='$Cod' and  cpayno='$planilla' and cpaycode='IHSS'");
    while($j=mssql_fetch_array($consultarIHSS)){
      $sumaDeducciones=$sumaDeducciones+abs($j['nothntax']);
    }
    $consultarINGUPEMP=mssql_query("SELECT * FROM prmisc WHERE cempno='$Cod' and  cpayno='$planilla' and cpaycode='INJUPEMP'");
    while($z=mssql_fetch_array($consultarINGUPEMP)){
      $sumaDeducciones=$sumaDeducciones+abs($z['nothntax']);
    }


    $totalNeto= $sumaingresos-$sumaDeducciones;


    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(30,0,'Planilla:'.$enew[$k]['cpayno'],0,1,'L'); 
    $pdf->Cell(172,0,'Fecha de Transaccion:    '.$fechaTransaccion,0,1,'R'); 
  $pdf->SetFont('Arial','',10);
    $pdf->Ln(5);
    //$pdf->Cell(30,0,'Planilla:'.$planilla,0,1,'L'); 
    $consultarPlanilla=mssql_query("SELECT * FROM prmisc WHERE cpayno='$planilla' and cempno='$Cod'");
    while($row=mssql_fetch_array($consultarPlanilla)){
    
      if($row['nothtax']==0.00){
        $valor1= number_format($row['nothntax'],2);
    }

    if($row['nothntax']==0.00){
        $valor1= number_format($row['nothtax'],2);
    }
    if(trim($row['cref'])==""){
      $desc="Sin Definir";
    }else{
      $desc=$row['cref'];
    }
  $pdf->Ln(2);
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(30,0,$desc,0,1,'L'); 
  $pdf->Cell(170,0,'______________________',0,1,'C'); 
  $pdf->Cell(150,0,$valor1,0,1,'R'); 
  $pdf->Ln(2);
    }
    $consultarPlanilla1=mssql_query("SELECT * FROM prmisd WHERE cpayno='$planilla' and cempno='$Cod'");
    while($p=mssql_fetch_array($consultarPlanilla1)){
      $sumaDeducciones=$sumaDeducciones+abs($p['ndedamt']);
     
      $valor2=number_format($p['ndedamt'],2);
      $pdf->Ln(2);
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(30,0,$p['cdesc'],0,1,'L'); 
  $pdf->Cell(170,0,'______________________',0,1,'C'); 
  $pdf->Cell(150,0,$valor2,0,1,'R'); 
  $pdf->Ln(2);
    }
  
    $pdf->Ln(2);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(30,0,'Total neto:',0,1,'L'); 
    $pdf->Cell(150,0,number_format($totalNeto,2),0,1,'R'); 
  }





// Signature


 

//$pdf->line(40, 10, 80, 10);
//$pdf->InsertText("\n\n"); 

$pdf->Output();
?>