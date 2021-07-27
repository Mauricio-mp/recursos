<?php

require_once("models/users.model.php");
  function run(){
 session_start();
 ob_start();


$codigo=$_GET['codigo'];
$fechaInico=$_GET['fini'];
$fechaFin=$_GET['ffin'];


 $opcion=$_POST['op'];
    $datos = array();
    $Departento= array();
    $Cargo= array();
    $valores = array();
    $deducciones =array();
    $valores["valores"] = optenerPlanillas($codigo,$fechaInico,$fechaFin);
    //$valores["datos"] = optenerPlanillas2($codigo,$fechaInico,$fechaFin);
    $deducciones["deducciones"] = deducciones($codigo,$fechaInico,$fechaFin);

    $valores["Datos"] = VerdatosEmpleado($codigo);
     //DepartamendoEmpleado();
   $valores["cargo"]=cargoEmpleado($valores["Datos"][0]['cjobtitle']);
   $valores["depto"]=DepartamendoEmpleado($valores["Datos"][0]['cdeptno']);

   $valores['nombres']=$_SESSION['logeo'];
   $valores['codigo']=$_SESSION['Codigo_Empleado'];
   $valores['fechaFin']=$fechaFin;
   $valores['fechaInicio']=$fechaInico;
   $valores['Cod']=$codigo;
  
if($opcion=='InsertRegistro') {
  $CodigoEmpleado= $_POST['codigo'];
  $FechaInicio= $_POST['fechaInicio'];
  $FechaFin= $_POST['FechaFin'];
  $UsuarioLogeado= $_POST['usuarioLogueado'];
  
  $insert=Insertar($CodigoEmpleado,$FechaInicio,$FechaFin,$UsuarioLogeado);
  echo $insert;
}else{
  renderizar("verDatos",$valores);
}

   
    


  



  }


  run();
?>