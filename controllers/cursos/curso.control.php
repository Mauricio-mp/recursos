<?php
/* Curso Controller
 * 2018-04-07
 * Created By OJBA
 */
  require_once("libs/template_engine.php");
  require_once("models/cursos.model.php");
  function run(){
    $dataView = array();
    $dataView["mode"]="INS";
    $dataView["estados"] = array(
      array("cod_estado" =>"ACT" ,"dsc_estado" => "Activo"),
      array("cod_estado" =>"INA" ,"dsc_estado" => "Inactivo")
    );
    $ModoDesc= array(
      "INS" => "Nuevo Curso",
      "UPD" => "Actualizando Curso",
      "DEL" => "Eliminando Curso",
      "DSP" => "Detalle del Curso"
    );
    $actionBtn = array(
      "INS" => "Guardar",
      "UPD" => "Actualizar",
      "DEL" => "Eliminar",
      "DSP" => "",
    );
    $dataView["showBtn"] = true;  
    //ActionBtn
    $dataView["pkreadonly"] = "readonly";
    $dataView["readonly"] = "";
    if(isset($_GET["mode"])){
      $dataView["mode"]=$_GET["mode"];
    }else{
      redirectWithMessage("El tipo de acción no es válido","index.php?page=cursos");
    }
    if(isset($_POST["btnGuardar"])){
      //todo lo relacionado con el formulario INS, DEL, UPD
      $dataView["codigo_curso"] = $_POST["codigo_curso"];
      $dataView["desc_curso"] = $_POST["desc_curso"];
      $dataView["estado_curso"] = $_POST["estado_curso"];

      switch ($dataView["mode"]) {
        case 'INS':
            if(nuevoCurso(  $dataView["codigo_curso"], $dataView["desc_curso"],$dataView["estado_curso"])){
              redirectWithMessage("Se insertó nuevo Curso Satisfactoriamente!","index.php?page=cursos");
            }else{
              $dataView["hasError"] = true;
              $dataView["errors"][] = array("error"=>"No se insertó el nuevo curso");
            }
          break;
          case 'UPD':
              if(actualizarCurso(  $dataView["codigo_curso"], $dataView["desc_curso"],$dataView["estado_curso"])){
                redirectWithMessage("Se actualizo Curso Satisfactoriamente!","index.php?page=cursos");
              }else{
                $dataView["hasError"] = true;
                $dataView["errors"][] = array("error"=>"No se actualizó el nuevo curso");
              }
            break;
            case 'DEL':
                if(eliminarCurso(  $dataView["codigo_curso"] )){
                  redirectWithMessage("Se Eliminó el Curso Satisfactoriamente!","index.php?page=cursos");
                }else{
                  $dataView["hasError"] = true;
                  $dataView["errors"][] = array("error"=>"No se eliminó el nuevo curso");
                }
              break;
          default:
            redirectWithMessage("El tipo de acción no es válido","index.php?page=cursos");
            break;
        }
        if($dataView["estado_curso"]==$dataView["estados"][0]["cod_estado"]){
          $dataView["estados"][0]["selected"] = "selected";
        }else{
          $dataView["estados"][1]["selected"] = "selected";
        }
    }else{
      // GET
      switch ($dataView["mode"]) {
      case 'INS':
        $dataView["pkreadonly"] = "";
        break;
        case 'UPD':
          # code...
          break;
          case 'DEL':
            $dataView["readonly"] = "readonly";
            $dataView["selreadonly"] = "disabled";
            break;
            case 'DSP':
              $dataView["readonly"] = "readonly";
              $dataView["selreadonly"] = "disabled";
              $dataView["showBtn"] = false;
              break;
        default:
          redirectWithMessage("El tipo de acción no es válido","index.php?page=cursos");
          break;
      }
      $dataView["ModeDsc"] = $ModoDesc[$dataView["mode"]];
      $dataView["ActionBtn"] = $actionBtn[$dataView["mode"]];
      if($dataView["mode"] !=="INS"){
        $dataView["codigo_curso"] = $_GET["cod"];
        $cursoReg=obtenerCurso($dataView["codigo_curso"]);
        mergeArrayTo($cursoReg, $dataView);
        if($dataView["estado_curso"]==$dataView["estados"][0]["cod_estado"]){
          $dataView["estados"][0]["selected"] = "selected";
        }else{
          $dataView["estados"][1]["selected"] = "selected";
        }
      }
    }


    renderizar("cursos/curso",$dataView);
  }


  run();
?>
