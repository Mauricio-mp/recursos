<?php
/* Deuda Controller
 * 2020-11-02
 * Created By DMLL
 */

  //error_reporting(E_ALL);
  //ini_set('display_errors', '1');
  require_once("libs/template_engine.php");
  require_once("models/Impuestos.model.php");
session_start();
ob_start();
  function run(){
$opcion=$_GET['x'];

$cuenta['seleccion']=optenermes();

switch ($opcion) {
  case '1':  
    $chk=$_POST['chkTexto'];
    $mes=$_POST['mes'];
    $sueldo=$_POST['sueldo'];
    
    $_SESSION['val']['imp'] =GetHoja1($chk,$mes,$sueldo);
    $_SESSION['val']['isr'] =GetHoja2($chk,$mes,$sueldo);
    $_SESSION['val']['susp'] =GetHoja3($chk,$mes,$sueldo);
    $_SESSION['val']['hoja3'] =GetHoja4($chk,$mes,$sueldo);
    $_SESSION['val']['Colegiaciones'] =GetHoja5($chk,$mes,$sueldo);

    $_SESSION['val']['ihss'] =GetHoja6($chk,$mes,$sueldo);

    
    
    
  

    header("location: excel/excel.php");

 

      break;
  
  default:


  renderizar("Impuestos",$cuenta);
    break;
}



  }
  run();
?>