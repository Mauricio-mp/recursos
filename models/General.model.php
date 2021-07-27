<?php
    require_once("libs/dao.php");
   

    function GetDepartamentos(){
        ConexionSQLserverVAM();
        ini_set('memory_limit', '-1');
        $sql=mssql_query("SELECT * FROM dbo.prdept order by cdeptname ASC");
        while($row=mssql_fetch_array($sql)){
            $row['cdeptname']=utf8_encode($row['cdeptname']);
          

            $arr[]=$row;
        }

        return $arr;
     
    }

    function GetPuestos(){
        ConexionSQLserverVAM();
        ini_set('memory_limit', '-1');
        $sql=mssql_query("SELECT * FROM dbo.HRJobs ORDER BY cDesc ASC");
        while($row=mssql_fetch_array($sql)){
            $row['cDesc']=utf8_encode($row['cDesc']);
          

            $arr[]=$row;
        }

        return $arr;
    }
function Getgeneral($codigo,$nombre,$FechaInicialContrato,$FechaFinalContrato,$FechaInicialAcuerdo,$FechaFinalAcuerdo,$CbxDepartamento,$puesto,$estado,$region,$myCheck,$SueldoInicial,$SueldoFinal){
    ConexionSQLserverVAM();
    if($myCheck=='on'){
        $msgrango="AND nmonthpay BETWEEN ".'\''.$SueldoInicial.'\''."\t AND ".'\''.$SueldoFinal.'\''."";
    
    }
   
if($CbxDepartamento){
    $msgDepto="AND a.cdeptno =".'\''.$CbxDepartamento.'\'';
}
if($puesto){
    $msgpuesto="\t AND a.cjobtitle =".'\''.$puesto.'\'';
}
if($estado){
    $msgestado="AND a.cstatus =".'\''.$estado.'\''."\t";
}

if($region){
    $msgregion="AND a.ctaxstate =".'\''.$region.'\''."\t";
}
if($nombre){
    $msgnombre="AND a.cempno =".'\''.$nombre.'\''."\t";
}
if($codigo){
    $msgnombre="AND a.cempno =".'\''.$codigo.'\''."\t";
}
if($FechaInicialContrato){
    $anio=date('Y',strtotime($FechaInicialContrato));
    $mes=date('m',strtotime($FechaInicialContrato));
    $dia=date('d',strtotime($FechaInicialContrato));
    $msgnContrato="AND year(a.dhire)=".'\''.$anio.'\''."\t AND month(a.dhire)=".'\''.$mes.'\''."\t AND day(a.dhire)='$dia'";
}
if($FechaInicialAcuerdo){
    $anioAcuerdo=date('Y',strtotime($FechaInicialAcuerdo));
    $mesAcuerdo=date('m',strtotime($FechaInicialAcuerdo));
    $diaAcuerdo=date('d',strtotime($FechaInicialAcuerdo));
    $msgnAcuerdo="AND year(a.dcntrct)=".'\''.$anioAcuerdo.'\''."\t AND month(a.dcntrct)=".'\''.$mesAcuerdo.'\''."\t AND day(a.dcntrct)='$diaAcuerdo'";
}

$var=$msgDepto.$msgpuesto.$msgestado.$msgregion.$msgnombre.$msgnContrato.$msgnAcuerdo.$msgrango;

$sql=mssql_query("SELECT a.cempno,d.cwageacc,a.caddr1,a.caddr2,a.csex,a.cplnid,a.dcntrct,a.dhire,a.dbirth,a.nmonthpay,a.cfedid,a.ctaxstate, a.cempno, a.clname,a.cfname,a.cstatus,a.cfedid,a.nmonthpay,b.cdeptname,c.cDesc FROM dbo.prempg d,dbo.prempy a, dbo.prdept b,dbo.HRJobs c WHERE d.cempno=a.cempno and a.cdeptno =b.cdeptno and a.cjobtitle =c.cJobTitlNO and a.cjobtitle =c.cJobTitlNO $var ORDER BY a.cempno");

while($row=mssql_fetch_array($sql)){

  
    $row['num']=$cont++;
    $row['Nombre']=utf8_encode(trim($row['cfname']))."\t\t".utf8_encode(trim($row['clname']));
    $row['nmonthpay']=number_format($row['nmonthpay'],2);
    $row['cdeptname']=utf8_encode($row['cdeptname']);

    $row['dhire']=date('d/m/Y',strtotime($row['dhire']));
    $row['dcntrct']=date('d/m/Y',strtotime($row['dcntrct']));

//$row['cDesc']=utf8_decode($row['cDesc']);
    if($row['dbirth']==''){
        
        $row['dbirth']='Desconocido';
    }else{
        $row['dbirth']=date('d/m/Y',strtotime($row['dbirth']));
    }
    
    $puesto=$row['cjobtitle'];
    $consultarpuesto=mssql_query("SELECT * FROM hrjobs WHERE cJobTitlNO='$puesto'");
    if($fila=mssql_fetch_array($consultarpuesto)){
        $puesto=utf8_decode($fila['cDesc']);
        $row['puesto']=utf8_encode($puesto);
    }
    $arr[]=$row;
}

return $arr;
   
     
        
}
function GetLIstaEmpleados(){
    ConexionSQLserverVAM();

    $sql=mssql_query("SELECT cempno,cfname,clname FROM prempy");
    while($row=mssql_fetch_array($sql)){
$nombre=utf8_decode($row['cfname']);
$apellido=utf8_decode($row['clname']);
$row['cfname']=utf8_encode($nombre);
$row['clname']=utf8_encode($apellido);

$row['nombre']=$row['cfname']."\t".$row['clname'];



   
        $arr[]=$row;
        


    }

    return $arr;
}
    function Nombre($CondEmpleado){
        ConexionSQLserverVAM();
        $cont=1;
        $sql=mssql_query("SELECT * FROM prempy WHERE cempno ='$CondEmpleado'");
        while($row=mssql_fetch_array($sql)){

            $row['num']=$cont++;
            $row['Nombre']=utf8_encode($row['cfname']).utf8_encode($row['clname']);
            $row['nmonthpay']=number_format($row['nmonthpay'],2);
            $puesto=$row['cjobtitle'];
            $consultarpuesto=mssql_query("SELECT * FROM hrjobs WHERE cJobTitlNO='$puesto'");
            if($fila=mssql_fetch_array($consultarpuesto)){
                $row['puesto']=utf8_encode($fila['cDesc']);
            }
            $arr[]=$row;
            


        }

        return $arr;

    }
    function Codigo($codigo){
        ConexionSQLserverVAM();
        $cont=1;
        $sql=mssql_query("SELECT * FROM prempy WHERE cempno ='$codigo'");
        while($row=mssql_fetch_array($sql)){

            $row['num']=$cont++;
            $row['Nombre']=utf8_encode($row['cfname']).utf8_encode($row['clname']);
            $row['nmonthpay']=number_format($row['nmonthpay'],2);
            $puesto=$row['cjobtitle'];
            $consultarpuesto=mssql_query("SELECT * FROM hrjobs WHERE cJobTitlNO='$puesto'");
            if($fila=mssql_fetch_array($consultarpuesto)){
                $row['puesto']=utf8_encode($fila['cDesc']);
            }
            $arr[]=$row;
            


        }

        return $arr;
    }

    function empleado($codigo){
        
        ConexionSQLserverVAM();
     
        $sql=mssql_query("SELECT * FROM prempy WHERE cempno ='$codigo'");
        if($row=mssql_fetch_array($sql)){
            $arr[]=$row;
        }

        return $arr;
     
    }
    function antiguedad($cod){
        ConexionSQLserverVAM();

        $sql=mssql_query("SELECT dcntrct FROM prempy WHERE cempno ='$cod'");
        $fila=mssql_fetch_array($sql);
        $fechaINgreso=date('Y',strtotime($fila['dcntrct']));

        $date=date('Y');
       
        $opteneranio=$date-$fechaINgreso;
        
       if($opteneranio >=15){
           $opteneranio="15";
       }
    
        return $opteneranio;
    }
    function DatosEmpleado($codigo){
        ConexionSQLserverVAM();
        $cont=1;
        $sql=mssql_query("SELECT * FROM prempy WHERE cempno ='$codigo'");
        if($row=mssql_fetch_array($sql)){
            
            $row['num']=$cont++;
            $arr['Nombre']=utf8_encode(trim($row['cfname'])).utf8_encode(trim($row['clname']));
            $arr['Nombre_EMpleado']=utf8_encode(trim($row['cfname']));
            $arr['Apellido_EMpleado']=utf8_encode(trim($row['clname']));
            $row['nmonthpay']=number_format($row['nmonthpay'],2);
            $arr['fechainicio']=date('Y-m-d',strtotime($row['dcntrct']));
            $puesto=trim($row['cjobtitle']);
            $arr['puesto']=trim($row['cjobtitle']);
            $consultarpuesto=mssql_query("SELECT * FROM hrjobs WHERE cJobTitlNO='$puesto'");
            if($fila=mssql_fetch_array($consultarpuesto)){
                $arr['puesto']=utf8_encode($fila['cDesc']);
            }
            
            


        }

        return $arr;
    }
    

    function calculo($codigoEmpleado){
        ConexionSQLserverVAM();
       #optener ultima planilla
        $fechaActual=date('Y-m');
        $anio=date('Y');
        
        $getPlanillaActual=mssql_query("SELECT DISTINCT cpayno FROM prmisc WHERE CONVERT(VARCHAR(25), dcheck, 126) LIKE '%$fechaActual%' and cpayno like '%/$anio%'");
        if(mssql_num_rows($getPlanillaActual)>0){
            $filas=mssql_fetch_array($getPlanillaActual);
            $planilla=$filas['cpayno'];
            $fechaPlanilla=$fechaActual;
            
           
        }else{
            $mesAnterior=date("Y-m",strtotime($fechaActual."- 1 month"));
            $aniomesAnterior=date('Y',strtotime($mesAnterior));
            $getPlanillaAnterior=mssql_query("SELECT DISTINCT cpayno FROM prmisc WHERE CONVERT(VARCHAR(25), dcheck, 126) LIKE '%$mesAnterior%' and cpayno like '%/$aniomesAnterior%'");
            $row=mssql_fetch_array($getPlanillaAnterior);
            $planilla= $row['cpayno'];

            $fechaPlanilla=$mesAnterior;
        
        }
    
       $arr['planilla']= $planilla;
        
        $arr['fechaPlanilla']= $fechaPlanilla;
   



       #optener sueldo de ultima planilla
        
        $getSueldoActual=mssql_query("SELECT nothtax FROM prmisc WHERE cpayno='$planilla' and cempno='$codigoEmpleado' and cpaycode='100'");
        $filaSueldo=mssql_fetch_array($getSueldoActual);
        $arr['Ultimosueldo']= $filaSueldo['nothtax'];

        #optener planilla de 6 meses 
        $fecha6meses= date("Y-m",strtotime($fechaPlanilla."- 6 month"));
        $anio6mese=date('Y',strtotime($fecha6meses));

        $getPlanilla6mese=mssql_query("SELECT DISTINCT cpayno FROM prmisc WHERE CONVERT(VARCHAR(25), dcheck, 126) LIKE '%$fecha6meses%' and cpayno like '%/$anio6mese%'");
        $fila6emese=mssql_fetch_array($getPlanilla6mese);
        $Planilla6meses=$fila6emese['cpayno'];
        $arr['Planialla6mese']= $Planilla6meses;
        #optener sueldo de 6 planillas
        $getSueldo6planillas=mssql_query("SELECT nothtax FROM prmisc WHERE cpayno='$Planilla6meses' and cempno='$codigoEmpleado' and cpaycode='100'");
        $fila6planilla=mssql_fetch_array($getSueldo6planillas);
        $arr['sueldo6meses']=$fila6planilla['nothtax'];

        if($arr['sueldo6meses']){
            $sueldo6mese=$arr['sueldo6meses'];
            $sueldoultimomes=$arr['Ultimosueldo'];


            $cal1=$sueldoultimomes*6;
            $cal2=$sueldo6mese*0;

            $sum=$cal1+$cal2;
            #sueldomensual
            $sueldoMensual=$sum/6;

            $doceSueldosAlAnio=$sueldoMensual/12;

            $sueldoPrmAnual=$doceSueldosAlAnio*15;
            $totalPromAnual=$sueldoPrmAnual*0.5;


            #cesantia
            $subtotal=$sueldoPrmAnual*antiguedad($codigoEmpleado);
            $TotalSubtotal=$subtotal*0.5;


            $sueldoProm6meses=$sueldoPrmAnual;
            if (antiguedad($codigoEmpleado)==1) {
                $sueldoPrmAnual=$subtotal*0.5;

            }
            

            $arr['preaviso']=number_format($sueldoPrmAnual,2);
            $arr['cesantia']=number_format($TotalSubtotal,2);
            $Total=$sueldoPrmAnual+$TotalSubtotal;

            $arr['Total']=number_format($Total,2);

            $arr['dif']=antiguedad($codigoEmpleado);

            $arr['ultimo']= date("Y-m-t", strtotime("m")); 
            $arr['planilla']=$planilla;
            $arr['SueldoProm6mese']=number_format($sueldoProm6meses,2);
            
            





            





        }





        
       


        return $arr;
    }

    function InsertReporte($codigoEmpleado,$codigousuariologeado){

        
        $datos=DatosEmpleado($codigoEmpleado);
        ConexionSQLserver();
        $nombre=$datos['Nombre_EMpleado'];
        $apellido=$datos['Apellido_EMpleado'];
        $sql=mssql_query("INSERT INTO Reporte_Generado(Codigo_Empleado,Apellido_Empleado,Nombre_Empleado,UsuarioCreacion,FechaCreacion,Id_Catalogo) VALUES('$codigoEmpleado','$nombre','$apellido','$codigousuariologeado',GETDATE(),1)");
        if($sql==true){
            return 0;
        }else{
            return 1;
        }
        

    }
    




  
?>
