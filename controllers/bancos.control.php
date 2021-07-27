<?php
/* Deuda Controller
 * 2020-11-02
 * Created By DMLL
 */
session_start();
ob_start();
  require_once("libs/template_engine.php");
  require_once("models/bancos.model.php");
  header('Content-Type: text/html; charset=ISO-8859-1');

  if ($_SESSION['logeo']=='') {
 

    header('location:index.php');
  }
  function run(){
$opcion=$_GET['x'];
$opcionGet=$_GET['y'];

 $cuenta['Planillas']=GetLIstaPlanillas();

if($opcionGet==2){
  $cuenta = array(
    "mensaje"=> GetLIstaPlanillas()
    

);
echo json_encode($cuenta, JSON_FORCE_OBJECT);
}
switch ($opcion) {
  case '1':
$nomina=$_POST['nomina'];
$tipo=$_POST['tipo'];
$cuenta['nomina']=$nomina;
$cuenta['tipo']=$tipo;
$cuenta['datos']= getinfo($nomina,$tipo);
$cuenta['Total']= $cuenta['datos']['Total'];
$_SESSION['datosbanco']=$cuenta['datos'];
$_SESSION['bancos']=optenerbancos($nomina,$tipo);
renderizar("bancos",$cuenta);

   
    break;
    case '2':
      
      break;
   case '3':
    $insersion=Insert($_SESSION['IdUser']);
    if($insersion==true){
     header("location: excel/bancosPlanillas.php");
    }else{
     header("location: index.php?page=bancos");
    }
     break;
 case '4':
  
   $insersion=Insert($_SESSION['IdUser']);
   if($insersion==true){
    header("location: excel/bancos.php");
   }else{
    header("location: index.php?page=bancos");
   }
  
  
   break;
  default:
  renderizar("bancos",$cuenta);
    break;
}


 
   
}



  
  run();
?>