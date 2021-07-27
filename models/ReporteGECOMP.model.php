<?php 
 require_once("libs/dao.php");
 require_once("models/ejemplo.model.php");
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
 function optenermes($fecha){
  ConexionSQLserverVAM();
  $sql=mssql_query("SELECT DISTINCT cpayno FROM prmisd");
  while($fila=mssql_fetch_array($sql)){
    $datos[]=$fila;
  }

   return $datos;
 }
 function mostrardatos($mes,$opcion,$opcionMes){
  $anio=date('Y',strtotime($opcionMes));
  $meses=date('m',strtotime($opcionMes));
  ConexionSQLserverVAM();
  if($opcion==0){
    $sql=mssql_query("SELECT  a.cempno,b.clname, b.cfname,b.ctaxstate, cdeptno,a.cpayno,cfedid, a.cdedcode, a.cdesc, a.ndedamt,cplnid, a.tmodrec
    from prmisd a, prempy b where a.cempno=b.cempno and YEAR(tmodrec)='$anio' and MONTH(tmodrec)='$meses' and a.cdedcode IN('910','911','913') order by a.tmodrec");
  }else{
    $sql=mssql_query("SELECT  a.cempno,b.clname, b.cfname,b.ctaxstate, cdeptno,a.cpayno,cfedid, a.cdedcode, a.cdesc, a.ndedamt,cplnid, a.tmodrec
    from prmisd a, prempy b where a.cempno=b.cempno and cpayno='$mes'and a.cdedcode IN('910','911','913') order by a.tmodrec");
  }
  
  

    while($var=mssql_fetch_array($sql)){
      $var['mes']=$mes;
      $var['nombre']=utf8_encode(trim($var['cfname']))." ".utf8_encode(trim($var['clname']));
      $var['tmodrec']=date('d/m/Y',strtotime($var['tmodrec']));
 
      
      //$var['ndedamt']=number_format($var['ndedamt'],2);
      $datos[]=$var;
  } 
  return $datos;

 }
 function exportProductDatabase($productResult) {
  ConexionSQLserverVAM();
  $timestamp = time();
  $filename = 'Export_' . $timestamp . '.xls';
  
  header("Content-Type: application/vnd.ms-excel");
  header("Content-Disposition: attachment; filename=\"$filename\"");
  
  $isPrintHeader = false;
  //$cont=mostrardatos($productResult['mes']);

for($i=0;$i<count($productResult);$i++){
  
  $suma=$productResult[$i]['ndedamt']+$suma;
  // echo "Nombre\t Codigo Empleado\t Deduccion\t Monto\t Planilla\n ";
  if($i==0){
    echo "Nombre \t Codigo empleado \t Identidad \t Fecha Generada\t Descripcion \t Monto \t Planilla\t Codigo\t Estado\n";
  }
  $productResult[$i]['tmodrec']=str_replace("/", "-", $productResult[$i]['tmodrec']);
  //$productResult[$i]['ndedamt'] = str_replace(".", ",", $productResult[$i]['ndedamt']);
  echo $productResult[$i]['nombre']."\t".$productResult[$i]['cempno']."\t".$productResult[$i]['cfedid']."\t".$productResult[$i]['tmodrec']."\t".$productResult[$i]['cdesc']."\t".$productResult[$i]['ndedamt']."\t".$productResult[$i]['cplnid']."\t".$productResult[$i]['cdedcode']."\t".$productResult[$i]['ctaxstate']."\n";
}

echo "suma:".$suma;



  exit();

}


?>
