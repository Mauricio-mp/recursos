<?php 
require_once("libs/dao.php");
define('METHOD','AES-256-CBC');
define('SECRET_KEY','$Ministerio@2020');
define('SECRET_IV','101712');

function optenerRoles(){
    ConexionSQLserver();
    $sql=mssql_query("SELECT * FROM recursos.dbo.cRoles");
    while($fila=mssql_fetch_array($sql)){
        $datos[]=$fila;
    }

    return $datos;
}
function getdatosempleado($idEmpleado){
    ConexionSQLserver();
    $cont=1;
    $sql=mssql_query("SELECT a.Id_Usuario, a.CodEmpleado, a.Nombre, a.Apellido, b.Descripcion,b.id_Rol,a.Contrasenia,a.Apellido2,a.Nombre2 FROM R_Usuarios a, cRoles b WHERE b.id_Rol = a.Id_Rol and a.Id_Usuario ='$idEmpleado'");
    if($fila=mssql_fetch_array($sql)){
        $fila['num']=$cont++;
        $fila['Contrasenia']=desemcriptar($fila['Contrasenia']);
        $datos[]=$fila;
    }

    return $datos;
}
function ModificarUsuario($usuarioCreacion,$IdUsusrio,$codigo,$nombre1,$Nombre2,$apellido1,$apellido2,$NuevloRol,$Contra){
    $Contra = encriptar($Contra);
    $sql=mssql_query("UPDATE recursos.dbo.R_Usuarios SET CodEmpleado='$codigo', Contrasenia='$Contra', Nombre='$nombre1', Apellido='$apellido1', Id_Rol='$NuevloRol',UsuarioModificacion='$usuarioCreacion', FechaModificacion=GETDATE(), Apellido2='$apellido2', Nombre2='$Nombre2' WHERE Id_Usuario='$IdUsusrio' ");
  
    if($sql==true){
        return 1;
    }else{
        return 0;
    }

   

}
function optenerUsuarios(){
    ConexionSQLserver();
    $cont=1;
    $sql=mssql_query("SELECT * FROM recursos.dbo.R_Usuarios WHERE Estado=1");
    while($fila=mssql_fetch_array($sql)){
        $fila['num']=$cont++;
        $datos[]=$fila;
    }

    return $datos;
}

function anularUsuario($codigo){
    ConexionSQLserver();
    $sql=mssql_query("UPDATE R_Usuarios SET Estado=0 WHERE Id_Usuario='$codigo'");
    if($sql==true){
        return 0;
    }else{
        return 1;
    }
  
}
function InsertRol($permisos,$nombre){
    ConexionSQLserver();
   $insertar=mssql_query("INSERT INTO cRoles (Descripcion) VALUES('$nombre')");

    $ultimos=mssql_query("SELECT MAX(id_Rol) AS SmallestPrice FROM cRoles");
    if($ultimo=mssql_fetch_array($ultimos)){
         $ultimosDigito= $ultimo['SmallestPrice'];
    }
    

    
if($insertar==true){
    for ($i=0; $i < count($permisos); $i++) { 
        $ingreso=$permisos[$i];
        $insertarPermiso=mssql_query("INSERT INTO recursos.dbo.Roles_Permisos (Id_Permiso, Id_Rol) VALUES('$ingreso', '$ultimosDigito')");
    }

    if($insertarPermiso==true){
        return 1;
    }else{
        return 0;
    }

}else{
    return 0;
}
    


    


    
}
function GetPermisos($rol){
    ConexionSQLserver();

    $sql=mssql_query("SELECT b.Id_Permiso, a.Descripcion_Permisos FROM cPermisos a,Roles_Permisos b WHERE  b.Id_Rol='$rol' and b.Id_Permiso=a.id_Permiso order by a.Descripcion_Permisos");
    while($fila=mssql_fetch_array($sql)){
        $datos[]=$fila;

    }

    return $datos;
}

function optenerPermisos(){
    $sql=mssql_query("SELECT * FROM recursos.dbo.cPermisos");
    while($fila=mssql_fetch_array($sql)){
        $datos[]=$fila;

    }

    return $datos;
}

function insertarUsuario($CodEmpleado,$PrimerNombre,$SegundoNombre,$PrimerApellido,$SegundoApellido,$password,$select,$UsrLogeo){
    $NewPassword=encriptar($password);
    $sql=mssql_query("INSERT INTO R_Usuarios(CodEmpleado, Contrasenia, Nombre, Apellido, Id_Rol, Estado, UsarioCreacion, FechaCreacion, Apellido2, Nombre2) VALUES('$CodEmpleado', '$NewPassword', '$PrimerNombre', '$PrimerApellido', $select, 1, '$UsrLogeo', GETDATE(), '$SegundoApellido', '$SegundoNombre')");
    if($sql==true){
        return 1;
    }else{
        return 0;
    }
}


function encriptar($string){

    $output=FALSE;
          $key=hash('sha256', SECRET_KEY);
          $iv=substr(hash('sha256', SECRET_IV), 0, 16);
          $output=openssl_encrypt($string, METHOD, $key, 0, $iv);
          $output=base64_encode($output);
          return $output;
   }
   function desemcriptar($string){
    $output=FALSE;
    $key=hash('sha256', SECRET_KEY);
          $iv=substr(hash('sha256', SECRET_IV), 0, 16);
          $output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
          return $output;
   }


?>