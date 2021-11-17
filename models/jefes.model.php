<?php 
require_once("libs/dao.php");
//error_reporting(E_ALL);
//ini_set("display_errors", 1);

function optenerjefes() {
    ConexionSQLserver();
    
    $sql=mssql_query("SELECT * from JefeSeccionTramites");
    while($ejecutar=mssql_fetch_array($sql)){
        $ejecutar['Id'];
        $ejecutar['Nombre_Firma']=utf8_encode($ejecutar['Nombre_Firma']);
        $ejecutar['Apellido_Firma']=utf8_encode($ejecutar['Apellido_Firma']);
        $ejecutar['Cargo']=utf8_encode($ejecutar['Cargo']);
        $ejecutar['Estado']=utf8_encode($ejecutar['Estado']);
        $ejecutar['numero']=$ejecutar['Estado'];
        if($ejecutar['Estado']==1){
            $ejecutar['clase']="btn btn-success";
            $ejecutar['Estado']="Activo";
        }else{
            $ejecutar['clase']="btn btn-danger";
            $ejecutar['Estado']="Inactivo";
        }
        $ejecutar['Fecha_Creacion']=date('Y-m-d',strtotime($ejecutar ['Fecha_Creacion']));
        $ejecutar['Usuario_Creacion']=utf8_encode($ejecutar['Usuario_Creacion']);
        if($ejecutar['Fecha_Modificacion']==''){
            $ejecutar['Fecha_Modificacion']='';
        }else{
            $ejecutar['Fecha_Modificacion']=date('Y-m-d',strtotime($ejecutar['Fecha_Modificacion']));
        }
     
        $ejecutar['Usuario_Modificacion']=utf8_encode($ejecutar['Usuario_Modificacion']);
        $arr[]=$ejecutar;
    
    }
        return $arr;

}

function guardarjefes($nombre,$apellido,$cargo,$estado,$fechaActual,$usuario) {
    

    ConexionSQLserver();
    $insert=mssql_query("INSERT INTO JefeSeccionTramites
    (Nombre_Firma, 
    Apellido_Firma, 
    Cargo, 
    Estado,
    Fecha_Creacion,
    Usuario_Creacion)
    values
    ('$nombre',
    '$apellido',
    '$cargo',
    '$estado',
    '$fechaActual',
    '$usuario'
     )");

if($insert==true){
    return 0;
}else{
    return 1;
}

}

function editarjefes($nuevonombre,$nuevoapellido,$nuevocargo,$nuevoestado,$fechamodificacion,$usuariomodificacion,$id){

  ConexionSQLserver();
  $editar=mssql_query("UPDATE JefeSeccionTramites SET  
  Nombre_Firma= '$nuevonombre',
  Apellido_Firma='$nuevoapellido',
  Cargo='$nuevocargo',
  Estado='$nuevoestado',
  Fecha_Modificacion='$fechamodificacion',
  Usuario_Modificacion='$usuariomodificacion'
  WHERE Id =$id
  ");

if($editar==true){
    return 0;
 }else{
   return 1;
}
 
}



?>