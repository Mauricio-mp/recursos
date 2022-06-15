<?php
require_once("libs/dao.php");
include ('Pdf/fpdf/WriteTag.php');
include ('ConvertSueldo.php');
function Mostrardias($periodoseleccionar,$identidad) {
  $arr=[];
    ConexionSQLRecursosHumanos();
    
    $sql=mssql_query("SELECT * from dbo.PR_Permisos WHERE cPeriodo IN($periodoseleccionar) and cPersonaId ='$identidad'");
while($ejecutar=mssql_fetch_array($sql)){
    $mensaje="Dias Calendarios";
    if($ejecutar['bDiasHabiles']==1){
        $mensaje="Dias Habiles";
    }
    if($ejecutar['cPeriodo']=="1111 - 1111"){
        $ejecutar['cPeriodo']="PERIODO DE PRUEBAS";
    }

    $ejecutar['letras']=$ejecutar['iDisponibilidad']."\t(".convertir(ABS($ejecutar['iDisponibilidad'])).")\t".$mensaje;
    $arr[]=$ejecutar;

}
    return $arr;
 }


 function optenertipo(){
    ConexionSQLRecursosHumanos();
    
$sql=mssql_query("SELECT * FROM GN_Varios WHERE cClave='permiso'");
while($ejecutar=mssql_fetch_array($sql)){
    $ejecutar['cDescripcion']=utf8_encode( $ejecutar['cDescripcion']);
    $arr[]=$ejecutar;

}
    return $arr;
 }

 function optener_periodo(){

    $date=date('Y-m-d');
        $fechaActual=date('Y-m-d',strtotime($date."+5 year"));

    
$fecha1=date('Y',strtotime($fechaActual));
$fecha2=date('Y',strtotime($fechaActual."-1 year"));

for ($i=$fecha1; $i >1993 ; $i--) { 
    $Siguienteanio=$i+1;
    $per['periodo']=$i." - ".$Siguienteanio;
    $arr[]=$per;
}

    
   

//$arr[]=$fecha1."-".$fecha3;


return $arr;

}
function optener_jefes(){
    ConexionSQLserver();
    $sql=mssql_query("select * from JefeSeccionTramites where estado=1");
    while($ejecutar=mssql_fetch_array($sql)){
        $ejecutar['Nombre_Firma']=utf8_encode( $ejecutar['Nombre_Firma']);
        $ejecutar['Apellido_Firma']=utf8_encode( $ejecutar['Apellido_Firma']);
        $ejecutar['nombrecompleto']=$ejecutar['Nombre_Firma'].' '.$ejecutar['Apellido_Firma'];

       
        $arr[]=$ejecutar;
    
    }
        return $arr;
     }
function Restriccion($codigoEmpleado){
    ConexionSQLserver();

    $sql=mssql_query("SELECT b.Id_Permiso FROM Roles_Permisos b, R_Usuarios a WHERE a.CodEmpleado ='$codigoEmpleado' and a.Id_Rol =b.Id_Rol and b.Id_Permiso =2");
    if($row= mssql_fetch_array($sql)){
        $Idrol=$row['Id_Permiso'];
    }
    if($Idrol==''){
        $Idrol=false;
    }else{
        $Idrol=true;
    }

    return $Idrol;
}
function EncriptacionPeriodos($encoded){
   
    
    $decoded = "";
    for( $i = 0; $i < strlen($encoded); $i++ ) {
    $b = ord($encoded[$i]);
    $a = $b ^ 123;  
    $decoded .= chr($a);
    }

return $decoded;
}
function GetListaPeriodos($periodo){
    ConexionSQLRecursosHumanos();

    $sql=mssql_query("SELECT * FROM PR_PermisoH  WHERE Estado='1' and cPermisoId='$periodo'");

    while($row=mssql_fetch_array($sql)){
        $row['fDesde']=date('d/m/Y',strtotime($row['fDesde']));
        $row['fHasta']=date('d/m/Y',strtotime($row['fHasta']));
      
        echo "<option value=".$row['Cod_Permisos'].">".$row['fDesde']." - ".$row['fHasta']."</option>";
    }

    

}
function GetPermisosDetalle($permiso,$fecha,$fecha2){
    $fecha=date('Y-m-d',strtotime($fecha));
    $fecha2=date('Y-m-d',strtotime($fecha2));
    
    $sql=mssql_query("SELECT cPermisoId,cMotivo,fDesde,fHasta,iDias,cObservaciones FROM PR_PermisoH WHERE cPermisoId='$permiso' and fDesde='$fecha' and fHasta='$fecha2' and Estado=1");

    if($row=mssql_fetch_array($sql)){
       
        

        //$fila=mssql_fetch_array($query);

        //$arr['Motivo']=utf8_encode(trim($fila['cDescripcion']));
        
        
        $row['Mot']=$row['cMotivo'];
        $row['Desde']=$row['fDesde'];
        $row['Hasta']=$row['fHasta'];
        $row['observaciones']=$row['cObservaciones'];

        $row['fDesde']=date("Y-m-d",strtotime($row['fDesde']));
        $row['fHasta']=date("Y-m-d",strtotime($row['fHasta']));
        $row['dias']=number_format($row['iDias'],-1);
        $row['cPermisoId']= $row['cPermisoId'];
        
        $row['num']=mssql_num_rows($sql);
        $arr[]=$row;

    }

    return $arr;
}



function GetPermisos($Permiso){
    ConexionSQLRecursosHumanos();
    

    $sql=mssql_query("SELECT cPermisoId,cMotivo,fDesde,fHasta,iDias FROM PR_PermisoH WHERE cPermisoId='$Permiso' and Estado=1");

    while($row=mssql_fetch_array($sql)){
       
        

        //$fila=mssql_fetch_array($query);

        //$arr['Motivo']=utf8_encode(trim($fila['cDescripcion']));
        
        
        $row['Mot']=$row['cMotivo'];
        $row['Desde']=$row['fDesde'];
        $row['Hasta']=$row['fHasta'];
       

        $row['fDesde']=date("d/m/Y",strtotime($row['fDesde']));
        $row['fHasta']=date("d/m/Y",strtotime($row['fHasta']));
        $row['dias']=number_format($row['iDias'],1);
        $row['cPermisoId']= $row['cPermisoId'];
        $row['num']=mssql_num_rows($sql);
        $arr[]=$row;

    }

    return $arr;


}

