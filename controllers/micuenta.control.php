<?php
/* micuenta Controller
 * 2018-03-05
 * Created By OJBA
 * Last Modification 2018-03-05
 */
  require_once("libs/template_engine.php");

  function run(){
    $cuenta = array(
        "mision"=>"Denis Lopez",
        "vision"=>"120630023",
        "email"=>"obetancourthunicah@gmail.com"
    );
    //esta funcion rederiza la platilla con los datos
    // que le manda el controlador.
    renderizar("micuenta",$cuenta);

  }


  run();
?>
