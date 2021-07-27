<?php
require_once("libs/dao.php");
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