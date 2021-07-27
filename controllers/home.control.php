<?php
/* micuenta Controller
 * 2018-03-05
 * Created By OJBA
 * Last Modification 2018-03-05
 */
  require_once("libs/template_engine.php");
  require_once("models/users.model.php");
  if ($_SESSION['Codigo_Empleado']=='') {
    header('location:index.php');
  }
  function run(){
    $cuenta = array(
      "mision"=>"Ser un organismo Constitucional independiente, que representa, defiende y protege los intereses generales de la sociedad hondureña, dirigiendo en forma técnico jurídica la investigación de los delitos, ejerciendo la acción penal publica y sus demás funciones, sobre la base de la unidad de actuaciones y la dependencia jerárquica, con profesionalismo, objetividad, legalidad, autonomía funcional y administrativa, con absoluto respeto a la Constitución, convenciones internacionales y las leyes nacionales, fortaleciendo el Estado de Derecho.",
      "vision"=>"Ser una Institución Pública consolidada, moderna y tecnificada,
      de reconocido prestigio, confianza y liderazgo en el ejercicio de
      la acción penal pública, con credibilidad, transparencia y libre
      de toda injerencia político-sectaria; logrando de esta manera
      el cumplimiento de sus fines, con personal altamente formado,
      comprometido con la Institución y la sociedad, de sólidos valores
      morales y éticos.",

      'nombres'=>$_SESSION['logeo'],
      'codigo'=>$_SESSION['Codigo_Empleado']
      
  );
    $opcion=$_POST['op'];

 
    //esta funcion rederiza la platilla con los datos
    // que le manda el controlador.
    switch ($opcion) {
      case 'Verificarpsw':
        $optenerPsw=VerificarPassword($_POST['Password'],$_SESSION['Codigo_Empleado']);
       
  
        $data = array(
          'Password' => $optenerPsw
    
          );
          
    
          //Devolvemos el array pasado a JSON como objeto
          echo json_encode($data, JSON_FORCE_OBJECT);
        break;
      case 'CambiarClave':
        $datos=$_POST['Password'];
        $valores=ActualizarContra($datos['anteriorpsq'],$datos['nuevapsq'],$datos['Confirmarpsq'],$_SESSION['Codigo_Empleado'],"1235@");
        $data = array(
          'mensaje' => $valores
    
          );
          
    
          //Devolvemos el array pasado a JSON como objeto
          echo json_encode($data, JSON_FORCE_OBJECT);
      break;
      default:
     
      renderizar("home",$cuenta);
        break;
    }

  }
  


  run();
?>
