<?php
/* Calendario Controller
 * Created By DMLL
 * elaborado 11/03/2020
 */
  require_once("libs/template_engine.php");
  require_once("models/Usuario.model.php");
  function run(){
  $opcion=$_GET['x'];
  $data['Roles']=optenerRoles();
  $data['Permisos']=optenerPermisos();
  $data['usuarios']=optenerUsuarios();

  
  if($_SESSION['Codigo_Empleado']==''){
   header('location:index.php');
  }
 

  switch ($opcion) {
    case 'rol':         
      $rol=$_POST['rol'];       
      $data['permisos']=GetPermisos($rol);
      $data['cantidadArray']=count(GetPermisos($rol));
      echo json_encode($data);
      
        
      break;
      case 'NuevoRol':
        
        $permisos=$_POST['Roles'];
        $nombre=$_POST['Nombre'];

        $mensaje=InsertRol($permisos,$nombre);

        echo json_encode($mensaje);
        break;
      case 'Editar':
        $idEmpleado=$_POST['codigo'];

        $datosempleado=getdatosempleado($idEmpleado);

        echo json_encode($datosempleado, JSON_FORCE_OBJECT);
        
        break;
        case 'ModificarUser':
        

          $codigo=$_POST['codigo'];
          $nombre1=$_POST['Nombre1'];
          $Nombre2=$_POST['Nombre2'];
          $apellido1=$_POST['apellido1'];
          $apellido2=$_POST['apellido2'];
          $NuevloRol=$_POST['NuevloRol'];
          $Contra=$_POST['Contra'];
          $IdUsusrio=$_POST['iduser'];

          $mensaje=ModificarUsuario($_SESSION['Codigo_Empleado'],$IdUsusrio,$codigo,$nombre1,$Nombre2,$apellido1,$apellido2,$NuevloRol,$Contra);
          
          echo $mensaje;

          break;
      case 'Insertar':         
$PrimerNombre=$_POST['PrimerNombre'];
$SegundoNombre=$_POST['SegundoNombre'];
$PrimerApellido=$_POST['PrimerApellido'];
$SegundoApellido=$_POST['SegundoApellido'];
$password=$_POST['password'];
$select=$_POST['select'];
$CodEmpleado=$_POST['CodEmpleado'];

$mensaje=insertarUsuario($CodEmpleado,$PrimerNombre,$SegundoNombre,$PrimerApellido,$SegundoApellido,$password,$select,$_SESSION['Codigo_Empleado']);
    if($mensaje==1){
      $data['mensaje']=true;
    }else{
      $data['mensaje']=false;
    }    
    renderizar("Usuario",$data);
        break;

        case 'Anular':
          $codigo=$_POST['codigo'];
          echo anularUsuario($codigo);
          break;
      
    default:
   renderizar("Usuario",$data);
  
  }
  

  


   
   
  }


  run();
?>