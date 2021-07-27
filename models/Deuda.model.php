<?php
    require_once("libs/dao.php");
   

    function Listar(){
        ConexionSQLserverVAM();
        ini_set('memory_limit', '-1');
        $sql=mssql_query("SELECT * FROM mpsiafi.dbo.prempy WHERE cstatus='A'");
        while($row=mssql_fetch_array($sql)){
            $row['cfname']=utf8_encode($row['cfname']);
            $row['clname']=utf8_encode($row['clname']);

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
        $mes=date('m');
        
        $getPlanillaActual=mssql_query("SELECT DISTINCT cpayno FROM prmisc WHERE year(dcheck)='$anio' and month(dcheck)='$mes' and cpayno like '%/$anio%'");
        if(mssql_num_rows($getPlanillaActual)>0){
            $filas=mssql_fetch_array($getPlanillaActual);
            $planilla=$filas['cpayno'];
            $fechaPlanilla=$fechaActual;
            
           
        }else{
            $mesAnterior=date("Y-m",strtotime($fechaActual."- 1 month"));
            $mes2=date("m",strtotime($mesAnterior));
            $aniomesAnterior=date('Y',strtotime($mesAnterior));
            $getPlanillaAnterior=mssql_query("SELECT DISTINCT cpayno FROM prmisc WHERE year(dcheck)='$aniomesAnterior' and month(dcheck)='$-mes2' and cpayno like '%/$aniomesAnterior%'");
            $row=mssql_fetch_array($getPlanillaAnterior);
            $planilla= $row['cpayno'];

            $fechaPlanilla=$mesAnterior;
        
        }
          $planilla= 'ABRIL/2021';
        $fechaPlanilla='2021-04';
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
