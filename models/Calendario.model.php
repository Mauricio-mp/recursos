<?php 

require_once("libs/dao.php");

function fecha(){
    ConexionSQLserver();
    $sql=mssql_query("SELECT * FROM Fechas");
    while($fila=mssql_fetch_array($sql)){

     
        $fila['title']='Semana santa';
        $fila['start']=date('Y-m-d',strtotime($fila['fecha']));
        $fila['end']=date('Y-m-d',strtotime($fila['fecha']));
        $fila['className']="bg-info";

        $fila['fecha']=false;

        $arr[]=$fila;
    }
    return $arr;
}


?>