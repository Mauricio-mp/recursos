<?php
/* micuenta Controller
 * 2018-03-05
 * Created By OJBA
 * Last Modification 2018-03-05 IngresoPeriodoNuevo
 */
  require_once("libs/template_engine.php");
  require_once("models/permisos.model.php");

  function run(){
    session_start();
    ob_start();

    $DatoGet=$_GET['z'];

    
     
    
$cuenta=[];
$tipoPermiso=TipoPermiso();

$opcion=$_POST['txtopcion'];
$valor=$_POST['txtvalor'];

$cuenta["Tipo"]=optenertipo();    
  $cuenta["Periodo"]=optener_periodo();   
  $cuenta["Motivo"]=optener_motivo();
$cuenta["peiodo1"]=$tipoPermiso[0];
$cuenta["periodo2"]=$tipoPermiso[1];
if($DatoGet==1){


$Permiso=trim($_GET['periodo']);
    
$cuenta['mmm']=$Permiso;
}
if($DatoGet==2){

  $periodo=EncriptacionPeriodos($_GET['periodo']);



  
  

  $cuenta['OptenerPermisos']=GetPermisos($periodo);

  

      
 
  }
 


$cuenta['ListarPeriodoEmpleado']=ListaPerriodos($_SESSION['expedicnte']);
$cuenta['listarfriados']=Listarferiados('Feriados');
//$cuenta['DatosEmpleado']=optenerEmpleado($opcion,$valor);
$cuenta['DatosEmpleado']=optenerEmpleado($opcion,$valor);

$Expediente=$_POST["vall"];

$cuenta["datosPermiso"]=optenerDatosPermiso($_SESSION['expedicnte']);


if ($_SESSION['logeo']=='') {
 

  header('location:index.php');
}
$cuenta["nombres"]=$_SESSION['logeo'];
 

   
   $op=$_POST["op"];
 
   
 $cuenta["nombres"]=$_SESSION['logeo'];

 $Permiso=$_POST['periodo'];




 switch ($op) {
  
  case 'ValidarUsuarioLogeado':  
    echo Restriccion($_SESSION['Codigo_Empleado']);


    break;
  case 'ListadePermisos':
    $periodo=$_POST['periodo'];
   $datos=GetListaPeriodos($periodo);
   
      


      //Devolvemos el array pasado a JSON como objeto
      echo $datos;
      break;
case 'verDias':
  $idEmpleado=$_POST['periodo'];
  $_SESSION['DiasPeriodo']=$idEmpleado;
  $datosempleado=editarDias($idEmpleado);

  echo json_encode($datosempleado, JSON_FORCE_OBJECT);
  break;

  case 'Modificardias':
    $nuevodia=$_POST['nuevodia'];
    $periodo=$_SESSION['DiasPeriodo'];


  echo editarDiasvacaciones($nuevodia,$periodo);


  break;
  
      case 'BorrarPermisos':
        $permisoId=$_POST['permisoId'];
        $periodoId=$_POST['periodoId'];
        $cPermiso=$_POST['cPermiso'];
       $datos=BorrarPeriodo($permisoId,$periodoId,$cPermiso);

     /*if($datos==0){
        $historial=InsertHistorialPermisos($_SESSION['expedicnte'], $_SESSION['Codigo_Empleado'],$permisoId,$periodoId);
       } */
       
        
    
          //Devolvemos el array pasado a JSON como objeto
         echo $datos;
          break;
  case 'ver':
    $pp =optenerEmpleado('identidad',$Expediente);
    $_SESSION['expedicnte']=$pp[0][0];
    $datos = array(
      'Estado' => 'ok',
      'Expediente' => $pp[0][0],
      'nombre' => trim($pp[0]['cNombres']),
      'apellido' => trim($pp[0]['cApellidos']),
      'cargo' => $pp[0]['Cargo'],
      'departamento' => $pp[0]['Departamento'],
      'estado'=>$pp[0]['estado'],
      'Codigo'=>$pp[0]['Codigo']

      );
      

      //Devolvemos el array pasado a JSON como objeto
      echo json_encode($datos, JSON_FORCE_OBJECT);
      break;

      case 'NuevoFeriado':
        $feriado=$_POST['fechaferiado'];
        $observacionFeriado=$_POST['observacion'];
        $ingresoNuevoFeriado=ingresoferiado($feriado,$observacionFeriado);
        echo $ingresoNuevoFeriado;
        
        
        break;
        case 'EliminarFeriado':
         $valor=$_POST['valor'];
         $feriado=$_POST['feriado'];
         $Descripcion=$_POST['Descripcion'];
         $eliminar=DeleteFeriado($valor,$feriado,$Descripcion);
         echo $eliminar;
          break;
  case 'IngresoPeriodo':
    $periodo=$_POST['valDatosPermisol'];
    
    $insertar=InserPeriodo($_SESSION['expedicnte'],$periodo['tipo'],$periodo['periodo'],$periodo['cbox1'],$periodo['cbox2'],$periodo['Dias']);

    if($insertar==0){
      $historial=InsertHistorial($_SESSION['expedicnte'], $_SESSION['Codigo_Empleado'],$periodo['periodo']);
    }
  
    $data = array(
      'Estado' => $insertar

      );
      

      //Devolvemos el array pasado a JSON como objeto
      echo json_encode($data, JSON_FORCE_OBJECT);
  break;
  case 'CambiarClave':
    $datos=$_POST['Password'];
    $valores=ActualizarContra($datos['anteriorpsq'],$datos['nuevapsq'],$datos['Confirmarpsq'],$_SESSION['Codigo_Empleado'],"1235@");
    $data = array(
      'mensaje' => $valores

      );
      

      //Devolvemos el array pasado a JSON como objeto
      echo json_encode($data, JSON_FORCE_OBJECT);
  break;
  case 'IngresoPeriodoNuevo' :
    $ingreso=$_POST['jsondatos'];
    $valores=IngresoPeriodo($ingreso['OpcionPeriodo'],$ingreso['OpcionTipoLicencia'],$ingreso['CatidadHoras'],$ingreso['FechaInicio'],$ingreso['FechaFin'],$ingreso['MotivoLicencia'],$ingreso['Observacion'],$ingreso['nombreAutorizacion'],$_SESSION['expedicnte'],$_SESSION['Codigo_Empleado']);
    if($insertar==0){
      $historial=InsertHistorialPermiso($_SESSION['expedicnte'], $_SESSION['Codigo_Empleado'],$ingreso['OpcionPeriodo'],$ingreso['FechaInicio'],$ingreso['FechaFin']);
    }
    $data = array(
      'mensaje' => $valores

      );
    

      //Devolvemos el array pasado a JSON como objeto
      echo json_encode($data, JSON_FORCE_OBJECT);
  break;
  case 'Verificarpsw':

    $optenerPsw=VerificarPassword($_POST['Password'],$_SESSION['Codigo_Empleado']);
   

    $data = array(
      'Password' => $optenerPsw

      );
      

      //Devolvemos el array pasado a JSON como objeto
      echo json_encode($data, JSON_FORCE_OBJECT);
    break;

  case 'AnularPeriodo':
    $OpcionAnular=$_POST['OpAnular'];
    $actualizarPeriodo=CambioEstado($_SESSION['expedicnte'],$OpcionAnular);
    if($actualizarPeriodo==1){
      $historial=DeleteHistorial($_SESSION['expedicnte'], $_SESSION['Codigo_Empleado'],$OpcionAnular);
    }
 

    $data = array(
      'Estado' => $actualizarPeriodo

      );
      

      //Devolvemos el array pasado a JSON como objeto
      echo json_encode($data, JSON_FORCE_OBJECT);

  break;
  
  case 'MostrarPermisos':
    $Permiso=$_POST['periodo'];
    
    $GetPermiso=GetPermisos($Permiso);


     

    
      

      //Devolvemos el array pasado a JSON como objeto
      echo json_encode($GetPermiso, JSON_FORCE_OBJECT);

  break;
  case 'MostrarPermisosAmodificar':
    $Permiso=EncriptacionPeriodos($_POST['periodo']);
    $fecha1=EncriptacionPeriodos($_POST['fecha1']);
    $fecha2=EncriptacionPeriodos($_POST['fecha2']);

    
    $GetPermisoDEtalle=GetPermisosDetalle($Permiso,$fecha1,$fecha2);
    $_SESSION['periodo_sesion']=$Permiso;
    $_SESSION['fecha1_sesion']=$fecha1;
    $_SESSION['fecha2_sesion']=$fecha2;
  
  
     

    
      

      //Devolvemos el array pasado a JSON como objeto
      echo json_encode($GetPermisoDEtalle, JSON_FORCE_OBJECT);

  break;
  case 'ModificarPermisos':
   
    $Motivo=$_POST['Motivo'];
    $nuevaFechaInicio=$_POST['fechaInicio'];
    $Periodo=$_SESSION['periodo_sesion'];
    $nuevafechaFin=$_POST['fechaFin'];
    $fechaInicio=$_SESSION['fecha1_sesion'];
    $fechaFin=$_SESSION['fecha2_sesion'];
    $Observacion=$_POST['Observacion'];
    
    
    echo EditarPermiso($nuevaFechaInicio,$Periodo,$nuevafechaFin,$fechaInicio,$fechaFin,$Motivo,$Observacion);


  break;
  
  

  
  case 'VerificarPsw':
    $optenerpasw=$_POST[''];
  break;
  
  default:
  //echo $cuenta['DatosEmpleado'][0]['cApellidos'];
 
 
renderizar("Permisos",$cuenta);
}


    //esta funcion rederiza la platilla con los datos
    // que le manda el controlador.



  }


  run();
  
?>