function editarDias($periodo){
    ConexionSQLRecursosHumanos();
   
    $sql=mssql_query("SELECT iDisponibilidad FROM PR_Permisos where cPermisoId ='$periodo' ");
    if($row=mssql_fetch_array($sql)){
        $row['disponibilidad']= $row['iDisponibilidad'];
        
        $arr[]=$row; 
        
    }
    return $arr; 
    
}

function editarDiasvacaciones($nuevodia,$periodo){
    ConexionSQLRecursosHumanos();
   $consulta=mssql_query("SELECT cPeriodo,iDisponibilidad FROM PR_Permisos WHERE cPermisoId='$periodo' ");
   $fila=mssql_fetch_array($consulta);

   $sql1=mssql_query("SELECT SUM(iDias) as dia FROM dbo.PR_PermisoH WHERE cPermisoId= '$periodo' and Estado=1");

   if($fila['iDisponibilidad']==0.00){
        if($nuevodia<0){
            return "el dia ingresado debe ser mayor a cero";
        }else{
            $sql=mssql_query("UPDATE PR_Permisos SET iDisponibilidad='$nuevodia' where cPermisoId='$periodo' ");
        }
   }else{
    if($row=mssql_fetch_array($sql1)) {
        $row['dia']=$row['dia'];

        if($row['dia']==0.00){
            $sql=mssql_query("UPDATE PR_Permisos SET iDisponibilidad='$nuevodia' where cPermisoId='$periodo'  ");
        }else{
            if($nuevodia< $row['dia']) {
                return "Los dias ingresados deben ser mayores a los dias gozados";
                //return $row['dia'];
            }else {
                if($periodo=='1111 - 1111'){
                    $nuevodia= '-'.$nuevodia;
                    $sql=mssql_query("UPDATE PR_Permisos SET Catantidad_Fija='$nuevodia' where cPermisoId='$periodo' ");
                    
                }else{
                    $sql=mssql_query("UPDATE PR_Permisos SET iDisponibilidad='$nuevodia' where cPermisoId='$periodo' ");
        
                }
            
           
            }

        }
        
    } 
   }


   
    

    if($sql==true ){
        return 0;
    }else{
       return 1;
    }  
}

