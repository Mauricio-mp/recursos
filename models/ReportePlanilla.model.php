<?php  
 require_once("libs/dao.php");
 require_once("models/ejemplo.model.php");


 function optenerDatos($codigo,$Planilla){
    ConexionSQLserverVAM();
    $sql=mssql_query("SELECT cempno FROM prempy WHERE cplnid ='OG' and cstatus='A'");
    while($var=mssql_fetch_array($sql)){
        $datos[]=$var;
    }
        
    

     return $datos;
 }

 function listarmese(){
     $fechaActual=date('m/d/Y');
     $unMesAnterior=date("m",strtotime($fechaActual."- 1 month"));
     $dosMesesAnerior=date("m",strtotime($fechaActual."- 2 month"));
     $datos['msg1']=NombreMes(date('m'));
     $datos['msg2']=NombreMes($unMesAnterior);
     $datos['msg3']=NombreMes($dosMesesAnerior);

    return $datos;
 }

?>