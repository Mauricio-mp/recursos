<?php
/* Deuda Controller
 * 2020-11-02
 * Created By DMLL
 */
 //error_reporting(E_ALL);
//ini_set("display_errors", 1);
session_start();
ob_start();
  require_once("libs/template_engine.php");
  require_once("models/SagFamilia.model.php");

  function run(){
$opcion=$_GET['x'];
$opcionMes=$_POST['opcionBusqueda'];
$cuenta['seleccion']=optenermes();
$mes=$_POST['mes'];
$TipoMes=$_POST['TipoMes'];

$cuenta['fechas']=optenerfechas();
switch ($opcion) {
  case '1':
    $mes=$_POST['mes'];
  
     $cuenta['valores']=mostrardatos($mes,$opcionMes,$TipoMes);
     $_SESSION['Datos']=$cuenta['valores'];
     $cuenta['mes']=$mes;
     $cuenta['opcion']=$mes;

   
    renderizar("SagFamilia",$cuenta);
    
    
    
    break;
    case '2':
      $mes=$_GET['y'];
      $lar= array('mes' => $_SESSION['Datos'],'hola2' => 'mensaje2' );
      exportProductDatabase($_SESSION['Datos']);
       renderizar("SagFamilia",$cuenta);
      
      
      
      break;
  
  default:


  renderizar("SagFamilia",$cuenta);
    break;
}



  }
  run();
?>