<?php
/* Cursos List Controller
 * 2018-03-06
 * Created By OJBA
 */
  require_once("libs/template_engine.php");
  require_once("models/cursos.model.php");
  function run(){
    $viewData = array();
    $viewData["cursos"] = obtenerTodosLosCursos();
    //$viewData["secciones"] = obtenerSecciones();
    $viewData["Nombre"] = "Orlando J Betancourth";
    
    renderizar("cursos/cursos",$viewData);
  }


  run();
?>
