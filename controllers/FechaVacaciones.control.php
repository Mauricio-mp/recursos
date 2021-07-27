<?php
/* micuenta Controller
 * 2018-03-05
 * Created By OJBA
 * Last Modification 2018-03-05
 */
  require_once("libs/template_engine.php");

  function run(){
    $cuenta=[];
    if (isset($_POST['BtnApectar'])) {
      $Inicio=$_POST['Inicio'];
      $Final=$_POST['Final'];
      $Cod=$_GET['cod'];
      if ($Inicio=='' || $Final=='') {
        $mensaje='hay campos vacios';

      }else{

        header('location:index.php?page=detalle&cod='.$Cod.'&Inicio='.$Inicio.'&Final='.$Final.' ');
      }

      
      
    }
    
    //esta funcion rederiza la platilla con los datos
    // que le manda el controlador.
    $cuenta["mensaje"]=$mensaje;
    $cuenta['nombres']=$_SESSION['logeo'];
    $cuenta['codigo']=$_SESSION['Codigo_Empleado'];
    $cuenta['fecha']=date("Y-m-d");
    renderizar("FechaVacaciones",$cuenta);

  }


  run();
?>
