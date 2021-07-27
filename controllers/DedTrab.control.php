<?php
/* Deuda Controller
 * 2020-11-02
 * Created By DMLL
 */
session_start();
ob_start();
  require_once("libs/template_engine.php");
  require_once("models/ReporteTrab.model.php");

  function run(){
    $opcion=$_GET['x'];
    $opcionMes=$_POST['opcionBusqueda'];
    $mes=$_POST['mes'];
    $TipoMes=$_POST['TipoMes'];
    $cuenta['seleccion']=optenermes();
    $cuenta['fechas']=optenerfechas();
switch ($opcion) {
  case '1':
    $mes=$_POST['mes'];
  
     $cuenta['valores']=mostrardatos($mes,$opcionMes,$TipoMes);
     $_SESSION['Datos']=$cuenta['valores'];
     $cuenta['mes']=$mes;
     $cuenta['opcion']=$mes;

   
     renderizar("DedTrab",$cuenta);
    
    
    
    break;
    case '2':
      $mes=$_GET['y'];
      $lar= array('mes' => $mes,'hola2' => 'mensaje2' );
      exportProductDatabase($_SESSION['Datos']);
       renderizar("DedTrab",$cuenta);
      
      
      
      break;
  
  default:


  renderizar("DedTrab",$cuenta);
    break;
}



  }
  run();
?>