<?php 
 require_once("libs/dao.php");
 require_once("models/ejemplo.model.php");

 function optenermes($fecha){
  ConexionSQLserverVAM();
  $sql=mssql_query("SELECT DISTINCT cpayno FROM prmisc");
  while($fila=mssql_fetch_array($sql)){
    $datos[]=$fila;
  }

   return $datos;
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
  $final = new DateTime('19-03-2122');
  
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

 function obtenerCodigos(){
    
    ConexionSQLserverVAM();
    $sql=mssql_query("SELECT DISTINCT cpaycode,cdesc FROM  prpayc");
    while($fila=mssql_fetch_array($sql)){
        $fila['cdesc']=utf8_decode($fila['cdesc']);
      $datos[]=$fila;
    }
  
     return $datos;
   

 }

 function GetDatos($myString,$nomina,$opcionBusqueda,$TipoMes,$Tipoplanilla){
    ConexionSQLserverVAM();
    $sum=0;
    $cont=1;
    $dia=date("Y",strtotime($TipoMes));
    $mes=date("m",strtotime($TipoMes));

    if($Tipoplanilla==''){
      if($opcionBusqueda=='0'){
        $sql=mssql_query("SELECT d.cdeptno,b.dhire,b.dcntrct,b.cempno,b.clname,b.cstatus, b.cfname,b.ctaxstate,a.cdeptno,a.cpayno,cfedid, a.cpaycode, a.cref,cplnid,a.nothntax,a.nothtax,a.dcheck
        from prmisc a, prempy b,hrjobs c,prdept d where a.cempno=b.cempno and YEAR(a.dtrs)='$dia' and MONTH(a.dtrs)='$mes'  and a.cpaycode IN('$myString') and b.cdeptno=d.cdeptno and b.cjobtitle=c.cJobTitlNO");
      }else{
        $sql=mssql_query("SELECT d.cdeptno,b.dhire,b.dcntrct,b.cempno,b.clname,b.cstatus, b.cfname,b.ctaxstate,a.cdeptno,a.cpayno,cfedid, a.cpaycode, a.cref,cplnid,a.nothntax,a.nothtax,a.dcheck
        from prmisc a, prempy b,hrjobs c,prdept d where a.cempno=b.cempno and  a.cpayno='$nomina' and a.cpaycode IN('$myString') and b.cdeptno=d.cdeptno and b.cjobtitle=c.cJobTitlNO");
      }
    }else{
      
      if($opcionBusqueda=='0'){
        $sql=mssql_query("SELECT d.cdeptno,b.dhire,b.dcntrct,b.cempno,b.clname,b.cstatus, b.cfname,b.ctaxstate,a.cdeptno,a.cpayno,cfedid, a.cpaycode, a.cref,cplnid,a.nothntax,a.nothtax,a.dcheck
        from prmisc a, prempy b,hrjobs c,prdept d where a.cempno=b.cempno and YEAR(a.dtrs)='$dia' and MONTH(a.dtrs)='$mes'  and a.cpaycode IN('$myString') and b.cdeptno=d.cdeptno AND cplnid='$Tipoplanilla' and b.cjobtitle=c.cJobTitlNO");
      }else{
        $sql=mssql_query("SELECT d.cdeptno,b.dhire,b.dcntrct,b.cempno,b.clname,b.cstatus, b.cfname,b.ctaxstate,a.cdeptno,a.cpayno,cfedid, a.cpaycode, a.cref,cplnid,a.nothntax,a.nothtax,a.dcheck
        from prmisc a, prempy b,hrjobs c,prdept d where a.cempno=b.cempno and  a.cpayno='$nomina' and a.cpaycode IN('$myString') and b.cdeptno=d.cdeptno AND cplnid='$Tipoplanilla' and b.cjobtitle=c.cJobTitlNO");
      }
    }


    
      while($var=mssql_fetch_array($sql)){
        $var['num']=$cont++;
        $var['mes']=$nomina;
        $var['nombre']=utf8_decode(trim($var['cfname']))." ".utf8_decode(trim($var['clname']));
        $var['dcheck']=date('d/m/Y',strtotime($var['dcheck']));
        if($var['nothtax']==0 || $var['nothtax']==0.00){
          $var['nothtax']=$var['nothntax'];
        }
        $var['nothtax']=abs($var['nothtax']);
       // $var['nothtax']=number_format($var['nothtax'],2);
        $var['dhire']=date('d/m/Y',strtotime($var['dhire']));
        $var['dcntrct']=date('d/m/Y',strtotime($var['dcntrct']));
        //$var['ndedamt']=number_format($var['ndedamt'],2);
        $sum=$sum+$var['nothtax'];
$datos['Total']=number_format($sum,2);
        $datos[]=$var;
    } 
    return $datos;
   
 }
 function mostrardatos1($mes,$Ingresos,$opcionBusqueda,$TipoMes,$Tipoplanilla){
  
  ConexionSQLserverVAM();
  $dia=date("Y",strtotime($TipoMes));
  $meses=date("m",strtotime($TipoMes));
 
  if($Tipoplanilla==''){
    if($opcionBusqueda=='0'){
      $sql=mssql_query("SELECT d.cdeptno,b.dhire,b.dcntrct,b.cempno,b.clname,b.cstatus, b.cfname,b.ctaxstate,a.cdeptno,a.cpayno,cfedid, a.cpaycode, a.cref,cplnid,a.nothntax,a.nothtax,a.dcheck
      from prmisc a, prempy b,hrjobs c,prdept d where a.cempno=b.cempno and YEAR(a.dtrs)='$dia' and MONTH(a.dtrs)='$meses'  and a.cpaycode IN('$Ingresos') and b.cdeptno=d.cdeptno and b.cjobtitle=c.cJobTitlNO");
    }else{
      $sql=mssql_query("SELECT d.cdeptno,b.dhire,b.dcntrct,b.cempno,b.clname,b.cstatus, b.cfname,b.ctaxstate,a.cdeptno,a.cpayno,cfedid, a.cpaycode, a.cref,cplnid,a.nothntax,a.nothtax,a.dcheck
      from prmisc a, prempy b,hrjobs c,prdept d where a.cempno=b.cempno and  a.cpayno='$mes' and a.cpaycode IN('$Ingresos') and b.cdeptno=d.cdeptno and b.cjobtitle=c.cJobTitlNO");
    }
  }else{
    
    if($opcionBusqueda=='0'){
      $sql=mssql_query("SELECT d.cdeptno,b.dhire,b.dcntrct,b.cempno,b.clname,b.cstatus, b.cfname,b.ctaxstate,a.cdeptno,a.cpayno,cfedid, a.cpaycode, a.cref,cplnid,a.nothntax,a.nothtax,a.dcheck
      from prmisc a, prempy b,hrjobs c,prdept d where a.cempno=b.cempno and YEAR(a.dtrs)='$dia' and MONTH(a.dtrs)='$meses'  and a.cpaycode IN('$Ingresos') and b.cdeptno=d.cdeptno AND cplnid='$Tipoplanilla' and b.cjobtitle=c.cJobTitlNO");
    }else{
      $sql=mssql_query("SELECT d.cdeptno,b.dhire,b.dcntrct,b.cempno,b.clname,b.cstatus, b.cfname,b.ctaxstate,a.cdeptno,a.cpayno,cfedid, a.cpaycode, a.cref,cplnid,a.nothntax,a.nothtax,a.dcheck
      from prmisc a, prempy b,hrjobs c,prdept d where a.cempno=b.cempno and  a.cpayno='$mes' and a.cpaycode IN('$Ingresos') and b.cdeptno=d.cdeptno AND cplnid='$Tipoplanilla' and b.cjobtitle=c.cJobTitlNO");
    }
  }
    while($var=mssql_fetch_array($sql)){
      $var['mes']=$mes;
      $nombre=utf8_encode(trim($var['cfname']))." ".utf8_encode(trim($var['clname']));
      $var['nombre']=utf8_decode($nombre);
      $var['dcheck']=date('d/m/Y',strtotime($var['dtrs']));
      if($var['nothtax']==0 || $var['nothtax']==0.00){
          $var['nothtax']=$var['nothntax'];
        }
     // $var['nothtax']=number_format($var['nothtax'],2);
      //$var['ndedamt']=number_format($var['ndedamt'],2);
      $datos[]=$var;
  } 
  return $datos;

 }
 function mostrardatos($mes,$Ingresos,$opcionBusqueda,$TipoMes,$Tipoplanilla){
  
  ConexionSQLserverVAM();
  $dia=date("Y",strtotime($TipoMes));
  $meses=date("m",strtotime($TipoMes));
  if($opcionBusqueda=='0'){
    
      $sql=mssql_query("SELECT  a.dtrs, c.cJobTitlNO,c.cDesc,d.cdeptname,d.cdeptno,b.dhire,b.dcntrct,b.cempno,b.clname,b.cstatus, b.cfname,b.ctaxstate,a.cdeptno,a.cpayno,cfedid, a.cpaycode, a.cref,cplnid,a.nothntax,a.nothtax,a.dcheck,e.cwageacc,e.cficaacc,e.cmediacc
      from prmisc a, prempy b,hrjobs c,prdept d,prempg e where a.cempno=b.cempno and e.cempno=b.cempno  and  YEAR(a.dtrs)='$dia' and MONTH(a.dtrs)='$meses' and a.cpaycode IN('$Ingresos') and b.cdeptno=d.cdeptno and b.cjobtitle=c.cJobTitlNO");
    
    

  }else{
   
      $sql=mssql_query("SELECT  a.dtrs, c.cJobTitlNO,c.cDesc,d.cdeptname,d.cdeptno,b.dhire,b.dcntrct,b.cempno,b.clname,b.cstatus, b.cfname,b.ctaxstate,a.cdeptno,a.cpayno,cfedid, a.cpaycode, a.cref,cplnid,a.nothntax,a.nothtax,a.dcheck,e.cwageacc,e.cficaacc,e.cmediacc
      from prmisc a, prempy b,hrjobs c,prdept d,prempg e where a.cempno=b.cempno and e.cempno=b.cempno  and  a.cpayno='$mes' and a.cpaycode IN('$Ingresos') and b.cdeptno=d.cdeptno and b.cjobtitle=c.cJobTitlNO");
    
     
  }
    while($var=mssql_fetch_array($sql)){
      $var['mes']=$mes;
      $nombre=utf8_encode(trim($var['cfname']))." ".utf8_encode(trim($var['clname']));
      $var['nombre']=utf8_decode($nombre);
      $var['dcheck']=date('d/m/Y',strtotime($var['dtrs']));
      if($var['nothtax']==0 || $var['nothtax']==0.00){
          $var['nothtax']=$var['nothntax'];
        }
     // $var['nothtax']=number_format($var['nothtax'],2);
      //$var['ndedamt']=number_format($var['ndedamt'],2);
      $datos[]=$var;
  } 
  return $datos;

 }
 function exportProductDatabase($mes,$codigos,$opcionBusqueda,$TipoMes) {
  ConexionSQLserverVAM();
  $timestamp = time();
  $filename = 'Export_' . $timestamp . '.xls';
  
  header("Content-Type: application/vnd.ms-excel");
  header("Content-Disposition: attachment; filename=\"$filename\"");
  
  $isPrintHeader = false;
  $cont=mostrardatos($mes,$codigos,$opcionBusqueda,$TipoMes);
  $suma=0;
for($i=0;$i<count($cont);$i++){
  $monto=number_format($cont[$i]['nothtax'],2);
  $suma=abs($cont[$i]['nothtax'])+$suma;
  // echo "Nombre\t Codigo Empleado\t Deduccion\t Monto\t Planilla\n ";
  if($i==0){
    echo "Nombre \t Codigo empleado \t Identidad\t Fecha\t Descripcion \t Fecha de Ingreso\t Monto \t Planilla\t Codigo\t Estado \n";
  }
  echo $cont[$i]['nombre']."\t".$cont[$i]['cempno']."\t".$cont[$i]['cfedid']."\t".$cont[$i]['dcheck']."\t".$cont[$i]['cref']."\t".$cont[$i]['tlstdate']."\t".$$monto."\t".$cont[$i]['cplnid']."\t".$cont[$i]['cpaycode']."\t".$cont[$i]['ctaxstate']."\n";
}

echo "suma:".number_format($suma,2);



  exit();

}
function exportarExcel($mes,$codigos,$opcionBusqueda,$TipoMes){
  ConexionSQLserverVAM();
  $timestamp = time();
  $filename = 'Export_' . $timestamp . '.xls';
  
  header("Content-Type: application/vnd.ms-excel");
  header("Content-Disposition: attachment; filename=\"$filename\"");
  
  $isPrintHeader = false;
  $cont=mostrardatos($mes,$codigos,$opcionBusqueda,$TipoMes);
  $suma=0;
for($i=0;$i<count($cont);$i++){
  $monto=number_format($cont[$i]['nothtax'],2);
  $suma=$cont[$i]['nothtax']+$suma;
  // echo "Nombre\t Codigo Empleado\t Deduccion\t Monto\t Planilla\n ";
  if($i==0){
    echo "Nombre      \t           Codigo empleado \t  Codigo Departamento\t Nombre Departamento\t  Codigo Puesto \t Nombre Puesto  \t  Identidad\t                     Fecha Generada \t             Descripcion\t                Monto\t              Planilla\t                   Nomina\t                   Codigo\t                    Region de impuesto\t        Estado\t Cuenta Sueldo   \t Cuenta IHSS \t    INJUPEMP\n";
  }
  $cont[$i]['dcheck']=str_replace("/", "-", $cont[$i]['dcheck']);
  /*$var = str_replace(",", "", $monto);
  $cont[$i]['ndedamt'] = str_replace(".", ",", trim($var));
  $monto=$cont[$i]['ndedamt'];*/
  echo $cont[$i]['nombre']."\t".$cont[$i]['cempno']."\t".$cont[$i]['cdeptno']."\t".$cont[$i]['cdeptname']."\t".$cont[$i]['cJobTitlNO']."\t".$cont[$i]['cDesc']."\t".$cont[$i]['cfedid']."\t".$cont[$i]['dcheck']."\t".$cont[$i]['cref']."\t".$monto."\t".$cont[$i]['cplnid']."\t".$cont[$i]['cpayno']."\t".$cont[$i]['cpaycode']."\t".$cont[$i]['ctaxstate']."\t".$cont[$i]['cstatus']."\t".$cont[$i]['cwageacc']."\t".$cont[$i]['cficaacc']."\t".$cont[$i]['cmediacc']."\n";
}

echo "suma:".number_format($suma,2);



  exit();
}

function exportarExcel1($mes,$codigos,$opcionBusqueda,$TipoMes,$Tipoplanilla){
  ConexionSQLserverVAM();
  $timestamp = time();
  $filename = 'Export_' . $timestamp . '.xls';
  header("Content-Type: application/vnd.ms-excel");
  header("Content-Disposition: attachment; filename=\"$filename\"");
  
  $isPrintHeader = false;
  $cont=mostrardatos1($mes,$codigos,$opcionBusqueda,$TipoMes,$Tipoplanilla);
  $suma=0;
for($i=0;$i<count($cont);$i++){
  $monto=number_format($cont[$i]['nothtax'],2);
  $suma=$cont[$i]['nothtax']+$suma;
  // echo "Nombre\t Codigo Empleado\t Deduccion\t Monto\t Planilla\n ";
  if($i==0){
    echo "Nombre      \t           Codigo empleado \t  Codigo Departamento\t Nombre Departamento\t  Codigo Puesto \t Nombre Puesto  \t  Identidad\t                     Fecha Generada \t             Descripcion\t                Monto\t              Planilla\t                   Nomina\t                   Codigo\t                    Region de impuesto\t        Estado\t Cuenta presupuestaria\n";
  }
  $cont[$i]['dcheck']=str_replace("/", "-", $cont[$i]['dcheck']);
  /*$var = str_replace(",", "", $monto);
  $cont[$i]['ndedamt'] = str_replace(".", ",", trim($var));
  $monto=$cont[$i]['ndedamt'];*/
  echo $cont[$i]['nombre']."\t".$cont[$i]['cempno']."\t".$cont[$i]['cdeptno']."\t".$cont[$i]['cdeptname']."\t".$cont[$i]['cJobTitlNO']."\t".$cont[$i]['cDesc']."\t".$cont[$i]['cfedid']."\t".$cont[$i]['dcheck']."\t".$cont[$i]['cref']."\t".$monto."\t".$cont[$i]['cplnid']."\t".$cont[$i]['cpayno']."\t".$cont[$i]['cpaycode']."\t".$cont[$i]['ctaxstate']."\t".$cont[$i]['cstatus']."\t".$cont[$i]['cglacct']."\n";
}

echo "suma:".number_format($suma,2);



  exit();
}


?>