<?php

  require_once("libs/template_engine.php");
  require_once("models/periodo.model.php");

  function run(){
$cuenta=[];

//$cuenta['Tipo']=TipoPermiso();
//$cuenta['Periodo']=optener_periodo();
//echo $_GET['datos'];
$cuenta= array("hola" =>"s");

$opcion=$_POST['op'];


switch ($opcion) {
  case 'VerificarPsw':
    $valor=$_POST['valoPsw'];
    echo $valor;
    break;
  
  default:
  renderizar("Periodo",$cuenta);
    break;
}
  }


  run();
?>
