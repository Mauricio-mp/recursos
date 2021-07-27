<?php
/* Deuda Controller
 * 2020-11-02
 * Created By DMLL
 */
session_start();
ob_start();
  require_once("libs/template_engine.php");
  require_once("models/General.model.php");

  function run(){
$opcion=$_GET['x'];
$codigo=$_POST['txtnombre'];
$cuenta['departamentos']=GetDepartamentos();
$cuenta['puesto']=GetPuestos();
 $cuenta['Nombre']=GetLIstaEmpleados();


switch ($opcion) {
  case '1':
$FechaInicialContrato=$_POST['FechaInicialContrato'];
$FechaFinalContrato=$_POST['FechaFinalContrato'];
$FechaInicialAcuerdo=$_POST['FechaInicialAcuerdo'];
$FechaFinalAcuerdo=$_POST['FechaFinalAcuerdo'];
$CbxDepartamento=$_POST['CbxDepartamento'];
$puesto=$_POST['puesto'];
$estado=$_POST['estado'];
$region=$_POST['region'];
$nombre=$_POST['nombre'];
$SueldoInicial=$_POST['SueldoInicial'];
$SueldoFinal=$_POST['SueldoFinal'];
$myCheck=$_POST['myCheck'];

$cuenta['Generales']= Getgeneral($codigo,$nombre,$FechaInicialContrato,$FechaFinalContrato,$FechaInicialAcuerdo,$FechaFinalAcuerdo,$CbxDepartamento,$puesto,$estado,$region,$myCheck,$SueldoInicial,$SueldoFinal);
$_SESSION['generales']=$cuenta['Generales'];

renderizar("General",$cuenta);

   
    break;
   
  case '4':
    header("location: excel/General.php");
    break;
    
  default:
  renderizar("General",$cuenta);
    break;
}


 
   
}



  
  run();
?>