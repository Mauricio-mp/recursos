<?php
/* Deuda Controller
 * 2020-11-02
 * Created By DMLL
 */
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
  require_once("libs/template_engine.php");
  require_once("models/Deducciones.model.php");
session_start();
ob_start();
if ($_SESSION['logeo']=='') {
 

  header('location:index.php');
}
  function run(){
$opcion=$_GET['x'];
$cuenta['seleccion']=optenermes();
$cuenta['catalago']=optenerDeducciones();
$cuenta['Deducciones']=Getdeducciones();
$cuenta['fechas']=optenerfechas();
switch ($opcion) {
  case '1':
    $mes=$_POST['mes'];
  
     $cuenta['valores']=mostrardatos($mes);
     $cuenta['mes']=$mes;
     $cuenta['opcion']=$mes;
     
   
     renderizar("Deducciones",$cuenta);
    
    
    
    break;
    case '2':
      $nombre=$_POST['CbxDeduccion']; 
      $nomina=$_POST['mes'];
      $opcion=$_POST['opcionBusqueda'];
      $TipoMes=$_POST['TipoMes'];
      $IngresoPlanilla=$_POST['IngresoPlanilla'];
     
      $_SESSION['CbxDeduccion']=$nombre;
      $_SESSION['nomina']=$_POST['mes'];
      $_SESSION['opcionBusqueda']=$opcion;
      $_SESSION['TipoMes']=$_POST['TipoMes'];
      $_SESSION['IngresoPlanilla']=$IngresoPlanilla;
      for ($i=0; $i <count($nombre) ; $i++) {
        
        $cost .= '\''.$nombre[$i].'\''. ',';
        
      }

      $myString = substr($cost, 0, -1);
    
        
      $cuenta['Dat']=GetDatos($myString,$nomina,$opcion,$TipoMes,$IngresoPlanilla);

      $cuenta['Total']= $cuenta['Dat']['Total'];

    renderizar("Deducciones",$cuenta);
      break;

      case '3':
        
        $deduccion=$_SESSION['CbxDeduccion'];
        $nomina=$_SESSION['nomina'];

        for ($i=0; $i <count($deduccion) ; $i++) {
        
          $cost .= '\''.$deduccion[$i].'\''. ',';
          
        }
  
        $myString = substr($cost, 0, -1);
          imprimpir($myString,$nomina);
        break;

        case '4':
          $mes=$_SESSION['nomina'];
          $deducciones=$_SESSION['CbxDeduccion'];
          $opcion=$_SESSION['opcionBusqueda'];
          $opcionMes=$_SESSION['TipoMes'];
          $IngresoPlanilla=$_SESSION['IngresoPlanilla'];

     
      exportProductDatabase($mes,$deducciones,$opcion,$opcionMes,$IngresoPlanilla);
       renderizar("Deducciones",$cuenta);
          break;
   
  
  default:


  renderizar("Deducciones",$cuenta);
    break;
}



  }
  run();
?>