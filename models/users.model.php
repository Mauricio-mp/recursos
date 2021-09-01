<?php
    require_once("libs/dao.php");
   

    function obtenerTodosMensajes(){
        $sqlstr = "SELECT * from mensajes;";
        return obtenerRegistros($sqlstr);
    }

    function prueba(){
      $vam= ConexionSQLserverVAM();
      

      $query= mssql_query("SELECT distinct cpayno,dtrs FROM prmisc WHERE cempno='000182' and dtrs between '2019/01/01' and '2021/04/29' order by dtrs ASC ");
      while($fila=mssql_fetch_array($query)){
        $array[]=$fila;
      }
      $temp = array();
$new = array();

foreach($array as $value)
{
if(!in_array($value["cpayno"],$temp))
{
$temp[] = $value["cpayno"];
$new[] = $value;
}
}


for ($i=0; $i <count($new) ; $i++) { 
  echo $new[$i]['cpayno'];
  echo "</br>";

}
    }

    

    function NuevoUsuario($correo, $contrasenia){
      $arreglo= ["corre"=>$correo,"con"=>$contrasenia];
      return $arreglo;
    }
    
    function AutenticarUsuario($codigo, $password){
      session_start();
      ob_start();
      ConexionSQLserver();
    
    
      $ContraDsemcript=encriptar($password);
      $validarcodigo= mssql_query("SELECT * FROM R_Usuarios WHERE CodEmpleado='$codigo' and Contrasenia='$ContraDsemcript'");
      $fila=mssql_fetch_array($validarcodigo);
      if(mssql_num_rows($validarcodigo)>0){
        $_SESSION['logeo']=$fila['Nombre']." ".$fila['Apellido'];
        $_SESSION['Codigo_Empleado']=$fila['CodEmpleado'];
        $_SESSION['IdUser']=$fila['Id_Usuario'];

        $idRol=$fila['Id_Rol'];
        
        

      $sql=mssql_query("SELECT * FROM Roles_Permisos WHERE Id_Rol='$idRol'");
      while($row=mssql_fetch_array($sql)){
        if($row['Id_Permiso']==1){ 
          $_SESSION["Indemnizacion"]=true;
        }
        if($row['Id_Permiso']==2){
          $_SESSION["Vacaciones"]=true;
          $_SESSION["Empleados"]=true;
        }
        if($row['Id_Permiso']==3){
          $_SESSION["CrearRol"]=true;
        }
        if($row['Id_Permiso']==6){
          $_SESSION["Reportes"]=true;
          $_SESSION["Reportes_Dedu_Planilla"]=true;
        }
        if($row['Id_Permiso']==4){
          $_SESSION["Reportes"]=true;
          $_SESSION["ReporteHistorialEmpleado"]=true;
        }
        if($row['Id_Permiso']==5){
          $_SESSION["Reportes"]=true;
          $_SESSION["ReporteHistorialVacaciones"]=true;
        }
        if($row['Id_Permiso']==7){
          $_SESSION["Reportes"]=true;
          $_SESSION["ReporteComemp"]=true;
        }
        if($row['Id_Permiso']==8){
          $_SESSION["Usuario"]=true;
          $_SESSION["Crearusuario"]=true;
        }
        if($row['Id_Permiso']==9){
          $_SESSION["Reportes"]=true;
          $_SESSION["ReporteSagFam"]=true;
        }
        if($row['Id_Permiso']==10){
          $_SESSION["Reportes"]=true;
          $_SESSION["ReporteInjupemp"]=true;
        }
        if($row['Id_Permiso']==11){
          $_SESSION["Reportes"]=true;
          $_SESSION["ReporteCofinter"]=true;
        }
        if($row['Id_Permiso']==12){
          $_SESSION["Reportes"]=true;
          $_SESSION["ReporteTrabajadores"]=true;
        }

        if($row['Id_Permiso']==13){
          $_SESSION["Empleados"]=true;
          $_SESSION["Infoempleados"]=true;
        }

        if($row['Id_Permiso']==15){
          $_SESSION["Reportes"]=true;
          $_SESSION["Deducciones"]=true;
        }
        if($row['Id_Permiso']==16){
          $_SESSION["Reportes"]=true;
          $_SESSION["DeduccionesIngresos"]=true;
        }
        if($row['Id_Permiso']==17){
          $_SESSION["Reportes"]=true;
          $_SESSION["ReporteGeneral"]=true;
        }
        if($row['Id_Permiso']==18){
          $_SESSION["Reportes"]=true;
          $_SESSION["ReporteImpuestos"]=true;
        }
        if($row['Id_Permiso']==19){
          $_SESSION["Reportes"]=true;
          $_SESSION["ReporteBancos"]=true;
        }
        
      }

        
       return 1;
      }else{
        return 4;
      }
    
      
      //   $cant1= mssql_num_rows($validarcodigo);
      //   return $cant1;


      // $ValidarUsuario= mssql_query("SELECT * FROM R_Usuarios WHERE Contrasenia!='$password'");
      // $cant2= mssql_num_rows($ValidarUsuario);
      //   return $cant2;
     
     
 
      
    }

    function mostrarEmpleado($txtopcion,$valor){

      ConexionSQLserverVAM();

      switch ($txtopcion) {
        case 'identidad':
          $valor=trim($valor);
          $sql=mssql_query("SELECT a.cempno , a.cfname ,a.clname, b.cDesc ,c.cdeptname,a.cfedid,a.cstatus 
          FROM prempy a
          INNER JOIN HRJobs b
          ON a.cjobtitle = b.cJobTitlNO
          INNER JOIN prdept c
          ON c.cdeptno=a.cdeptno 
          WHERE a.cfedid ='$valor'");
          while($row=mssql_fetch_array($sql)){
             $row["cfname"]=utf8_encode($row["cfname"]);
              $row["clname"]=utf8_encode($row["clname"]);
              $row["cfedid"]=$row['cfedid'];
              $row["cDesc"]=utf8_encode($row['cDesc']);
              $row["cdeptname"]=utf8_encode($row['cdeptname']);

              $estado=$row["cstatus"];
              if($estado=='A'){
                  $estado="Activo";
              }elseif ($estado=="I") {
                  $estado="Inactivo";
              }elseif ($estado=="T") {
                  $estado="No labora";
              }

              $row["estado"]=$estado;   
              $arr[]=$row;
          }
          break;
        case 'nombre':
          $valor=trim($valor);
          $sql=mssql_query("SELECT a.cempno , a.cfname ,a.clname, b.cDesc ,c.cdeptname,a.cfedid,a.cstatus 
          FROM prempy a
          INNER JOIN HRJobs b
          ON a.cjobtitle = b.cJobTitlNO
          INNER JOIN prdept c
          ON c.cdeptno=a.cdeptno 
          WHERE a.cfname like '%$valor%'");
          while($row=mssql_fetch_array($sql)){
             $row["cfname"]=utf8_encode($row["cfname"]);
              $row["clname"]=utf8_encode($row["clname"]);
              $row["cfedid"]=$row['cfedid'];
              $row["cDesc"]=utf8_encode($row['cDesc']);
              $row["cdeptname"]=utf8_encode($row['cdeptname']);

              $estado=$row["cstatus"];
              if($estado=='A'){
                  $estado="Activo";
              }elseif ($estado=="I") {
                  $estado="Inactivo";
              }elseif ($estado=="T") {
                  $estado="No labora";
              }

              $row["estado"]=$estado;   
              $arr[]=$row;
          }
          break;

          case 'Apellido':
            $valor=trim($valor);
          $sql=mssql_query("SELECT a.cempno , a.cfname ,a.clname, b.cDesc ,c.cdeptname,a.cfedid,a.cstatus 
          FROM prempy a
          INNER JOIN HRJobs b
          ON a.cjobtitle = b.cJobTitlNO
          INNER JOIN prdept c
          ON c.cdeptno=a.cdeptno 
          WHERE a.clname like '%$valor%'");
          while($row=mssql_fetch_array($sql)){
             $row["cfname"]=utf8_encode($row["cfname"]);
              $row["clname"]=utf8_encode($row["clname"]);
              $row["cfedid"]=$row['cfedid'];
              $row["cDesc"]=utf8_encode($row['cDesc']);
              $row["cdeptname"]=utf8_encode($row['cdeptname']);

              $estado=$row["cstatus"];
              if($estado=='A'){
                  $estado="Activo";
              }elseif ($estado=="I") {
                  $estado="Inactivo";
              }elseif ($estado=="T") {
                  $estado="No labora";
              }

              $row["estado"]=$estado;   
              $arr[]=$row;
          }
            break;
            case 'Numero':
              $valor=trim($valor);
          $sql=mssql_query("SELECT a.cempno , a.cfname ,a.clname, b.cDesc ,c.cdeptname,a.cfedid,a.cstatus 
          FROM prempy a
          INNER JOIN HRJobs b
          ON a.cjobtitle = b.cJobTitlNO
          INNER JOIN prdept c
          ON c.cdeptno=a.cdeptno 
          WHERE a.cempno ='$valor'");
          while($row=mssql_fetch_array($sql)){
             $row["cfname"]=utf8_encode($row["cfname"]);
              $row["clname"]=utf8_encode($row["clname"]);
              $row["cfedid"]=$row['cfedid'];
              $row["cDesc"]=utf8_encode($row['cDesc']);
              $row["cdeptname"]=utf8_encode($row['cdeptname']);

              $estado=$row["cstatus"];
              if($estado=='A'){
                  $estado="Activo";
              }elseif ($estado=="I") {
                  $estado="Inactivo";
              }elseif ($estado=="T") {
                  $estado="No labora";
              }

              $row["estado"]=$estado;   
              $arr[]=$row;
          }
              break;
        default:
          # code...
          break;
      }
      

     
return $arr;

 
     

    }
     function VerdatosEmpleado($cod){
      $vam= ConexionSQLserverVAM();

        $optenerdatos= mssql_query("SELECT * FROM prempy WHERE cempno='$cod'");
      if($filas=mssql_fetch_array($optenerdatos)){
        $filas['cfname']= utf8_encode(trim($filas['cfname'])).utf8_encode(trim($filas['clname']));
        $filas['dhire']=date('d/m/Y',strtotime($filas['dhire']));
        $filas['dcntrct']=date('d/m/Y',strtotime($filas['dcntrct']));
        if($filas['dterminate']==''){
          $filas['dterminate']='Sin Finalizacion';
        }else{
          $filas['dterminate']=date('d/m/Y',strtotime($filas['dterminate']));
        }
        
       // $nombre=$row['cempno'];
     
        //$nombre[]= $row['cempno'];

       

        $datos[] = $filas;


        




      }

      return $datos;
     }

     function DepartamendoEmpleado($depto){
      $vam= ConexionSQLserverVAM();

        $BuscarDeptoEmpleado= mssql_query("SELECT * FROM prdept WHERE cdeptno='$depto'");
      if($filas=mssql_fetch_array($BuscarDeptoEmpleado)){
       // $nombre=$row['cempno'];
     
        //$nombre[]= $row['cempno'];

       

        $valores[] = $filas;


        




      }

      return $valores;
     }
      function cargoEmpleado($cargo){
      $vam= ConexionSQLserverVAM();

        $BuscarcargoEmpleado= mssql_query("SELECT * FROM hrjobs WHERE cJobTitlNO='$cargo'");
      if($filas=mssql_fetch_array($BuscarcargoEmpleado)){
       // $nombre=$row['cempno'];
     
        //$nombre[]= $row['cempno'];

       

        $info[] = $filas;


        




      }

      return $info;
     }

     function optenerPlanillas($codigo,$fechaInico,$fechaFin){
      $vam= ConexionSQLserverVAM();

      $datosoptenidos=[];
                                                
                                    
                                    $consultar=mssql_query("SELECT distinct cpayno,dtrs FROM prmisc WHERE cempno='$codigo' and dcheck between '$fechaInico' and '$fechaFin' order by dtrs desc");
                                    
                                                while($fila=mssql_fetch_array($consultar)){
                                                    $planilla=$fila['cpayno'];
                                                

                                                    $consultarIngresos= mssql_query("SELECT * FROM prmisc WHERE cempno='$codigo' and cpayno='$planilla' ");
                                                    while($i=mssql_fetch_array($consultarIngresos)){
                                                      $i['dcheck']=date('d/m/Y',strtotime($i['dcheck']));
                                                      if($i['nothtax']==0.00){
                                                        $i['nothntax']= $i['nothntax'];
                                                    }

                                                    if($i['nothntax']==0.00){
                                                        $i['nothntax']= $i['nothtax'];
                                                    }

                                                    if (trim($i['cref'])=="") {
                                                      $i['cref']="Sin Descripcion";
                                                    }
                                                     $datosoptenidos[]=$i;



                                                     
                                                     
                                                    }

                                                    

                                                    $consultarDeducciones= mssql_query("SELECT * FROM prmisd WHERE cempno='$codigo' and cpayno='$planilla'");
                                                    while($h=mssql_fetch_array($consultarDeducciones)){
                                                      $h['tmodrec']=date("d-m-Y",strtotime($h['tmodrec']));
                                                        //$datosoptenidos[]=$h; 
                                                    }



                                                
                                                   } 




      

      return $datosoptenidos;
     }

       function optenerPlanillas2($codigo,$fechaInico,$fechaFin){
      $vam= ConexionSQLserverVAM();

      $valor='';
                                                
                                    
                                    $consultar=mssql_query("SELECT distinct cpayno,dtrs FROM prmisc WHERE cempno='$codigo' and dcheck between '$fechaInico' and '$fechaFin' order by dtrs desc");
                                    
                                                while($fila=mssql_fetch_array($consultar)){
                                                    $planilla=$fila['cpayno'];
                                                

                                                    $consultarIngresos= mssql_query("SELECT * FROM prmisc WHERE cempno='$codigo' and cpayno='$planilla' ");
                                                    while($i=mssql_fetch_array($consultarIngresos)){
                                                      $i['dcheck']=date('d/m/Y',strtotime($i['dcheck']));
                                                      if($i['nothtax']==0.00){
                                                        $i['nothntax']= $i['nothntax'];
                                                    }

                                                    if($i['nothntax']==0.00){
                                                        $i['nothntax']= $i['nothtax'];
                                                    }
                                                      $datosoptenidos[]=$i;
                                                     
                                                    }
                                                    

                                                    $consultarDeducciones= mssql_query("SELECT * FROM prmisd WHERE cempno='$codigo' and cpayno='$planilla'");
                                                    while($h=mssql_fetch_array($consultarDeducciones)){
                                                      $h['tmodrec']=date("d-m-Y",strtotime($h['tmodrec']));
                                                        $datosoptenidos[]=$h; 
                                                    }



                                                
                                                   } 




      

      return $datosoptenidos;
     }

     function deducciones($codigo,$fechaInico,$fechaFin){


       ConexionSQLserverVAM();

      $valor='';
                                                
                                    
                                    $consultar=mssql_query("SELECT distinct cpayno,dtrs FROM prmisc WHERE cempno='$codigo' and dcheck between '$fechaInico' and '$fechaFin' order by dtrs desc");
                                    
                                                while($fila=mssql_fetch_array($consultar)){
                                                    $planilla=$fila['cpayno'];
                                                

                                                   $consultarDeducciones= mssql_query("SELECT * FROM prmisd WHERE cempno='$codigo' and cpayno='$planilla' ");
                                                    while($h=mssql_fetch_array($consultarDeducciones)){

                                                      $datosoptenidos[]=$h;
                                                     
                                                    }
                                                 



                                                
                                                   } 




      

      return $datosoptenidos;
     }


     function VerificarPassword($password,$codigo){
      ConexionSQLserver();
      $Password=encriptar($password);
      $sql=mssql_query("SELECT * FROM R_Usuarios WHERE Contrasenia='$Password' and CodEmpleado='$codigo'");
      $fila=mssql_fetch_array($sql);
      if(mssql_num_rows($sql)>0){
        $bool=0;
      }else{
        $bool=1;
      }
      return $bool;
     }
     define('METHOD','AES-256-CBC');
     define('SECRET_KEY','$Ministerio@2020');
     define('SECRET_IV','101712');

     function encriptar($string){

      $output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
			$output=base64_encode($output);
			return $output;
     }
     function desemcriptar($string){
      $output=FALSE;
      $key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
			return $output;
     }

     function ActualizarContra($anterior,$nueva,$verificar,$usuario,$key){
      ConexionSQLserver();
       if($nueva != $verificar){
         return 'Error. No coinciden las Constraseñas';
       }else{
      $Clave=encriptar($verificar);
      $sql=mssql_query("UPDATE R_Usuarios SET Contrasenia='$Clave' WHERE CodEmpleado='$usuario'");
      if ($sql==true) {
        return "ok";
      }else{
        return "Error al actualizar ";
      }

        
    
       
       }
       

       
     }

     function Insertar($codigo,$fechaInicio,$fechaFin,$user){
     ConexionSQLserverVAM();

     $optenerdatos= mssql_query("SELECT * FROM prempy WHERE cempno='$codigo'");
     $filas=mssql_fetch_array($optenerdatos);

     $Nombre=utf8_encode(trim($filas['cfname']));
     $apellido=utf8_encode(trim($filas['clname']));
     ConexionSQLserver();
      $insert=mssql_query("INSERT INTO Reporte_Generado(Codigo_Empleado,Nombre_Empleado,Apellido_Empleado,UsuarioCreacion,FechaCreacion,Id_Catalogo)
      VALUES('$codigo','$Nombre','$apellido','$user',GETDATE(),2)");     

      if($insert==true){
        return 1;
      }else{
        return 0;
      }
     
     
    }


    

  
?>
