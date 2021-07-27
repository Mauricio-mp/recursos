<?php
/* Deuda Controller
 * 2020-11-02
 * Created By DMLL
 */
  require_once("libs/template_engine.php");
  require_once("models/ReportePlanilla.model.php");

  function run(){
    $cuenta=listarmese();
    $opcion =$_GET['x'];

    switch ($opcion) {
        case 1:
            $Codigo=$_POST['Codigo'];
            $Planilla=$_POST['Planilla'];
           // echo $Codigo.' - '.$Planilla;
            $json=optenerDatos($Codigo,$Planilla);
            echo json_encode($json);
            break;
        case label:
            break;
        case label:
            break;
        default:
        renderizar("DedPlanilla",$cuenta);
    }

   
      
       
    

  }


  run();
?>