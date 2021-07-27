<?php
require_once("libs/dao.php");
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
//require "Classes/PHPExcel.php";

function GetHoja2($chk,$mes,$sueldo){
    ConexionSQLserverVAM();
    if($chk=='on'){
        $sql=mssql_query("SELECT a.nmonthpay, b.ctrsno,a.cempno,a.cplnid,b.cdedcode,b.tmodrec,b.cdesc,a.clname,a.cfname,b.ndedamt FROM prempy a,prmisd b WHERE a.cempno =b.cempno and b.cpayno IN('$mes') and b.cdedcode IN('ISR_EQUIDA') and b.nmonthpay >'$sueldo' order by b.cempno ASC");
    }else{
        $sql=mssql_query("SELECT a.nmonthpay, b.ctrsno,a.cempno,a.cplnid,b.cdedcode,b.tmodrec,b.cdesc,a.clname,a.cfname,b.ndedamt FROM prempy a,prmisd b WHERE a.cempno =b.cempno and b.cpayno IN('$mes') and b.cdedcode IN('ISR_EQUIDA') order by b.cempno ASC");
       
    }

    while($fila=mssql_fetch_array($sql)){

     
           $fila['nombre']=utf8_encode(trim($fila['cfname'])) ." ". utf8_encode(trim($fila['clname']));
           $fila['tmodrec']=date('d/m/Y',strtotime($fila['tmodrec']));
           $datos[]=$fila;
   
         }
       
          return $datos;
}
function GetHoja5($chk,$mes,$sueldo){
    ConexionSQLserverVAM();
    if($chk=='on'){
        $sql=mssql_query("SELECT a.nmonthpay, b.ctrsno, a.cempno, a.cplnid,b.cdedcode,b.tmodrec,b.cdesc,a.clname,a.cfname,b.ndedamt FROM prempy a,prmisd b WHERE a.cempno =b.cempno and b.cpayno IN('$mes') and b.cdedcode IN('43','965','965-113','965-120','965-121','967','967-113','967-120','967-121','971','971-113','971-116','971-120','971-121','972','975','975-113','976','976-113','978','978-113','979','979-113','979-121') and a.nmonthpay>'$sueldo' order by b.cempno ASC");
    }else{
        $sql=mssql_query("SELECT a.nmonthpay, b.ctrsno, a.cempno, a.cplnid,b.cdedcode,b.tmodrec,b.cdesc,a.clname,a.cfname,b.ndedamt FROM prempy a,prmisd b WHERE a.cempno =b.cempno and b.cpayno IN('$mes') and b.cdedcode IN('43','965','965-113','965-120','965-121','967','967-113','967-120','967-121','971','971-113','971-116','971-120','971-121','972','975','975-113','976','976-113','978','978-113','979','979-113','979-121') order by b.cempno ASC");
       
    }

    while($fila=mssql_fetch_array($sql)){

     
           $fila['nombre']=utf8_encode(trim($fila['cfname'])) ." ". utf8_encode(trim($fila['clname']));
           $fila['tmodrec']=date('d/m/Y',strtotime($fila['tmodrec']));
           $datos[]=$fila;
   
         }
       
          return $datos;
}
function GetHoja4($chk,$mes,$sueldo){
    ConexionSQLserverVAM();
    if($chk=='on'){
        $sql=mssql_query("SELECT a.nmonthpay, b.ctrsno, a.cempno, a.cplnid,b.cdedcode,b.tmodrec,b.cdesc,a.clname,a.cfname,b.ndedamt FROM prempy a,prmisd b WHERE a.cempno =b.cempno and b.cpayno IN('$mes') and b.cdedcode IN('458','458-113','458-116','458-120','458-121','458-219' ,'431','431-113','996','996-113','996-116','996-120','996-121')and a.nmonthpay>'$sueldo' order by b.cempno ASC");
    }else{
        $sql=mssql_query("SELECT a.nmonthpay, b.ctrsno, a.cempno, a.cplnid,b.cdedcode,b.tmodrec,b.cdesc,a.clname,a.cfname,b.ndedamt FROM prempy a,prmisd b WHERE a.cempno =b.cempno and b.cpayno IN('$mes') and b.cdedcode IN('458','458-113','458-116','458-120','458-121','458-219' ,'431','431-113','996','996-113','996-116','996-120','996-121') order by b.cempno ASC");
       
    }

    while($fila=mssql_fetch_array($sql)){

     
           $fila['nombre']=utf8_encode(trim($fila['cfname'])) ." ". utf8_encode(trim($fila['clname']));
           $fila['tmodrec']=date('d/m/Y',strtotime($fila['tmodrec']));
           $datos[]=$fila;
   
         }
       
          return $datos;

}
function GetHoja6($chk,$mes,$sueldo){
    ConexionSQLserverVAM();
    if($chk=='on'){
        $sql=mssql_query("SELECT b.dtrs,a.cempno,a.cfname,a.clname,b.cpaycode,b.cref,b.nothntax,b.ctrsno,b.cchkno,a.nmonthpay, a.cplnid FROM dbo.prmisc b, dbo.prempy a WHERE a.cempno = b.cempno and b.cpayno ='$mes' AND B.cpaycode in('IHSS','INJUPEMP') and a.nmonthpay >'$sueldo' order by b.cempno ASC");
    }else{
        $sql=mssql_query("SELECT b.dtrs,a.cempno,a.cfname,a.clname,b.cpaycode,b.cref,b.nothntax,b.ctrsno,b.cchkno,a.nmonthpay, a.cplnid FROM dbo.prmisc b, dbo.prempy a WHERE a.cempno = b.cempno and b.cpayno ='$mes' AND B.cpaycode in('IHSS','INJUPEMP') order by b.cempno ASC");
       
    }

    while($fila=mssql_fetch_array($sql)){

     
           $fila['nombre']=utf8_encode(trim($fila['cfname'])) ." ". utf8_encode(trim($fila['clname']));
           $fila['dtrs']=date('d/m/Y',strtotime($fila['dtrs']));
           $datos[]=$fila;
   
         }
       
          return $datos;
}
function GetHoja3($chk,$mes,$sueldo){
    ConexionSQLserverVAM();
    if($chk=='on'){
        $sql=mssql_query("SELECT b.dtrs,a.cempno,a.cfname,a.clname,b.cpaycode,b.cref,b.nothntax,b.ctrsno,b.cchkno,a.nmonthpay, a.cplnid FROM dbo.prmisc b, dbo.prempy a WHERE a.cempno = b.cempno and b.cpayno ='$mes' AND B.cpaycode in('200','103','103-113','103-116','103-120','103-121','280') and a.nmonthpay >'$sueldo' order by b.cempno ASC");
    }else{
        $sql=mssql_query("SELECT b.dtrs,a.cempno,a.cfname,a.clname,b.cpaycode,b.cref,b.nothntax,b.ctrsno,b.cchkno,a.nmonthpay, a.cplnid FROM dbo.prmisc b, dbo.prempy a WHERE a.cempno = b.cempno and b.cpayno ='$mes' AND B.cpaycode in('200','103','103-113','103-116','103-120','103-121','280') order by b.cempno ASC");
       
    }

    while($fila=mssql_fetch_array($sql)){

     
           $fila['nombre']=utf8_encode(trim($fila['cfname'])) ." ". utf8_encode(trim($fila['clname']));
           $fila['dtrs']=date('d/m/Y',strtotime($fila['dtrs']));
           $datos[]=$fila;
   
         }
       
          return $datos;
}
function GetHoja1($chk,$mes,$sueldo){

    ConexionSQLserverVAM();
    if($chk=='on'){
        $sql=mssql_query("SELECT b.nothntax,b.lsystem, b.cempno,b.clname,b.cfname, a.cplnid,b.cref, b.ctrsno,b.cchkno,b.dtrs,b.nothtax,b.cpaycode FROM prempy a , dbo.prmisc b WHERE a.cempno =b.cempno and cpayno IN ('$mes') AND b.cpaycode IN ('100','102-120','102-121','104-116','104-120','102-219','719','102-113','102-116','104','101','102') and b.nothtax > '$sueldo' order by b.cempno DESC");
    }else{
        $sql=mssql_query("SELECT b.nothntax,b.lsystem,b.cempno,b.clname,b.cfname, a.cplnid,b.cref, b.ctrsno,b.cchkno,b.dtrs,b.nothtax,b.cpaycode FROM prempy a , dbo.prmisc b WHERE a.cempno =b.cempno and cpayno IN ('$mes') AND b.cpaycode IN ('100','102-120','102-121','104-116','104-120','102-219','719','102-113','102-116','104','101','102') order by b.cempno DESC");
       
    }

    while($fila=mssql_fetch_array($sql)){

     

     if($fila['nothtax']==0){
         $fila['monto']= $fila['nothntax'];
     }else{
        $fila['monto']= $fila['nothtax'];
     }
        $fila['nombre']=utf8_encode(trim($fila['cfname']))." ".utf8_encode(trim($fila['clname']));
        $fila['dtrs']=date('d/m/Y',strtotime($fila['dtrs']));
        $datos[]=$fila;

      }
    
       return $datos;
    

}

function optenermes(){
    ConexionSQLserverVAM();
    $sql=mssql_query("SELECT DISTINCT cpayno FROM prmisd");
    while($fila=mssql_fetch_array($sql)){
      $datos[]=$fila;
    }
  
     return $datos;
   }

   function accionExcel(){
    
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
        $fechaActual=date('Y-m-d');
    $fecha1=date('Y',strtotime($fechaActual));
    $fecha2=date('Y',strtotime($fechaActual."-1 year"));

    for ($i=$fecha1; $i >1993 ; $i--) { 
        $Siguienteanio=$i+1;
        $per['periodo']=$i."-".$Siguienteanio;
        $arr[]=$per;
    }
    
    //$arr[]=$fecha1."-".$fecha3;


    return $arr;

 }


 function optenerEmpleado($opcion,$valor){
   
 }

 function optener_motivo(){
 }

?>