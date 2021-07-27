
<?php


    function ConexionSQLRecursosHumanos(){
     $server = '172.17.0.152:1433';
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
     $server = '172.17.0.152:1433';
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
    $server = '172.17.0.152:1433';
    $username='sa';
    $password ='';
    $conexion= mssql_connect ($server,$username,$password);

if (!$conexion || !mssql_select_db('mpublico', $conexion)) {
  die("Error_de_Conexion.php");
    
   }
   
   return $conexion;
   }

   function obtenerRegistros($sqlstr, &$conexion = null){
       ConexionSQLserverVAM();
        $consulta = mssql_query($sqlstr);
        
        $resultArray = array();
        if($result=mssql_fetch_array($consulta)){
            $resultArray[] = $result['cempno'];
        }
        return $resultArray;
   }


   function obtenerUnRegistro($sqlstr, &$conexion = null){
        // if(!$conexion) global $conexion;
        // $result = $conexion->query($sqlstr);
        // $resultArray = array();

        // $resultArray = $result->fetch_assoc();

        return 'hola';
   }


   function ejecutarNonQuery($sqlstr, &$conexion = null){
        // if(!$conexion) global $conexion;
        // $result = $conexion->query($sqlstr);
        return 'hola';
   }

   function valstr($str, &$conexion = null){
      // if(!$conexion) global $conexion;
      return 'hola';
   }

   function getLastInserId(&$conexion = null){
     // if(!$conexion) global $conexion;
     return 'hola';
   }
?>

