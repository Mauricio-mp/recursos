<?php
//middleware de verificación

    function mw_estaLogueado(){
        if( isset($_SESSION["userLogged"]) && $_SESSION["userLogged"] == true){
          return true;
        }else{
          $_SESSION["userLogged"] = false;
          $_SESSION["userName"] = "";
          return false;
        }
    }
    function mw_setEstaLogueado($usuario, $correo,$id,$logueado){
        if($logueado){
            $_SESSION["userLogged"] = true;
            $_SESSION["userName"] = $usuario;
            $_SESSION["userEmail"] = $correo;
            $_SESSION["userId"] = $id;
            $_SESSION["Indemnizacion"] = "";
            $_SESSION["Admin"] = false;
            $_SESSION["Reportes"] = false;
            $_SESSION['Vacaciones']=false;
            $_SESSION["Reportes_Dedu_Planilla"]=false;
            $_SESSION["ReporteHistorialEmpleado"]=false;
            $_SESSION["ReporteHistorialVacaciones"]=false;
            $_SESSION["ReporteComemp"]=false;
            $_SESSION["Usuario"]=false;
            $_SESSION["Crearusuario"]=false;
            $_SESSION["ReporteSagFam"]=false;
            $_SESSION["ReporteInjupemp"]=false;
            $_SESSION["ReporteCofinter"]=false;
            $_SESSION["ReporteTrabajadores"]=false;
            $_SESSION["Deducciones"]=false;
            $_SESSION["DeduccionesIngresos"]=false;
            $_SESSION["ReporteGeneral"]=false;
            $_SESSION["ReporteImpuestos"]=false;
            $_SESSION["ReporteBancos"]=false;
            

            
        }else{
            $_SESSION["userLogged"] = false;
            $_SESSION["userName"] = "";
            $_SESSION["userEmail"] = "";
            $_SESSION["userId"] = "";
            $_SESSION["Indemnizacion"] =false;
            $_SESSION["Admin"] = false;
            $_SESSION["Reportes"] = false;
            $_SESSION['Vacaciones']=false;
            $_SESSION["Reportes_Dedu_Planilla"]=false;
            $_SESSION["ReporteHistorialEmpleado"]=false;
            $_SESSION["ReporteHistorialVacaciones"]=false;
            $_SESSION["ReporteComemp"]=false;
            $_SESSION["Usuario"]=false;
            $_SESSION["Crearusuario"]=false;
            $_SESSION["ReporteSagFam"]=false;
            $_SESSION["ReporteInjupemp"]=false;
            $_SESSION["ReporteCofinter"]=false;
            $_SESSION["ReporteTrabajadores"]=false;
            $_SESSION["Deducciones"]=false;
            $_SESSION["DeduccionesIngresos"]=false;
            $_SESSION["ReporteImpuestos"]=false;
            $_SESSION["ReporteGeneral"]=false;
            $_SESSION["ReporteBancos"]=false;
        }
    }
    function mw_redirectToLogin($to){
        $loginstring = urlencode("?".$to);
        $url = "index.php?page=login&returnUrl=".$loginstring;
        header("Location:" . $url);
        die();
    }

?>
