<?php
/* micuenta Controller
 * 2018-03-05
 * Created By OJBA
 * Last Modification 2018-03-05
 */
  require_once("libs/template_engine.php");
  require_once("models/vacaciones.model.php");
  function run(){
   $data['Empleados']= mostrarTabla();

   if($_SESSION['logeo']==''){
    header('location:index.php');
  }else{
    $data['logeado']=$_SESSION['logeo'];
  }
  $data["nombres"]=$_SESSION['logeo'];

  


    //esta funcion rederiza la platilla con los datos
    // que le manda el controlador.
   // renderizar("Vacaciones",$cuenta);
    renderizar("Vacaciones",$data);
  }


  run();
?>
