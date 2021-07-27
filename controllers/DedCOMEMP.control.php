<?php
/* Deuda Controller
 * 2020-11-02
 * Created By DMLL
 */
session_start();
ob_start();
 //error_reporting(E_ALL);
//ini_set("display_errors", 1);
  require_once("libs/template_engine.php");
  require_once("models/ReporteGECOMP.model.php");

  function run(){
$opcion=$_GET['x'];
$opcionMes=$_POST['opcionBusqueda'];
$mes=$_POST['mes'];
$TipoMes=$_POST['TipoMes'];
$cuenta['seleccion']=optenermes();
$cuenta['fechas']=optenerfechas();

switch ($opcion) {
  case '1':
   
  
     $cuenta['valores']=mostrardatos($mes,$opcionMes,$TipoMes);
     $_SESSION['Datos']=$cuenta['valores'];
     $cuenta['mes']=$mes;
     $cuenta['opcion']=$mes;

   
     renderizar("DedCOMEMP",$cuenta);
    
    break;
    case '2':
      $mes=$_GET['y'];
      $lar= array('mes' => $_SESSION['Datos'],'hola2' => 'mensaje2' );
      
      exportProductDatabase($_SESSION['Datos']);
       renderizar("DedCOMEMP",$cuenta);
      
      
      
      break;
  
  default:


  renderizar("DedCOMEMP",$cuenta);
    break;
}



  }
  run();
?>