<?php
/* SignIN Controller
 * 2018-03-20
 * Created By OJBA

 */
  require_once("libs/template_engine.php");
  require_once("models/users.model.php");
  function run(){
    $mensaje='';
    if(isset($_POST["Codigo"])){

      $data = AutenticarUsuario($_POST["Codigo"],$_POST["passwd"]);
      
      if ($data==1) {
       // renderizar("home",$arrayName = array('texto' => $mensaje));
     

         $url = "index.php?page=home";
       header("Location:" . $url);
        die();
        //header('location:views/home.view.tpl?x='.$cuenta.' ');
       // $mensaje= $_SESSION['logeo'];
      }
       if ($data==2) {
        $mensaje="Contrasenia Incorrecto";
      }
       if ($data==3) {
        $mensaje="Codigo de empleado Correcto";
      }
       if ($data==4) {
        $mensaje="No existe el usuario";
      }
      
      
    }
   


    renderizar("login",$arrayName = array('texto' => $mensaje));
    unset($data);
  }


  run();
?>
