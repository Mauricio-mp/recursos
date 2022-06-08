<?php 

 require_once("libs/dao.php");
 require_once("models/ejemplo.model.php");
 function optenermes($fecha){
  ConexionSQLserverVAM();
  $sql=mssql_query("SELECT DISTINCT cpayno FROM prmisd");
  while($fila=mssql_fetch_array($sql)){
    $datos[]=$fila;
  }

   return $datos;
 }
 function optenerDeducciones(){

    $array['Descripcion']=["Cofinter","Seguros Atlantida"];

    return $array;
 }
 function meseDetalle($mes){
  switch ($mes) {
    case '1':
      return 'ENERO';
      break;
      case '2':
       return 'FEBRERO';
       break;
       case '3':
         return 'MARZO';
         break;
         case '4':
           return 'ABRIL';
           break;
           case '5':
             return 'MAYO';
             break;
             case '6':
               return 'JUNIO';
               break;
               case '7':
                 return 'JULIO';
                 case '8':
                   return 'AGOSTO';
                   case '9':
                 return 'SEPTIEMBRE';
                 case '10':
                   return 'OCTUBRE';
                   case '11':
                     return 'NOVIEMBRE';
                     case '12':
                       return 'DICIEMBRE';
                 break;
                 

    default:
      # code...
      break;
  }
  return 'as';
}
 function optenerfechas(){
  ConexionSQLserverVAM();
  $comienzo = new DateTime('19-03-2008');
  $final = new DateTime();
  $intervalo = new DateInterval('P2M');
  $final->add($intervalo);
  
  for($i = $comienzo; $i <= $final; $i->modify('+1 month')){
      $fecha= $i->format("Y-m-d");
      //$dias= $i->format("Y-m-d H:i:sP") . "\n";
      $dias= $i->format("Y");
      $mes= meseDetalle($i->format("m"))."/".$dias;
      $opcion=$i->format("Y-m-d");

      $array=array("mese"=>$mes,"opcion"=>$opcion);
      //$row['opcion']=$opcion;
      $row[]=$array;
      }
return $row;
 }

 function imprimpir($myString,$nomina){
  return 0;
 }
 function mostrardatos($mes,$nomina,$opcion,$opcionMes,$IngresoPlanilla){
  for ($i=0; $i <count($nomina) ; $i++) {
        
    $cost .= '\''.$nomina[$i].'\''. ',';
    
  }

  $myString = substr($cost, 0, -1);
  ConexionSQLserverVAM();
  $anio=date('Y',strtotime($opcionMes));
  $meses=date('m',strtotime($opcionMes));

  if($IngresoPlanilla==''){
    if($opcion==0){
    
      $sql=mssql_query("SELECT b.cstatus, a.cempno,b.clname, b.cfname,b.ctaxstate, cdeptno,a.cpayno,cfedid, a.cdedcode, a.cdesc, a.ndedamt,cplnid, a.tmodrec
      from prmisd a, prempy b where a.cempno=b.cempno  and YEAR(tmodrec)='$anio' and MONTH(tmodrec)='$meses'  and a.cdedcode IN($myString) and b.cstatus IN('A') order by a.tmodrec");
      }else{
        $sql=mssql_query("SELECT  b.cstatus,a.cempno,b.clname, b.cfname,b.ctaxstate, cdeptno,a.cpayno,cfedid, a.cdedcode, a.cdesc, a.ndedamt,cplnid, a.tmodrec
      from prmisd a, prempy b where a.cempno=b.cempno and cpayno='$mes' and a.cdedcode IN($myString) and b.cstatus IN('A') order by a.tmodrec");
      }
  }else{
    

    if($opcion==0){
    
      $sql=mssql_query("SELECT b.cstatus, a.cempno,b.clname, b.cfname,b.ctaxstate, cdeptno,a.cpayno,cfedid, a.cdedcode, a.cdesc, a.ndedamt,cplnid, a.tmodrec
      from prmisd a, prempy b where a.cempno=b.cempno  and YEAR(tmodrec)='$anio' and MONTH(tmodrec)='$meses' and cplnid='$IngresoPlanilla' and a.cdedcode IN($myString) and b.cstatus IN('A') order by a.tmodrec");
      }else{
        $sql=mssql_query("SELECT  b.cstatus,a.cempno,b.clname, b.cfname,b.ctaxstate, cdeptno,a.cpayno,cfedid, a.cdedcode, a.cdesc, a.ndedamt,cplnid, a.tmodrec
      from prmisd a, prempy b where a.cempno=b.cempno and cpayno='$mes' and cplnid='$IngresoPlanilla' and a.cdedcode IN($myString) and b.cstatus IN('A') order by a.tmodrec");
      }
  }
 
  
    while($var=mssql_fetch_array($sql)){
      $var['mes']=$mes;
      $var['nombre']=utf8_decode(trim($var['cfname']))." ".utf8_decode(trim($var['clname']));
      $var['tmodrec']=date('d/m/Y',strtotime($var['tmodrec']));
    
      //$var['ndedamt']=number_format($var['ndedamt'],2);
      $datos[]=$var;
  } 
  return $datos;

 }
 function exportProductDatabase($mes,$nomina,$opcion,$opcionMes,$IngresoPlanilla,$Tipoplanilla) {
  ConexionSQLserverVAM();
  $timestamp = time();
  $filename = 'Export_' . $timestamp . '.xls';
  
  header("Content-Type: application/vnd.ms-excel");
  header("Content-Disposition: attachment; filename=\"$filename\"");
  
  $isPrintHeader = false;
  $cont=mostrardatos($mes,$nomina,$opcion,$opcionMes,$IngresoPlanilla);

for($i=0;$i<count($cont);$i++){
  $suma=$cont[$i]['ndedamt']+$suma;
  // echo "Nombre\t Codigo Empleado\t Deduccion\t Monto\t Planilla\n ";
  if($i==0){
    echo "Nombre \t Codigo empleado \t Identidad\t Descripcion \t Fecha Procesada \t Monto \t Planilla\t Codigo\t Estado\n";
  }
  $cont[$i]['tmodrec']=str_replace("/", "-", $cont[$i]['tmodrec']);
  //$cont[$i]['ndedamt'] = str_replace(".", ",", $cont[$i]['ndedamt']);
  echo $cont[$i]['nombre']."\t".$cont[$i]['cempno']."\t".$cont[$i]['cfedid']."\t".$cont[$i]['cdesc']."\t". $cont[$i]['tmodrec']."\t".$cont[$i]['ndedamt']."\t".$cont[$i]['cplnid']."\t".$cont[$i]['cdedcode']."\t".$cont[$i]['ctaxstate']."\n";
}

echo "suma:".$suma;



  exit();


}
function Getdeducciones(){
  ConexionSQLserverVAM();
  
  $sql=mssql_query("SELECT DISTINCT cdedcode,cdescript FROM prdedu");
    while($var=mssql_fetch_array($sql)){
      
      $datos[]=$var;
  } 
  return $datos;
}
function GetDatos($myString,$nomina,$opcion,$TipoMes,$IngresoPlanilla){
  ConexionSQLserverVAM();
  $cont=1;
  $sum=0;
  $anio=date('Y',strtotime($TipoMes));
  $mes=date('m',strtotime($TipoMes));

  if($IngresoPlanilla==''){
    if($opcion==0){
    
      $sql=mssql_query("SELECT  b.cstatus,a.cempno,b.clname, b.cfname,b.ctaxstate, cdeptno,a.cpayno,cfedid, a.cdedcode, a.cdesc, a.ndedamt,cplnid, a.tmodrec
      from prmisd a, prempy b where a.cempno=b.cempno and YEAR(tmodrec)='$anio' and MONTH(tmodrec)='$mes'  and a.cdedcode IN($myString) and b.cstatus IN('A') order by a.tmodrec");
      }else{
        $sql=mssql_query("SELECT  b.cstatus,a.cempno,b.clname, b.cfname,b.ctaxstate, cdeptno,a.cpayno,cfedid, a.cdedcode, a.cdesc, a.ndedamt,cplnid, a.tmodrec
      from prmisd a, prempy b where a.cempno=b.cempno  and cpayno='$nomina' and a.cdedcode IN($myString) and b.cstatus IN('A') order by a.tmodrec");
      }
    
  }else{
    if($opcion==0){
    
      $sql=mssql_query("SELECT  b.cstatus,a.cempno,b.clname, b.cfname,b.ctaxstate, cdeptno,a.cpayno,cfedid, a.cdedcode, a.cdesc, a.ndedamt,cplnid, a.tmodrec
      from prmisd a, prempy b where a.cempno=b.cempno and YEAR(tmodrec)='$anio' and MONTH(tmodrec)='$mes'  and a.cdedcode IN($myString) and cplnid='$IngresoPlanilla' and b.cstatus IN('A') order by a.tmodrec");
      }else{
        $sql=mssql_query("SELECT  b.cstatus,a.cempno,b.clname, b.cfname,b.ctaxstate, cdeptno,a.cpayno,cfedid, a.cdedcode, a.cdesc, a.ndedamt,cplnid, a.tmodrec
      from prmisd a, prempy b where a.cempno=b.cempno  and cpayno='$nomina' and a.cdedcode IN($myString) and cplnid='$IngresoPlanilla' and b.cstatus IN('A') order by a.tmodrec");
      }
  }

 
    while($var=mssql_fetch_array($sql)){
      
      $var['num']=$cont++;
      $sum=$sum+$var['ndedamt'];
      $var['mes']=$mes;
      $var['nombre']=utf8_decode(trim($var['cfname']))." ".utf8_decode(trim($var['clname']));
      $var['tmodrec']=date('d/m/Y',strtotime($var['tmodrec']));
      $var['ttrndate']=date('d/m/Y',strtotime($var['ttrndate']));
      //$var['ndedamt']=number_format($var['ndedamt'],2);
      $datos['Total']=number_format($sum,2);
      $datos[]=$var;
      
  } 
  return $datos;
}

?>