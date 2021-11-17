<?php

    session_start();
    //Para poner la zona horaria independiente de SO de los script en DB
    date_default_timezone_set ('America/Tegucigalpa' );

    require_once("libs/utilities.php");

    $pageRequest = "login";

    if(isset($_GET["page"])){
        $pageRequest = $_GET["page"];
    }

    //Incorporando los midlewares son codigos que se deben ejecutar
    //Siempre
    require_once("controllers/verificar.mw.php");
    require_once("controllers/site.mw.php");
    
    
    //Este switch se encarga de todo el enrutamiento
    switch($pageRequest){
        case 'nuevoJefe':
            require_once("controllers/nuevoJefe.control.php");
            break;
        case 'bancos':
            require_once("controllers/bancos.control.php");
           die();
        case 'Impuestos':
            require_once("controllers/Impuestos.control.php");
           die();
        case 'General':
            require_once("controllers/General.control.php");
           die();
        case "Ingresos":
            require_once("controllers/Ingresos.control.php");
            die();
        case "Deducciones":
            require_once("controllers/Deducciones.control.php");
            die();
        case "DedTrab":
            require_once("controllers/DedTrab.control.php");
            die();
        case "DedCofinter":
            require_once("controllers/DedCofinter.control.php");
            die();
        case "DedInjupemp":
            require_once("controllers/DedInjupemp.control.php");
            die();
        case "SagFamilia":
            require_once("controllers/SagFamilia.control.php");
            die();
        case "Usuario":
            require_once("controllers/Usuario.control.php");
            die();
            case "DedCOMEMP":
                require_once("controllers/DedCOMEMP.control.php");
                die();
        case "DedPlanilla":
            require_once("controllers/DedPlanilla.control.php");
            die();
        case "Calendario":
            require_once("controllers/Calendario.control.php");
            die();
      case "Periodo":
            require_once("controllers/Periodo.control.php");
            die();
      case "Deuda":
            require_once("controllers/Deuda.control.php");
            die();
      case "Permisos":
            require_once("controllers/Permisos.control.php");
            die();
      case "FechaVacaciones":
            require_once("controllers/FechaVacaciones.control.php");
            die();
      case "detalle":
            require_once("controllers/detalle.control.php");
            die();
      case "Vacaciones":
            require_once("controllers/Vacaciones.control.php");
            die();
        case "tabla":
            require_once("controllers/tabla.control.php");
            die();
      case "verDatos":
            require_once("controllers/verDatos.control.php");
            die();
       case "fechas":
            require_once("controllers/fechas.control.php");
            die();
      case "Inicio":
            require_once("controllers/Inicio.control.php");
            die();
      case "login":
            require_once("controllers/login.control.php");
            die();
        case "home":
            //llamar al controlador
            require_once("controllers/home.control.php");
            die();
          case "signin":
            require_once("controllers/signin.control.php");
            die();
            case "micuenta":
            require_once("controllers/micuenta.control.php");
            die();
          
          case "logout":
            mw_setEstaLogueado("","","",false);
            redirectToUrl('index.php');
            die();
    }

      switch($pageRequest){
        
        case "Periodo":
            if(mw_estaLogueado()) {
                require_once("controllers/Periodo.control.php");
            }else{
                redirectToUrl('index.php?page=Periodo');
            }
            die();  
         case "Permisos":
              if(mw_estaLogueado()) {
                  require_once("controllers/Permisos.control.php");
              }else{
                  redirectToUrl('index.php?page=Permisos');
              }
              die();
        case "FechaVacaciones":
              if(mw_estaLogueado()) {
                  require_once("controllers/FechaVacaciones.control.php");
              }else{
                  redirectToUrl('index.php?page=FechaVacaciones');
              }
              die();
        case "detalle":
              if(mw_estaLogueado()) {
                  require_once("controllers/detalle.control.php");
              }else{
                  redirectToUrl('index.php?page=detalle');
              }
              die();
        case "Vacaciones":
              if(mw_estaLogueado()) {
                  require_once("controllers/Vacaciones.control.php");
              }else{
                  redirectToUrl('index.php?page=Vacaciones');
              }
              die();
        case "tabla":
              if(mw_estaLogueado()) {
                  require_once("controllers/tabla.control.php");
              }else{
                  redirectToUrl('index.php?page=tabla');
              }
              die();
        case "verDatos":
              if(mw_estaLogueado()) {
                  require_once("controllers/verDatos.control.php");
              }else{
                  redirectToUrl('index.php?page=verDatos');
              }
              die();
            case "micuenta":
              if(mw_estaLogueado()) {
                  require_once("controllers/micuenta.control.php");
              }else{
                  redirectToUrl('index.php?page=micuenta');
              }
              die();
              case "Inicio":
              if(mw_estaLogueado()) {
                  require_once("controllers/Inicio.control.php");
              }else{
                  redirectToUrl('index.php?page=Inicio');
              }
              die();
            case "cursos":
            if(mw_estaLogueado()) {
                require_once("controllers/cursos/cursos.control.php");
              }else{
                  redirectToUrl('index.php?page=login');
              }
              die();
              case "curso":
              if(mw_estaLogueado()) {
                  require_once("controllers/cursos/curso.control.php");
                }else{
                    redirectToUrl('index.php?page=login');
                }
                die();

               case "fechas":
            if(mw_estaLogueado()) {
                require_once("controllers/fechas.control.php");
              }else{
                  redirectToUrl('index.php?page=fechas');
              }
              die();
          }

    //Si no muere antes no hay recurso
    //require_once("controllers/error.control.php");
    die();
?>
