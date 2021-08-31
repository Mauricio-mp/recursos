<?php
/* micuenta Controller
 * 2018-03-05
 * Created By OJBA
 * Last Modification 2018-03-05
 */
  require_once("libs/template_engine.php");
  require_once("models/vacaciones.model.php");
  function run(){
    session_start();
    ob_start();


    $var=$_GET['cod'];
    $Inicio=$_GET['Inicio'];
    $Final=$_GET['Final'];
    $datos["historial"]=mostrarhistorial($var,$Inicio,$Final);
    $datos["datos_Empleado"]=mostrarDatosEmpleado($var);

    $datos["Nombre"]= $datos["datos_Empleado"][0]." ".$datos["datos_Empleado"][1];
    $datos["Identidad"]= $var;

    $datos["Inicio"]=$Inicio;
    $datos["Final"]=$Final;

    $datos['nombres']=$_SESSION['logeo'];
    $datos['codigo']=$_SESSION['Codigo_Empleado'];

    if($_SESSION['logeo']==''){
      header('location:index.php');
    }else{
      $datos['logeado']=$_SESSION['logeo'];
    }


    //esta funcion rederiza la platilla con los datos
    // que le manda el controlador.
     renderizar("detalle",$datos);

  }


  run();
?>
