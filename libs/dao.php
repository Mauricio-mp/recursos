
<?php


    function ConexionSQLRecursosHumanos(){
     $server = '172.17.0.170:1433';
    $username='sa';
    $password ='';
    $connect= mssql_connect ($server,$username,$password);
if (!$connect || !mssql_select_db('RecursosHumanos', $connect)) {
  die("Error al conectar con Recursos Humanos");
    
   }else{
    return $connect;
   }
   
   }
   function ConexionSQLserver(){
     $server = '172.17.0.170:1433';
    $username='sa';
    $password ='';
    $connect= mssql_connect ($server,$username,$password);
if (!$connect || !mssql_select_db('recursos', $connect)) {
  die("Error al conectar con Recursos Humanos");
    
   }else{
    return $connect;
   }
   
   }
    function ConexionSQLserverVAM(){
    $server = '172.17.0.152:1433';
    $username='sa';
    $password ='';
    $conexion= mssql_connect ($server,$username,$password);

if (!$conexion || !mssql_select_db('mpsiafi', $conexion)) {
  die("Error_de_Conexion.php");
    
   }
   
   return $conexion;
   }
   function ConexionSQLserverPUBLIC(){
    $server = '172.17.0.170:1433';
    $username='sa';
    $password ='';
    $conexion= mssql_connect ($server,$username,$password);

if (!$conexion || !mssql_select_db('mpublico', $conexion)) {
  die("Error_de_Conexion.php");
    
   }
   
   return $conexion;
   }

  
?>

