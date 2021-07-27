<?php
/* SignIN Controller
 * 2018-03-20
 * Created By OJBA

 */
  require_once("libs/template_engine.php");
  require_once("models/users.model.php");
  function run(){
    if(isset($_POST["email"])){
      $newUserId= NuevoUsuario($_POST["email"],$_POST["password"]);
      echo $newUserId;
      die();
    }
    renderizar("micuenta",array());
  }


  run();
?>
