<?php
/* Deuda Controller
 * 2020-11-02
 * Created By DMLL
 */
  require_once("libs/template_engine.php");
  require_once("models/Ingresos.model.php");
  session_start();
  ob_start();
  function run(){
$opcion=$_GET['x'];
$cuenta['seleccion']=obtenerCodigos();
$cuenta['nomina']=optenermes();
$cuenta['fechas']=optenerfechas();

switch ($opcion) {
  case '1':
    $nombre=$_POST['CbxIngresos']; 
      $nomina=$_POST['mes'];
      $opcionBusqueda=$_POST['opcionBusqueda'];
      $TipoMes=$_POST['TipoMes'];
      $Tipoplanilla=$_POST['Tipoplanilla'];

      $_SESSION['CbxIngresos']=$nombre;
      $_SESSION['mes']=$_POST['mes'];

      $_SESSION['OpcionMes']=$_POST['TipoMes'];
      $_SESSION['OpcionBusqueda']=$_POST['opcionBusqueda'];
      $_SESSION['Tipoplanilla']=$Tipoplanilla;
      for ($i=0; $i <count($nombre) ; $i++) {
        
        $cost .= '\''.$nombre[$i].'\''. ',';
        
      }

      $myString = substr($cost, 0, -1);
    

      $cuenta['Dat']=GetDatos($nombre,$nomina,$opcionBusqueda,$TipoMes,$Tipoplanilla);
      $cuenta['Total']= $cuenta['Dat']['Total'];
      
      //print_r($cuenta);
   
      renderizar("Ingresos",$cuenta);
    
    
    break;

    case '2':
      $mes=$_SESSION['mes'];
      $Ingresos=$_SESSION['CbxIngresos'];
      $opcionBusuqeda=$_SESSION['OpcionBusqueda'];
      $opcionMes= $_SESSION['OpcionMes'];
      $Tipoplanilla=$_SESSION['Tipoplanilla'];
      for ($i=0; $i <count($Ingresos) ; $i++) {
        
        $cost .= '\''.$Ingresos[$i].'\''. ',';
        
      }

      $myString = substr($cost, 0, -1);
    


 
  exportProductDatabase($mes,$myString,$opcionBusuqeda,$opcionMes,$Tipoplanilla);
   renderizar("Ingresos",$cuenta);
      break;

      case '3':
        $mes=$_SESSION['mes'];
        $Ingresos=$_SESSION['CbxIngresos'];
        $opcionBusuqeda=$_SESSION['OpcionBusqueda'];
      $opcionMes= $_SESSION['OpcionMes'];
      $Tipoplanilla=$_SESSION['Tipoplanilla'];
          if($Ingresos==100){
            exportarExcel($mes,$Ingresos,$opcionBusuqeda,$opcionMes,$Tipoplanilla);
          }else{
           exportarExcel1($mes,$Ingresos,$opcionBusuqeda,$opcionMes,$Tipoplanilla);
          }

      


   
   // exportarExcel($mes,$myString,$opcionBusuqeda,$opcionMes);
   renderizar("Ingresos",$cuenta);
        break;
   
  
  default:


  renderizar("Ingresos",$cuenta);
    break;
}



  }
  run();
?>