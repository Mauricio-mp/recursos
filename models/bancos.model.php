<?php 
  require_once("libs/dao.php");
  header('Content-Type: text/html; charset=ISO-8859-1');
  function GetLIstaPlanillas(){
  
        ConexionSQLserverVAM();
        $sql=mssql_query("SELECT DISTINCT cpayno FROM prmisd");
        while($fila=mssql_fetch_array($sql)){
          $datos[]=$fila;
        }
      
         return $datos;
       
  }
 


function optenerbancos($nomina,$tipo){
  ConexionSQLserverVAM();
   
    if($tipo=='TODOS'){
      $sql=mssql_query("SELECT DISTINCT cbankname1 
      from prtrst, prempy,prempe
      where prtrst.cempno=prempe.cempno and prempe.cempno=prempy.cempno and prempy.cempno=prtrst.cempno 
      and cpayno='$nomina' ORDER BY cbankname1");
    }else{
      $sql=mssql_query("SELECT DISTINCT cbankname1 
      from prtrst, prempy,prempe
      where prtrst.cempno=prempe.cempno and prempe.cempno=prempy.cempno and prempy.cempno=prtrst.cempno 
      and cpayno='$nomina' and prempy.ctaxstate like '%$tipo' ORDER BY cbankname1");
    }
  
    while($fila=mssql_fetch_array($sql)){
       
      $fila['cbankname1']=utf8_encode(trim($fila['cbankname1']));
        //$fila['cbankname1']=utf8_decode($bancos);
      $datos[]=$fila;
    }
  
     return $datos;

  }
  function getinfo($nomina,$tipo){

    ConexionSQLserverVAM();
    $cont=1;
    $sum=0;
    if($tipo=='TODOS'){
      $sql=mssql_query("SELECT prempy.cplnid,prempy.cempno,prempy.clname, prempy.cfname, prempy.cfedid, prtrst.nchkamt,cbankacct1,cbankname1 
      from prtrst, prempy,prempe
      where prtrst.cempno=prempe.cempno and prempe.cempno=prempy.cempno and prempy.cempno=prtrst.cempno 
      and cpayno='$nomina' ORDER BY cbankname1");
    }else{
      $sql=mssql_query("SELECT prempy.cplnid,prempy.cempno,prempy.clname, prempy.cfname, prempy.cfedid, prtrst.nchkamt,cbankacct1,cbankname1 
      from prtrst, prempy,prempe
      where prtrst.cempno=prempe.cempno and prempe.cempno=prempy.cempno and prempy.cempno=prtrst.cempno 
      and cpayno='$nomina' and prempy.ctaxstate like '%$tipo' ORDER BY cbankname1");
    }
  
    while($fila=mssql_fetch_array($sql)){
        $fila['num']=$cont++;
        $sum=$sum+$fila['nchkamt'];
        $fila['cbankname1']=utf8_encode(trim($fila['cbankname1']));
       // $banco=$fila['cbankname1'];
       // $fila['cbankname1']=utf8_decode($banco);
        $fila['cfname']=utf8_encode(trim($fila['cfname']));
        $fila['clname']=utf8_encode(trim($fila['clname']));
        $nombre=$fila['cfname']." ".$fila['clname'];
        $fila['nombre']=utf8_decode($nombre);
        $datos['Total']=number_format($sum,2);
      $datos[]=$fila;
    }
  
     return $datos;
  }

  function Insert($userLogged){

$sql=mssql_query("SELECT * FROM recursos.dbo.R_Usuarios WHERE Id_Usuario='$userLogged'");
$fila=mssql_fetch_array($sql);
  $codigoEmpleado=$fila['CodEmpleado'];
 

  $insert=mssql_query("INSERT INTO recursos.dbo.Reporte_Generado
  (UsuarioCreacion, FechaCreacion, Id_Catalogo)
  VALUES('$codigoEmpleado', GETDATE(), '4')");


  return $insert;

    

  }

?>