<?php
/* micuenta Controller
 * 2018-03-05
 * Created By OJBA
 * Last Modification 2018-03-05
 */
  require_once("libs/template_engine.php");
  require_once("models/users.model.php");
  function run(){

 session_start();
 ob_start();
 if (isset($_POST['FechaInicio'])) {
   $optenercodigo1=$_GET["fec"];
   $FechaInicio= $_POST['FechaInicio'];
   $FechaFinal=$_POST['FechaFinal'];

   header('location:index.php?page=verDatos&codigo='.$optenercodigo1.'&fini='.$FechaInicio.'&ffin='.$FechaFinal.' ');
    
   
 }
 //prueba();

  
   $_SESSION['empleado']=$_GET["cod"];

   if($_SESSION['logeo']==''){
    header('location:index.php');
  }
   

   
        $cuenta = array(
        "CodigoEmpleado"=> $_SESSION['empleado'],
        'nombres'=>$_SESSION['logeo'],
        'codigo'=>$_SESSION['Codigo_Empleado'],
        'logeado'=>$_SESSION['logeo'],
        'fechas'=>date("Y-m-d")
        

    );
    
    //esta funcion rederiza la platilla con los datos
    // que le manda el controlador.
    renderizar("fechas",$cuenta);

  }


  run();
?>