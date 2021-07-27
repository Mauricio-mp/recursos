<?php
/* Calendario Controller
 * Created By DMLL
 * elaborado 11/03/2020
 */
  require_once("libs/template_engine.php");
  require_once("models/Calendario.model.php");
  function run(){
  
  $opcion=$_GET['op'];
  $valor=fecha();
  $data['mensaje']=json_encode($valor);
 

  switch ($opcion) {
    case 'fecha':                
      

      break;
   
    default:
   renderizar("Calendario",$data);
  }
  

  


    //esta funcion rederiza la platilla con los datos
    // que le manda el controlador.
   // renderizar("Vacaciones",$cuenta);
   
  }


  run();
?>
