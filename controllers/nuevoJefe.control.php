<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
require_once("libs/template_engine.php");
require_once("models/jefes.model.php");
$var=[];
$respuesta=false;

$opcion=$_GET['x'];
$var["Nombre_Firma"]=optenerjefes();
$var["fecha_actual"]=date('Y-m-d');




switch ($opcion) {
    case 'Insertar':
        
        $usuario=$_SESSION['logeo'];
        $nombre=utf8_decode($_POST['nombreFirma']);
        $apellido=utf8_decode($_POST['apellidoFirma']);
        $cargo=utf8_decode($_POST['puesto']);
        
    
        $fechaActual = date('m-d-Y h:i:s a', time());  
        $estado=1;
        $respuesta=guardarjefes($nombre,$apellido,$cargo,$estado,$fechaActual,$usuario);
        $var["Nombre_Firma"]=optenerjefes();
    
        break;



        case 'Modificar':
         
            $nuevonombre=$_POST['nuevonombreFirma'];
            $nuevoapellido=$_POST['nuevoapellidoFirma'];
            $nuevocargo=$_POST['nuevopuesto'];
            $nuevoestado=$_POST['nuevoestado'];
            $fechamodificacion = date('m-d-Y h:i:s a', time()); 
            $usuariomodificacion=$_SESSION['logeo'];
            $id=$_POST['id'];
        echo editarjefes($nuevonombre,$nuevoapellido,$nuevocargo,$nuevoestado,$fechamodificacion,$usuariomodificacion,$id);
          
        
       

       
          
        break;
   
    default:
    
    renderizar("nuevoJefe",$var);

    break;
    
    
}

    
    



?>