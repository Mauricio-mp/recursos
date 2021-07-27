<?php
/* Deuda Controller
 * 2020-11-02
 * Created By DMLL
 */
  require_once("libs/template_engine.php");
  require_once("models/Deuda.model.php");

  function run(){
    $cuenta=[];
    $opcion=$_POST['op'];
    $cuenta['empleado']= Listar();
    $Buscar=$_POST['opcionBuscar'];
    if($_SESSION['logeo']==''){
      header('location:index.php');
    }else{
      $cuenta['logeado']=$_SESSION['logeo'];
    }
    //$cuenta['getCalculo']=calculo($_GET['op']);
    //$cuenta['DatosEmpleado']=DatosEmpleado($_GET['op']);
    //var_dump($cuenta['getCalculo']);
    //var_dump($cuenta['DatosEmpleado']);

    //$cuenta['msg']=$_GET['op'];

    //$Buscar="0";
    switch ($Buscar) {
      case '0':
      
        $cuenta['ListarEmpleado']= Nombre($_POST['nombre']);
     

        break;
        case '1':
      
          $cuenta['ListarEmpleado']= Codigo($_POST['CodigoEmpleado']);
       
  
          break;
      
      default:
        # code...
        break;
    }

   
    
    switch ($opcion) {
      case 'GetEmpleado':
         

       
         //echo json_encode($valor, JSON_FORCE_OBJECT);

        break;
        case 'InsertarReporte':
      

         $valor= InsertReporte($_POST['globalcodigo'],$_SESSION['Codigo_Empleado']);

         echo $valor;

       
          //echo json_encode($valor, JSON_FORCE_OBJECT);
 
         break;

        case 'Datos':
          $codigo=$_POST['codigo'];
          $datos['dat']=DatosEmpleado($codigo);
         $datos['DatosEmpleado']=calculo($codigo);
       
          
         
          echo json_encode($datos, JSON_FORCE_OBJECT);
 
         break;
        
        
      
      default:
      renderizar("Deuda",$cuenta);
        break;
    }
    

  }


  run();
?>