function EditarPermiso($nuevaFechaInicio,$Periodo,$nuevafechaFin,$fechaInicio,$fechaFin,$Motivo,$Observacion){
$dias=ValidarDiasHabiles($nuevaFechaInicio,$nuevafechaFin);
$diasAnteriores=ValidarDiasHabiles($fechaInicio,$fechaFin);

     $sql=mssql_query("UPDATE RecursosHumanos.dbo.PR_PermisoH SET 
     fDesde='$nuevaFechaInicio', 
     fHasta='$nuevafechaFin', 
     iDias='$dias', 
     cMotivo='$Motivo',
     cObservaciones='$Observacion' 
     
     WHERE cPermisoId='$Periodo' AND fDesde='$fechaInicio' and fHasta='$fechaFin' AND Estado=1");

      $validarDiasAnteriores=validarDiasAnteriores($fechaInicio,$fechaFin,$Periodo,$nuevaFechaInicio,$nuevafechaFin,$diasAnteriores,$dias);
     if($validarDiasAnteriores==true){
        $recalculo=recalculo($nuevaFechaInicio,$Periodo,$nuevafechaFin,$fechaInicio,$fechaFin);
        $resultado=$recalculo['resultado'];
        $per=$recalculo['periodo'];
        if($per=='1111 - 1111'){
            
            $result=Hacerresultado($per,$nuevaFechaInicio,$Periodo,$nuevafechaFin,$fechaInicio,$fechaFin);
   
            $nuevoUpdate=mssql_query("UPDATE RecursosHumanos.dbo.PR_Permisos SET Catantidad_Fija='$result' WHERE cPermisoId='$Periodo' AND Estado=1");
            if($nuevoUpdate==true){
                $msg=1;
            }else{
                $msg="Hubo un error al ingresar";
            }
   
        }else{
   
        if($sql==true){
           $sql2=mssql_query("UPDATE RecursosHumanos.dbo.PR_Permisos SET iDisponibilidad='$resultado' WHERE cPermisoId='$Periodo' AND Estado=1");
           if($sql2==true){
               $msg=1;
           }else{
               $msg=$recalculo['resultado'];
           }
            
   
        }else{
            $msg='error al actualizar datos';
        }
        }  
     }else{
         $msg="Sobrepasa los dias disponibles";

     }

 return $msg;
}
function validarDiasAnteriores($fechaInicio,$fechaFin,$Periodo,$nuevaFechaInicio,$nuevafechaFin,$diasAnteriores,$dias){
    $sql=mssql_query("SELECT SUM(iDias) as Dias FROM PR_PermisoH WHERE cPermisoId='$Periodo' and Estado=1 ");
    $sql2=mssql_query("SELECT * from PR_Permisos WHERE cPermisoId ='$Periodo'");
    $fila=mssql_fetch_array($sql2);
    $row=mssql_fetch_array($sql);
    

    if($row['Dias'] > $fila['iDisponibilidad']){
        $update=mssql_query("UPDATE RecursosHumanos.dbo.PR_PermisoH SET 
     fDesde='$fechaInicio', 
     iDias='$diasAnteriores', 
     fHasta='$fechaFin'
     WHERE cPermisoId='$Periodo' AND fDesde='$nuevaFechaInicio' and fHasta='$nuevafechaFin' AND Estado=1");
        return false;
    }else{
        return true;
    }

   
        
    


}

function ListaPerriodos($usuario){
    ConexionSQLRecursosHumanos();
    $sql=mssql_query("SELECT x.* FROM RecursosHumanos.dbo.PR_Permisos x
    WHERE cPersonaId='$usuario' and Estado='1' ORDER BY cPeriodo DESC");
    while($row=mssql_fetch_array($sql)){
        $arr[]=$row;
    }
    ConexionSQLRecursosHumanos();

    return $arr;
}
function OPtenerCodigoEmpleado($identidad){
    ConexionSQLserverVAM();
    $sql=mssql_query("SELECT x.* FROM mpsiafi.dbo.prempy x
    WHERE cfedid='$identidad'");

    $row=mssql_fetch_array($sql);

    return $row['cempno'];
}
 function optenerEmpleado($opcion,$valor){
    ConexionSQLserverVAM();
    switch ($opcion) {
        case 'identidad':
            $valor=trim($valor);
            $sql=mssql_query("SELECT  a.cfedid, a.cempno , a.cfname ,a.clname, b.cDesc ,c.cdeptname,a.cstatus,a.dhire,dcntrct 
            FROM prempy a
            INNER JOIN HRJobs b
            ON a.cjobtitle = b.cJobTitlNO
            INNER JOIN prdept c
            ON c.cdeptno=a.cdeptno 
            WHERE a.cfedid ='$valor'");
            while($ejecutar=mssql_fetch_array($sql)){
               $ejecutar["cNombres"]=utf8_encode($ejecutar["cfname"]);
                $ejecutar["cApellidos"]=utf8_encode($ejecutar["clname"]);
                $ejecutar["cPersonaId"]=$ejecutar['cfedid'];
                $ejecutar["Cargo"]=utf8_encode($ejecutar['cDesc']);
                $ejecutar["Departamento"]=utf8_encode($ejecutar['cdeptname']);

                $estado=$ejecutar["cstatus"];
                if($estado=='A'){
                    $estado="Activo";
                }elseif ($estado=="I") {
                    $estado="Inactivo";
                }elseif ($estado=="T") {
                    $estado="No labora";
                }

                $ejecutar["estado"]=$estado;   
                $arr[]=$ejecutar;
            }
            
           
    break;
    case 'nombre':
        $sql=mssql_query("SELECT a.cfedid, a.cempno , a.cfname ,a.clname, b.cDesc,c.cdeptname,a.cstatus,a.dhire,dcntrct 
            FROM prempy a
            INNER JOIN HRJobs b
            ON a.cjobtitle = b.cJobTitlNO
            INNER JOIN prdept c
            ON c.cdeptno=a.cdeptno 
            WHERE a.cfname like '%$valor%'");
            while($ejecutar=mssql_fetch_array($sql)){
               $ejecutar["cNombres"]=utf8_encode($ejecutar["cfname"]);
                $ejecutar["cApellidos"]=utf8_encode($ejecutar["clname"]);
                $ejecutar["cPersonaId"]=$ejecutar['cfedid'];
                $ejecutar["Cargo"]=utf8_encode($ejecutar['cDesc']);
                $ejecutar["Departamento"]=utf8_encode($ejecutar['cdeptname']);
                
                $estado=$ejecutar["cstatus"];
                if($estado=='A'){
                    $estado="Activo";
                }elseif ($estado=="I") {
                    $estado="Inactivo";
                }elseif ($estado=="T") {
                    $estado="No labora";
                }

                $ejecutar["estado"]=$estado;   
                $arr[]=$ejecutar;
            }
        break;
        case 'Apellido':
            $sql=mssql_query("SELECT a.cfedid, a.cempno , a.cfname ,a.clname, b.cDesc ,c.cdeptname,a.cstatus,a.dhire,dcntrct 
            FROM prempy a
            INNER JOIN HRJobs b
            ON a.cjobtitle = b.cJobTitlNO
            INNER JOIN prdept c
            ON c.cdeptno=a.cdeptno 
            WHERE a.clname like '%$valor%'");
            while($ejecutar=mssql_fetch_array($sql)){
               $ejecutar["cNombres"]=utf8_encode($ejecutar["cfname"]);
                $ejecutar["cApellidos"]=utf8_encode($ejecutar["clname"]);
                $ejecutar["cPersonaId"]=$ejecutar['cfedid'];
                $ejecutar["Cargo"]=utf8_encode($ejecutar['cDesc']);
                $ejecutar["Departamento"]=utf8_encode($ejecutar['cdeptname']);
                
                $estado=$ejecutar["cstatus"];
                if($estado=='A'){
                    $estado="Activo";
                }elseif ($estado=="I") {
                    $estado="Inactivo";
                }elseif ($estado=="T") {
                    $estado="No labora";
                }

                $ejecutar["estado"]=$estado;   
                $arr[]=$ejecutar;
            }
        break;
        case 'Numero':
            $sql=mssql_query("SELECT a.cfedid, a.cempno , a.cfname ,a.clname, b.cDesc ,c.cdeptname,a.cstatus,a.dhire,dcntrct 
            FROM prempy a
            INNER JOIN HRJobs b
            ON a.cjobtitle = b.cJobTitlNO
            INNER JOIN prdept c
            ON c.cdeptno=a.cdeptno 
            WHERE a.cempno ='$valor'");
            while($ejecutar=mssql_fetch_array($sql)){
               $ejecutar["cNombres"]=utf8_encode($ejecutar["cfname"]);
                $ejecutar["cApellidos"]=utf8_encode($ejecutar["clname"]);
                $ejecutar["cPersonaId"]=$ejecutar['cfedid'];
                $ejecutar["Cargo"]=utf8_encode($ejecutar['cDesc']);
                $ejecutar["Departamento"]=utf8_encode($ejecutar['cdeptname']);
                
                $estado=$ejecutar["cstatus"];
                if($estado=='A'){
                    $estado="Activo";
                }elseif ($estado=="I") {
                    $estado="Inactivo";
                }elseif ($estado=="T") {
                    $estado="No labora";
                }

                $ejecutar["estado"]=$estado;   
                $arr[]=$ejecutar;
            }
        break;
    }
    return $arr;
 }
 function ingresoferiado($feriado,$observacionFeriado){
    ConexionSQLRecursosHumanos();
    $observacionFeriado=utf8_decode($observacionFeriado);
     $dia=date("d",strtotime($feriado));
     $mes=date("m",strtotime($feriado));
     $anio=date("Y",strtotime($feriado));
     $feriado=$anio.$mes.$dia;
     $Consultar=mssql_query("SELECT * FROM  GN_Varios WHERE cClave='Feriados' AND cValor='$feriado'");
     $cont=mssql_num_rows($Consultar);
     if($cont>0){
        return 0003;
     }else{
        $Sql=mssql_query("INSERT INTO GN_Varios (cClave, cDescripcion, cValor) VALUES('Feriados', '$observacionFeriado','$feriado')");
        if($Sql==true){
            return 0001;
        }else{
            return 0002;
        }  
     }
       

 }
 function DeleteFeriado($valor,$feriado,$Descripcion){
    $dia=date("d",strtotime($valor));
    $mes=date("m",strtotime($valor));
    $anio=date("Y",strtotime($valor));
    $valor=$anio.$mes.$dia;
$Descripcion=utf8_decode($Descripcion);
    $Sql=mssql_query("DELETE FROM  GN_Varios  WHERE cClave='$feriado' and cValor='$valor' and cDescripcion='$Descripcion'");
    if($Sql==true){
        return 1;
    }else{
        return 0;
    }
    
  
 }

 function Listarferiados($feriados){
    $consultarDias=mssql_query("SELECT * FROM GN_Varios WHERE cClave='$feriados' ORDER BY cValor DESC");
    while($row=mssql_fetch_array($consultarDias)){
        $row['cValor']=date("Y-m-d",strtotime($row['cValor']));
        $row['cDescripcion']=utf8_encode($row['cDescripcion']);
        $arr[]=$row;
    }
     return $arr;
 }

 function recalculo($nuevaFechaInicio,$Periodo,$nuevafechaFin,$fechaInicio,$fechaFin){
    ConexionSQLRecursosHumanos();
    $diaNuevo=ValidarDiasHabiles($nuevaFechaInicio,$nuevafechaFin);
    $diAnterior=ValidarDiasHabiles($fechaInicio,$fechaFin);
    $resultado=0;
    
    $consultarDias=mssql_query("SELECT iDisponibilidad,cPeriodo FROM PR_Permisos WHERE cPermisoId='$Periodo'");
    if($row=mssql_fetch_array($consultarDias)){
        $valor=$row['iDisponibilidad'];
        $tIPOpERIODO=$row['cPeriodo'];
    }

    if($diaNuevo>$diAnterior){
        $operacion=$diaNuevo-$diAnterior;
        $resultado=$valor-$operacion;
    }elseif ($diaNuevo<$diAnterior) {
        $operacion=$diAnterior-$diaNuevo;
        $resultado=$valor+$operacion;
    }elseif ($diaNuevo==$diAnterior) {
       
        $resultado=$valor;
    }

    $array=array("resultado"=>$resultado,
    "periodo"=>$tIPOpERIODO);


    


        return $array;

 }
 function Hacerresultado($per,$nuevaFechaInicio,$Periodo,$nuevafechaFin,$fechaInicio,$fechaFin){
    ConexionSQLRecursosHumanos();
    $diaNuevo=ValidarDiasHabiles($nuevaFechaInicio,$nuevafechaFin);
    $diAnterior=ValidarDiasHabiles($fechaInicio,$fechaFin);
    $resultado=0;
    
    $consultarDias=mssql_query("SELECT SUM(iDias) as Dias FROM PR_PermisoH WHERE cPermisoId='$Periodo' and Estado=1");
    if($row=mssql_fetch_array($consultarDias)){
        $dias=-$row['Dias'];
        
    }

    $consultarDisponibles=mssql_query("SELECT iDisponibilidad FROM PR_Permisos WHERE cPermisoId='$Periodo'");
    if($datos=mssql_fetch_array($consultarDisponibles)){
        $diasDisponibles=$datos['iDisponibilidad'];
       

        
    }
 
       
        return $dias;

 }

 function optener_motivo(){
    ConexionSQLRecursosHumanos();

    $sql=mssql_query("SELECT * FROM GN_Varios WHERE cClave='Motivo'");
    while($ejecutar=mssql_fetch_array($sql)){
        $ejecutar['cDescripcion']=utf8_encode( $ejecutar['cDescripcion']);
        $arr[]=$ejecutar;
    
    }
        return $arr;
     }

     function InsertHistorial($identidad,$Usuario,$Periodo){
        ConexionSQLserverVAM();
        
         $sql=mssql_query("SELECT * FROM prempy WHERE cfedid='$identidad'");
         if($row=mssql_fetch_array($sql)){
             $codigo=$row['cempno'];
             $nombre=utf8_decode(trim($row['cfname']));
             $apellido=utf8_decode(trim($row['clname']));

             $name=utf8_encode($nombre);
             $apel=utf8_encode($apellido);




         }
         ConexionSQLserver();
       
                $acccion="Creacion Periodo:\t".$Periodo;
                $insert=mssql_query("INSERT INTO Reporte_Generado(Codigo_Empleado,Apellido_Empleado,Nombre_Empleado,UsuarioCreacion,FechaCreacion,Id_Catalogo,Periodo,Accion) VALUES('$codigo','$apel','$name','$Usuario',GETDATE(),'3','$Periodo','$acccion')");
               
         

         if($insert==true){
             return 0;
         }else{
             return 1;
         }

     }

     function DeleteHistorial($identidad,$Usuario,$Periodo){
        ConexionSQLserverVAM();
        
         $sql=mssql_query("SELECT * FROM prempy WHERE cfedid='$identidad'");
         if($row=mssql_fetch_array($sql)){
             $codigo=$row['cempno'];
             $nombre=utf8_decode(trim($row['cfname']));
             $apellido=utf8_decode(trim($row['clname']));

             $name=utf8_encode($nombre);
             $apel=utf8_encode($apellido);




         }
         ConexionSQLserver();
       
                $acccion="Eliminacion Periodo:\t".$Periodo;
                $insert=mssql_query("INSERT INTO Reporte_Generado(Codigo_Empleado,Apellido_Empleado,Nombre_Empleado,UsuarioCreacion,FechaCreacion,Id_Catalogo,Periodo,Accion) VALUES('$codigo','$apel','$name','$Usuario',GETDATE(),'3','$Periodo','$acccion')");
               
         

         if($insert==true){
             return 0;
         }else{
             return 1;
         }

     }
     function InsertHistorialPermiso($identidad,$Usuario,$Periodo,$fechaInicio,$fechaFin){
        ConexionSQLserverVAM();
        
        $sql=mssql_query("SELECT * FROM prempy WHERE cfedid='$identidad'");
        if($row=mssql_fetch_array($sql)){
            $codigo=$row['cempno'];
            $nombre=utf8_decode(trim($row['cfname']));
            $apellido=utf8_decode(trim($row['clname']));

            $name=utf8_encode($nombre);
            $apel=utf8_encode($apellido);


            ConexionSQLserver();
       
            $acccion="Creacion Permiso :\t".date("d/m/Y",strtotime($fechaInicio))." - ".date("d/m/Y",strtotime($fechaFin));
            $insert=mssql_query("INSERT INTO Reporte_Generado(Codigo_Empleado,Apellido_Empleado,Nombre_Empleado,UsuarioCreacion,FechaCreacion,Id_Catalogo,Periodo,Accion) VALUES('$codigo','$apel','$name','$Usuario',GETDATE(),'3','$Periodo','$acccion')");
           
     

     if($insert==true){
         return 0;
     }else{
         return 1;
     }

        }

         return 0;


     }

     function InsertHistorialPermisos($identidad,$Usuario,$permiso,$periodo){

     
     $sql=mssql_query("SELECT * FROM prempy WHERE cfedid='$identidad'");
     if($row=mssql_fetch_array($sql)){
         $codigo=$row['cempno'];
         $nombre=utf8_decode(trim($row['cfname']));
         $apellido=utf8_decode(trim($row['clname']));

         $name=utf8_encode($nombre);
         $apel=utf8_encode($apellido);

     }
     ConexionSQLRecursosHumanos();

          $consulta1=mssql_query("SELECT PR_PermisoH.fDesde,PR_PermisoH.fHasta,PR_Permisos.cPeriodo
          FROM PR_PermisoH
          INNER JOIN PR_Permisos
          ON PR_PermisoH.cPermisoId = PR_Permisos.cPermisoId and PR_PermisoH.Cod_Permisos='$permiso' and PR_Permisos.cPermisoId='$periodo'");
if($fila=mssql_fetch_array($consulta1)){
    $desde=date("d/m/Y",strtotime($fila['fDesde']));
    $hasta=date("d/m/Y",strtotime($fila['fHasta']));
    $Periodo=$fila['cPeriodo'];
}

ConexionSQLserver();
         $acccion="Eliminacion Permiso :\t".$desde." - ".$hasta;
         $insert=mssql_query("INSERT INTO Reporte_Generado(Codigo_Empleado,Apellido_Empleado,Nombre_Empleado,UsuarioCreacion,FechaCreacion,Id_Catalogo,Periodo,Accion) VALUES('$codigo','$apel','$name','$Usuario',GETDATE(),'3','$Periodo','$acccion')");
        
  

  if($insert==true){
      return 0;
  }else{
      return 1;
  }

     

    
       }
     function InserPeriodo($Identidad,$tipo,$periodo,$DiasHabiles,$InhabPeriodo,$Dias){
        ConexionSQLRecursosHumanos();
        session_start();
        ob_start();
        $usuarioCreacion=$_SESSION['Codigo_Empleado'];
        $val=0;
        
        for ($i=0; $i <50 ; $i++) { 
            $PermisoId=$tipo.$periodo.$Identidad." - ".$i;
            $validarReferente=mssql_query("SELECT * FROM PR_Permisos WHERE cPermisoId='$PermisoId' ");
            $contarValidacion=mssql_num_rows($validarReferente);
            $fila=mssql_fetch_array($validarReferente);
            if($PermisoId==$fila['cPermisoId']){
                $c=$i+1;
                $periodoEcontrado=$tipo.$periodo.$Identidad." - ".$i;
                $PermisoId=$tipo.$periodo.$Identidad." - ".$c;
                $valid=$PermisoId;
                $val=1;
                
            }
           
        }
         
   
        if($val==1){
            if($contarValidacion==0){
            $consultarPeriodoExistente=mssql_query("SELECT * FROM PR_Permisos WHERE cPermisoId='$periodoEcontrado' and cPersonaId='$Identidad' and Estado=1");
        $filas=mssql_fetch_array($consultarPeriodoExistente);
        $count=mssql_num_rows($consultarPeriodoExistente);
        if($count>0){
            $mensaje=1;
            
        }
        if($count==0) {
            if($periodo=='1111 - 1111'){
                $diasFeriados=$Dias;
                $Dias=0;
            }else{
                $diasFeriados=$Dias;
            }
            $sqlInsert=mssql_query("INSERT INTO PR_Permisos(cPermisoId,cPersonaId,cTipo,cPeriodo,bValidarDisponibilidad,iDisponibilidad,bVigente,bDiasHabiles,Estado,Catantidad_Fija) 
               VALUES('$valid','$Identidad','25','$periodo','1','$diasFeriados','1','$DiasHabiles',1,'$Dias')");  
              if($sqlInsert==true){
                   $mensaje=0;
               }else{
                   $mensaje=mssql_get_last_message();
               }
        }
    }
            
        
        }else{
            if($periodo=='1111 - 1111'){
                $diasFeriados=$Dias;
                 $Dias=0;
            }else{
                $diasFeriados=$Dias;
            }
            $PermisoId=$tipo.$periodo.$Identidad." - 0";
            $sqlInsert=mssql_query("INSERT INTO PR_Permisos(cPermisoId,cPersonaId,cTipo,cPeriodo,bValidarDisponibilidad,iDisponibilidad,bVigente,bDiasHabiles,Estado,Usuario_Creacion,Fecha_Creacion,Catantidad_Fija) 
              VALUES('$PermisoId','$Identidad','25','$periodo','1','$diasFeriados','1','$DiasHabiles',1,'$usuarioCreacion',GETDATE(),'$Dias')");  
              if($sqlInsert==true){
                  $mensaje=0;
              }else{
                $mensaje=mssql_get_last_message();
              }
        }


         return $mensaje;
     }

     function CambioEstado($Identidad,$Periodo){
         if($Identidad==''){
             $mensaje=2;
         }else{
            $validarExistencia=mssql_query("SELECT * FROM PR_Permisos WHERE cPersonaId='$Identidad' and cPeriodo='$Periodo' and Estado=1");
            $count=mssql_num_rows($validarExistencia);
            if($count==0){
               $mensaje=0;
            }else{
               $sql = mssql_query("UPDATE PR_Permisos SET Estado=0 WHERE cPersonaId='$Identidad' and cPeriodo='$Periodo'");
               if($sql==true){
                   $mensaje=1;
               }
            }
         }
       
         
         return $mensaje;
     }

     function optenerDatosPermiso($Expediente){
        ConexionSQLRecursosHumanos();
         $sql=mssql_query("SELECT  * FROM PR_Permisos WHERE cPersonaId='$Expediente' and Estado='1' ORDER BY cPeriodo DESC");
         while($ejecutar=mssql_fetch_array($sql)){
             $optenerTipo=$ejecutar["cTipo"];
             $optenerPermisoId=trim($ejecutar["cPermisoId"]);
             $optenerPeriodo=$ejecutar["cPeriodo"];
             $dispinible=$ejecutar["iDisponibilidad"];
             if($optenerPeriodo=='1111 - 1111' ){
                 $optenerPeriodo="Periodo de Prueba";
                 

            
                    $dispinible=$ejecutar["Catantidad_Fija"];
                
                 
             }
            // if($ejecutar["cPeriodo"]=='1111 - 1111' &&  $dispinible==0.0){
                 //$dispinible=$ejecutar["Catantidad_Fija"];
             //}

            


             
             
            
                
             
             

             
             $sqlTipo=mssql_query("SELECT (cDescripcion) FROM GN_Varios WHERE cValor='$optenerTipo' and cClave='Permiso'");
             $fila=mssql_fetch_array($sqlTipo);
             

             $consultar=mssql_query("SELECT * FROM PR_PermisoH WHERE cPermisoId='$optenerPermisoId' ");
             $row=mssql_fetch_array($consultar);
             $row["Tipo"]=$fila["cDescripcion"];

             $row["fDesde"]=date('Y-m-d',strtotime( $row["fDesde"]));
             $row["fHasta"]=date('Y-m-d',strtotime( $row["fHasta"]));
             $row["Periodo"]=$optenerPeriodo;
             $row["disponible"]=$dispinible;
             $row["PeriodoId"]=$optenerPermisoId;





             
      
            




             $arr[]=$row;
         }

         
        
        
         return $arr;
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

       function BorrarPeriodo($permisoId,$periodoId,$cPermiso){
          

           $sql=mssql_query("SELECT x.* FROM RecursosHumanos.dbo.PR_PermisoH x
           WHERE Cod_Permisos='$permisoId' and cPermisoId='$periodoId'");

           if($row=mssql_fetch_array($sql)){
            $dias=$row['iDias'];

           
          
        }

        $consultaPeriodo=mssql_query("SELECT x.* FROM RecursosHumanos.dbo.PR_Permisos x
        WHERE cPermisoId='$periodoId' and Estado=1");
        $fila=mssql_fetch_array($consultaPeriodo);
        $sumador=$dias+$fila['iDisponibilidad'];
        $fija=$fila['Catantidad_Fija'];
        $totalPruebas=$fija+$dias;
        if($cPermiso=='1111 - 1111'){
            $Sumardias=mssql_query("UPDATE PR_Permisos SET Catantidad_Fija='$totalPruebas' WHERE cPermisoId='$periodoId'");
            $update=mssql_query("UPDATE PR_PermisoH SET Estado='0' WHERE Cod_Permisos='$permisoId' and cPermisoId='$periodoId'");

        }else{
            $Sumardias=mssql_query("UPDATE PR_Permisos SET iDisponibilidad='$sumador' WHERE cPermisoId='$periodoId'");
         $update=mssql_query("UPDATE PR_PermisoH SET Estado='0' WHERE Cod_Permisos='$permisoId' and cPermisoId='$periodoId'");
        }
        
         

         if($Sumardias==true && $update==true){
             return 0;
         }else{
             return 1;
         }
         
       
                  
       }





       function TipoPermiso(){
        ConexionSQLRecursosHumanos();
    
        $sql=mssql_query("SELECT * FROM GN_Varios WHERE cValor in ('21','25')  ");
        while($ejecutar=mssql_fetch_array($sql)){
            $arr[]=$ejecutar['cDescripcion'];
        }
        return $arr;
    }
    function DiasHabiles($fecha_inicial,$fecha_final)
{
    $fecha1 = strtotime($fecha_inicial); 
    $fecha2 = strtotime($fecha_final); 
    $i=0;
    for($fecha1;$fecha1<=$fecha2;$fecha1=strtotime('+1 day ' . date('Y-m-d',$fecha1))){ 
       
        
        if(date('D',$fecha1)=='Sat' || date('D',$fecha1)=='Sun' ){
            
        }else{
            $i++;
        }
      
    } 
return $i;
}
function mensajeValidacion($fecha){
    $dia = date("d",strtotime($fecha));
    $mes = date("m",strtotime($fecha));
    $anio = date("Y",strtotime($fecha));
    $fecha = $anio.$mes.$dia;
    ConexionSQLRecursosHumanos();
    $sql=mssql_query("SELECT x.* FROM RecursosHumanos.dbo.GN_Varios x WHERE cClave ='Feriados' and cValor='$fecha' ");
    $row=mssql_num_rows($sql);
   
    if($row == 0){
        return false;
    }else{
        return true;
    }
    




  
}

function ValidarDiasHabiles($fecha_Inicio,$fecha_Fin){
    
    $fecha1 = strtotime($fecha_Inicio); 
    $fecha2 = strtotime($fecha_Fin); 
   if(strtotime($fecha_Inicio)==strtotime($fecha_Fin)){
       return 1;
   }else{
    $i=0;
    for($fecha1;$fecha1<=$fecha2;$fecha1=strtotime('+1 day ' . date('Y-m-d',$fecha1))){ 
        $fechas = date("Y-m-d",$fecha1);
        
        if(date('D',$fecha1)=='Sat' || date('D',$fecha1)=='Sun' || mensajeValidacion($fechas)==true ){
            
        }else{
            $i++;
        }
      
    } 
    return $i;
   }
    



    
}
function DiasCalendario($FechaInicio,$FechaFin){
    if(strtotime($FechaInicio)==strtotime($FechaFin)){
        return 1;
    }else{
        $dias = (strtotime($FechaInicio)-strtotime($FechaFin))/86400;
        $dias = abs($dias); $dias = floor($dias);
        return $dias;
    }

}

    function IngresoPeriodo($OpcionPeriodo,$OpcionTipoLicencia,$CatidadHoras,$FechaInicio,$FechaFin,$MotivoLicencia,$Observacion,$nombreAutorizacion,$expedicnte,$usuarioLogged){
        ConexionSQLRecursosHumanos();
       $Observacion=utf8_decode($Observacion);
       
           $Licencia="Vacaciones";
       
$total=0;
        $consultarExpediente=mssql_query("SELECT * FROM PR_Permisos WHERE cPersonaId='$expedicnte' and cPeriodo='$OpcionPeriodo' and cTipo='25' and Estado='1'");
        $fila=mssql_fetch_array($consultarExpediente);

        if(mssql_num_rows($consultarExpediente)>0){
            $periodo=trim($fila['cPermisoId']);
            $CantidadDias=$fila['iDisponibilidad'];
            $cantidadPruabas=trim($fila['Catantidad_Fija']);
          //$DiasHabiles=DiasHabiles($FechaInicio,$FechaFin);
          $DiasHabiles=ValidarDiasHabiles($FechaInicio,$FechaFin);
          $DiasCalendario=DiasCalendario($FechaInicio,$FechaFin);
         /* if($fila['cPeriodo']=='1111 - 1111'){
            $diasPeriodoPrueba=abs($fila['Catantidad_Fija']);
          }*/
          
          $cod=date('d/m/Y',strtotime($FechaInicio)).date('d/m/Y',strtotime($FechaFin));

         
         
            if($fila['bDiasHabiles']==1){
                $dias=$DiasHabiles;

            }else{
               $dias=$DiasCalendario;
            }

            
     

            if($CatidadHoras=='4'){
               
                $dias=$dias/2;
                $ampm='AM';
                
            }
            if($CatidadHoras=='8'){
                
                $ampm='PM';
            }
            if($OpcionPeriodo=='1111 - 1111'){
                $total=abs($cantidadPruabas)+abs($dias);
            }else{
                $total=abs($CantidadDias)-abs($dias);
            }
            
            
            if($total < 0 && $OpcionPeriodo!='1111 - 1111'){
                $mensaje='Este permiso excede la cantidad de dias';
            }else if ($total > $CantidadDias && $OpcionPeriodo =='1111 - 1111'){
                $mensaje='Este permiso excede la cantidad de dias';
            }else{
                

                $sql=mssql_query("SELECT * FROM PR_PermisoH WHERE Cod_Permisos='$cod'and cPermisoId='$periodo' and Estado=1 ");
                if(mssql_num_rows($sql)>0){
                    $mensaje='Ya existe este Permiso';
                }else{
                    $InsertarPeriodo=mssql_query("INSERT INTO PR_PermisoH (cPermisoId,fDesde,fHasta,iHorasDiarias,cAPM,iDias,cMotivo,cAutorizador,cObservaciones,Estado,Cod_Permisos,Usuario_Creacion,Fecha_Creacion)
                    VALUES ('$periodo','$FechaInicio','$FechaFin','$CatidadHoras','$ampm','$dias','$Licencia','$nombreAutorizacion','$Observacion',1,'$cod','$usuarioLogged',GETDATE()) ");
                    if($InsertarPeriodo==true){
                        $mensaje= "0";
                        /*if(ValidarDiasPeriodo($expedicnte)==true){
                            if($total==0){
                                $total=-30;
                            }
                        }*/

                        if($fila['cPeriodo']=='1111 - 1111'){
                            $actualizarDisponibilidad=mssql_query("UPDATE PR_Permisos SET Catantidad_Fija='-$total' WHERE cPermisoId='$periodo'");
                        }else{
                            $actualizarDisponibilidad=mssql_query("UPDATE PR_Permisos SET iDisponibilidad='$total' WHERE cPermisoId='$periodo'");
                        }
                      
                    }else{
                        $mensaje=mssql_get_last_message();
        
                    }
                }
                

               
            }

            
            
        }
        

        return $mensaje;
    }

    function ValidarDiasPeriodo($expedicnte){
        ConexionSQLRecursosHumanos();

        $sql=mssql_query("SELECT * FROM dbo.PR_Permisos where  cPersonaId='$expedicnte' and cPeriodo ='1111 - 1111' and Estado=1 and iDisponibilidad =0 ");
        if(mssql_num_rows($sql)>0){
            return true;
        }else{
            return false;
        }
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
           return 'Error. No coinciden las Constrase�as';
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
  function MostrarPeriodo($array)
  {
    if($array['name'] =="CbxPeridodo"){
return $array['value'];
    }
    
    //return "El nombre de la provincia es: '". $array['name'] ."', y su puntuación es: ". $array['value'] ."},";
  }     
  function Mostrarobservaciones($array)
  {
    if($array['name'] =="CAI"){
return $array['value'];
    }
    
  }   
 function Imprimir($idem,$arrayPeridos,$arrayObservaciones,$json,$jefes,$periodoseleccionar){




$identidad=$idem;
$periodo=$_SESSION["periodoseleccionar"];
$jefes=$_SESSION["jefes"];
$observacion=$observacionsaldo;
$nombre= $_SESSION['logeo'];
$arraydatos=$_SESSION['codidoEmpleado'];
if($_SESSION['codidoEmpleado']=='' || $_SESSION["periodoseleccionar"]==''){
  header('Location: index.php');
}









//$datos=mostrardatosTrab($mes);
//$num=count($datos);
class PDF extends PDF_WriteTag
{
function Header()
{

  setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
    // Logo
    $this->Image("images/logo.png",65,5,75,0,"","../index.php?page=home");
  
    // Arial bold 15
      $this->Ln(30);
     $this->SetFont('Arial','B',11);
     $this->Cell(185,0,'INFORME DE VACACIONES',0,0,'C');
     $this->Ln(7);
     $this->Cell(187,0,'DEPARTAMENTO DE PERSONAL',0,0,'C');
     
    
    //$this->SetTextColor(194,8,8);
    //$this->Cell(45,0,'Prueba',0,0,'C');
    // Move to the right
     $this->SetFont('Times','B',14);
     $this->SetTextColor(0,0,0);
    $this->Ln(30);
   // $this->Cell(72);
    // Title

    //$this->Cell(45,0,'CONSTANCIA',0,0,'C');
    // Line break
    //$this->Ln(20);
}

// Page footer
function Footer()
{
    

  $this->SetFont('Arial','',8);
  
  $this->SetY(-10);
  $this->Cell(0,10,'Pagina '.$this->PageNo().' de {nb}',0,0,'C');

}

function TablaBasica($header,$array)
   {
    //Cabecera
    foreach($header as $col)
    // $this->Cell(40,7,$col,1);
    $contrato="Sin fecha Acuerdo";
    if(strtotime($col['dcntrct'])==''){
      $contrato="Sin fecha Acuerdo";
    }
    if(strtotime($col['dhire'])==strtotime($col['dcntrct'])){
      //$contrato= date('d',strtotime($col['dcntrct']))." de ".GetMes(date('m',strtotime($col['dcntrct'])))." del ".date('Y',strtotime($col['dcntrct']));
      $contrato=date('d/m/Y',strtotime($col['dcntrct']));
    }else if(strtotime($col['dhire'])< strtotime($col['dcntrct'])){
      //$contrato= date('d',strtotime($col['dcntrct']))." de ".GetMes(date('m',strtotime($col['dcntrct'])))." del ".date('Y',strtotime($col['dcntrct']));
      $contrato=date('d/m/Y',strtotime($col['dcntrct']));
    }
    $this->Ln();
   
      $this->Cell(65,12,"CODIGO",0);
      $this->Cell(65,12,$col['cempno'],0);
     
      $this->Ln();
      $this->Cell(65,12,"NOMBRE ",0);
      $this->Cell(65,12,utf8_decode(trim($col['cfname']))."\t".utf8_decode(trim($col['clname'])) ,0);
      $this->Ln();
      $this->Cell(65,12,"IDENTIDAD ",0);
      $this->Cell(65,12,trim($col['cfedid']),0);
      $this->Ln();
      $this->Cell(65,12,"ACUERDO ",0);
      $this->Cell(65,12,$contrato,0);
      $this->Ln();
      $this->Cell(65,12,"CARGO ",0);
      $this->Cell(65,12,utf8_decode($col['Cargo']),0);
      $this->Ln();
      $this->Cell(65,12,"DEPENDENCIA ",0);
      $this->Cell(65,12,utf8_decode($col['Departamento']),0);
      foreach ($array as $key => $value) {
        $this->Ln();
      $this->Cell(65,12,$value['cPeriodo'],0);
      $this->Cell(65,12,strtoupper($value['letras']),0);
    
      }
     
       
      
     
      $this->Ln();
   }
  function Tabla()
   {
    $mensaje='Tegucigalpa M.D.C'.' '.date('d').' '.'dias del mes de'.' '.date('M').' '.'del'.' '.date('Y');
    $this->Cell(65,12,"LUGAR Y FECHA:",0);
    $this->SetFont('Arial','I',11);
    
    $this->Cell(65, 12, $mensaje, 0, 1, 'R', false);
    $this->SetFont('Arial','B',9);
   }

}

// Instanciation of inherited class


$pdf=new PDF();
$pdf->AddPage();

//marca de agua


$pdf->SetAlpha(0.2);


 $pdf->Image('img/9.png',0,85,225);

 $pdf->SetAlpha(1);

$pdf->SetFont('Arial','',13);
$pdf->SetLeftMargin(18); #Establecemos los márgenes izquierda: 
$pdf->SetRightMargin(18); #Establecemos los márgenes Derecha: 
$pdf->AliasNbPages();





// Stylesheet
$pdf->SetStyle("p","Arial","I",10,"0,0,0",0);
$pdf->SetStyle("h1","arial","B",11,"0,0,0",0);
$pdf->SetStyle("a","arial","BU",13,"0,0,0");
$pdf->SetStyle("pers","arial","I",0,"0,0,0");
$pdf->SetStyle("place","arial","U",0,"0,0,0");
$pdf->SetStyle("vb","arial","B",11,"0,0,0");


$pdf->SetFont('Arial','B',10);
//$header=array('Columna 1','Columna 2','Columna 3','Columna 4');
$pdf->AliasNbPages();
//Primera página

$pdf->SetY(65);
//$pdf->AddPage()\

$array=Mostrardias($periodoseleccionar,$identidad);


$pdf->TablaBasica($arraydatos,$array);
/*$pdf->Cell(45, 10, 'NOMBRE DEL EMPLEADO ', 0, 1, 'L', false); 
      $pdf->Cell(45, 10, 'IDENTIDAD', 0, 1, 'L', false);
      $pdf->Cell(15, 10, 'CARGO', 0 ,1, 'L', false);
      $pdf->Cell(30, 10, 'ACUERDO', 0, 1, 'L', false);
      $pdf->Cell(45, 10, 'LOCALIZACION', 0, 1, 'L', false);
      $pdf->Cell(45, 10, utf8_decode('AÑO'), 0, 1, 'L', false); */
      $pdf->Cell(45, 10, 'OBSERVACIONES:', 0, 1, 'L', false);

      
      $pdf->SetFont('Arial','I',12);
      foreach($arrayObservaciones as $obs){
       
            $pdf->MultiCell(175,5,'* '. utf8_decode($obs) ,0,'J',false);
            $pdf->Ln(5);
            
        
       
      }

      $pdf->SetFont('Arial','B',10);

     
      $pdf->Ln(5);
      $pdf->Tabla();
 
      $pdf->Ln(25);
   
      
    
   

      $pdf->Ln();
      $pdf->Cell(85,10,"_______________________________________",0,0,'C',0);
      $pdf->Cell(85,10,"______________________________________ ",0,0,'C',0);
      
      $pdf->Ln();
      $pdf->Cell(85,5,utf8_decode($nombre),0,0,'C',0);
      $pdf->Cell(85,5,utf8_decode($jefes),0,0,'C',0);
      $pdf->Ln();
      $pdf->Cell(85,5,"ELABORADO POR",0,0,'C',0);
      $pdf->Cell(85,5,"JEFE DE SECCION DE TRAMITE",0,0,'C',0);









$pdf->Output();
 }

?>