<?php
    require_once("libs/dao.php");
    /*
    function obtenerTodosMensajes(){
        $sqlstr = "Select * from mensajes;";
        return obtenerRegistros($sqlstr);
    }
    */

    function NombreMes($mes){
        switch ($mes) {
            case 1:
                $valor='Enero';
                break;
            case 2:
                $valor='Febrero';
                break;
            case 3:
                $valor='Marzo';
                break;
            case 4:
                $valor='Abril';
                break;
            case 5:
                $valor='Mayo';
                break;
            case 6:
                $valor='Junio';
                break;
            case 7:
                $valor='Julio';
                break;
            case 8:
                $valor='Agosto';
                break;
            case 9:
                $valor='Septiembre';
                break;
            case 10:
                $valor='Octubre';
                break;
            case 11:
                $valor='Noviembre';
                break;
            case 12:
                $valor='Diciembre';
                break;
            default:
        }
        return $valor;
    }
 ?>
