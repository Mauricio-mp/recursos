<?php
    require_once("libs/dao.php");
    /*
    function obtenerTodosMensajes(){
        $sqlstr = "Select * from mensajes;";
        return obtenerRegistros($sqlstr);
    }
    */
    // function obtenerTodosLosCursos(){
    //   $cursos = array();
    //   $sqlstr = "SELECT * from prempy;";
    //   $cursos = obtenerRegistros($sqlstr);
    //   return $cursos;
    // }
   //yyyymmdd  20180307
    function nuevoCurso($codigo_curso, $desc_curso,$est_curso){
      $insSql = "INSERT INTO `cursos` (`codigo_curso`, `desc_curso`, `estado_curso`) VALUES ('%s', '%s', '%s');";
      $insSql = sprintf($insSql,valstr($codigo_curso), valstr($desc_curso), valstr($est_curso));
      $resultado = ejecutarNonQuery($insSql);
      return $resultado && true;
    }
    function actualizarCurso($codigo_curso, $desc_curso,$est_curso){
      $updSql = "UPDATE `cursos`  set  `desc_curso` = '%s', `estado_curso` = '%s' where `codigo_curso` = '%s';";
      $updSql = sprintf($updSql,valstr($desc_curso), valstr($est_curso), valstr($codigo_curso));
      $resultado = ejecutarNonQuery($updSql);
      return $resultado && true;
    }
    function eliminarCurso($codigo_curso){
      $delSql = "DELETE from `cursos`  where `codigo_curso` = '%s';";
      $delSql = sprintf($delSql,valstr($codigo_curso));
      $resultado = ejecutarNonQuery($delSql);
      return $resultado && true;
    }
    function obtenerCurso($codigo_curso){
      $dspSql = "Select * from `cursos`  where `codigo_curso` = '%s';";
      $dspSql = sprintf($dspSql,valstr($codigo_curso));
      $resultado = obtenerUnRegistro($dspSql);
      return $resultado; 
    }
 ?>
