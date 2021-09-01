<?php
/* SignIN Controller
 * 2018-03-20
 * Created By OJBA

 */
  require_once("libs/template_engine.php");
  require_once("models/users.model.php");
  
  function run(){
    session_start();
    ob_start();
    $txtopcion=$_POST['txtopcion'];
    $txtvalor=$_POST['txtvalor'];
   
    if($_SESSION['logeo']==''){
      header('location:index.php');
    }else{
      $cuenta['logeado']=$_SESSION['logeo'];
    }
    
    //php_value_limits 
    ini_set ('memory_limit', '-1');
    $viewData = array();
    
     $viewData["cursos"] = mostrarEmpleado($txtopcion,$txtvalor);
      //$viewData["secciones"] = obtenerSecciones();
      

      $viewData['nombres']=$_SESSION['logeo'];
      $viewData['codigo']=$_SESSION['Codigo_Empleado'];
    
   

    // var_dump($viewData["cursos"]);
   //var_dump($viewData);
    
  renderizar("Inicio",$viewData);
  }

  run();
?>
