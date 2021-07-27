<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Permisos</title>
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="./css/timepicki.css">

    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>




    <link href="build/toastr.css" rel="stylesheet" type="text/css" />

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="toastr.js"></script>


    <style>
        #weatherWidget .currentDesc {
            color: #ffffff!important;
        }
        
        .traffic-chart {
            min-height: 335px;
        }
        
        #flotPie1 {
            height: 150px;
        }
        
        #flotPie1 td {
            padding: 3px;
        }
        
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        
        .chart-container {
            display: table;
            min-width: 270px;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        
        #flotLine5 {
            height: 105px;
        }
        
        #flotBarChart {
            height: 150px;
        }
        
        #cellPaiChart {
            height: 160px;
        }
    </style>

    <script src="./js/jquery-3.1.1.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/material.min.js"></script>
    <script src="./js/ripples.min.js"></script>
    <script src="./js/sweetalert2.min.js"></script>
    <script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="./js/timepicki.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
</head>

<body class="fondo">
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel" style="background-color:#E8B540;  ">
        <nav class="navbar navbar-expand-sm navbar-default" style="background-color:rgba(10, 255, 112, 0.02); ">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="" style="background-color:#E8B540 ">
                        <a style="font-size:13px; color: black; font-weight: bold;" href="index.php?page=home"><i class="menu-icon fa fa-laptop"></i>Inicio </a>
                    </li>
                    {{if Empleados}}
                    <li class="menu-item-has-children dropdown " style="background-color:#E8B540; ">

                        <a style="font-size:13px;  color: black; font-weight: bold;" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Empledos</a>


                        <ul class="sub-menu children dropdown-menu" style="background-color:rgba(10, 255, 112, 0.01);">
                            {{if Vacaciones}}
                            <li><i style=" color:black" class="menu-icon fa fa-dot-circle-o"></i><a style=" color: black; font-weight: bold;font-size:13px; " href="index.php?page=Permisos">Permisos Empleado</a></li>
                            {{endif Vacaciones}} {{if Infoempleados}}
                            <li><i style="color:black" class="menu-icon fa fa-dot-circle-o"></i><a style=" color: black; font-weight: bold;font-size:13px; " href="index.php?page=Informacion">Info Empleados</a></li>
                            {{endif Infoempleados}}
                        </ul>



                        <ul class="sub-menu children dropdown-menu" style="background-color:rgba(10, 255, 112, 0.01)">


                        </ul>





                    </li>
                    {{endif Empleados}} {{if Indemnizacion}}
                    <li class="menu-item-has-children dropdown " style="background-color:#E8B540 ">

                        <a style=" font-size:13px; color: black; font-weight: bold;" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-clipboard"></i>Alivio Deuda</a>


                        <ul class="sub-menu children dropdown-menu" style="background-color:rgba(10, 255, 112, 0.01)">
                            <li><i style="color:black" class="menu-icon fa fa-dot-circle-o"></i><a style=" color: black; font-weight: bold;font-size:13px; " href="index.php?page=Deuda">Indemnizaciones</a></li>

                        </ul>




                    </li>
                    {{endif Indemnizacion}} {{if Reportes}}
                    <li style=" font-size:13px; color: black; font-weight: bold;" class="menu-title">Reporteria</li>
                    <!-- /.menu-title -->

                    <li class="menu-title"></li>
                    <!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown " style="background-color:rgba(235, 180, 64, 0.10);">

                        <a style="font-size:13px;  color: black; font-weight: bold;" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file"></i>Reportes</a>


                        <ul class="sub-menu children dropdown-menu" style="background-color:rgba(10, 255, 112, 0.01)">



                            {{if ReporteHistorialEmpleado}}
                            <li><i style="color:black" class="fa fa-list"></i><a style=" color: black; font-weight: bold;font-size:13px; " href="index.php?page=Inicio">&nbsp; Historial Empleado</a></li>
                            {{endif ReporteHistorialEmpleado}} {{if ReporteHistorialVacaciones}}
                            <li><i style="color:black" class="fa fa-list"></i><a style=" color: black; font-weight: bold;font-size:13px; " href="index.php?page=Vacaciones">&nbsp; Historial vacaciones</a></li>
                            {{endif ReporteHistorialVacaciones}} {{if Reportes_Dedu_Planilla}}
                            <li><i style="color:black" class="fa fa-list"></i><a style=" color: black; font-weight: bold;font-size:13px; " href="index.php?page=DedPlanilla">&nbsp; Dedu. Por Planilla</a></li>
                            {{endif Reportes_Dedu_Planilla}} {{if ReporteComemp}}
                            <li><i style="color:black" class="fa fa-list"></i><a style=" color: black; font-weight: bold;font-size:13px; " href="index.php?page=DedCOMEMP">&nbsp; Dedu. COMEMP</a></li>
                            {{endif ReporteComemp}} {{if ReporteSagFam}}
                            <li><i style="color:black" class="fa fa-list"></i><a style=" color: black; font-weight: bold;font-size:13px; " href="index.php?page=SagFamilia">&nbsp; Dedu. Sag. Familia</a></li>
                            {{endif ReporteSagFam}} {{if ReporteInjupemp}}
                            <li><i style="color:black" class="fa fa-list"></i><a style=" color: black; font-weight: bold;font-size:13px; " href="index.php?page=DedInjupemp">&nbsp; Dedu. INJUPEMP</a></li>
                            {{endif ReporteInjupemp}} {{if ReporteCofinter}}
                            <li><i style="color:black" class="fa fa-list"></i><a style=" color: black; font-weight: bold;font-size:13px; " href="index.php?page=DedCofinter">&nbsp; Dedu. COFINTER</a></li>
                            {{endif ReporteCofinter}} {{if ReporteTrabajadores}}
                            <li><i style="color:black" class="fa fa-list"></i><a style=" color: black; font-weight: bold;font-size:13px; " href="index.php?page=DedTrab">&nbsp; Banc.Trabajadores</a></li>
                            {{endif ReporteTrabajadores}} {{if Deducciones}}
                            <li><i style="color:black" class="fa fa-list"></i><a style=" color: black; font-weight: bold;font-size:13px; " href="index.php?page=Deducciones">&nbsp; Otras Deducciones</a></li>

                            {{endif Deducciones}} {{if DeduccionesIngresos}}
                            <li><i style="color:black" class="fa fa-list"></i><a style=" color: black; font-weight: bold;font-size:13px; " href="index.php?page=Ingresos">&nbsp; Ingresos</a></li>

                            {{endif DeduccionesIngresos}} {{if ReporteGeneral}}
                            <li><i style="color:black" class="fa fa-list"></i><a style=" color: black; font-weight: bold;font-size:13px; " href="index.php?page=General">&nbsp; General de empleado</a></li>

                            {{endif ReporteGeneral}} {{if ReporteImpuestos}}
                            <li><i style="color:black" class="fa fa-list"></i><a style=" color: black; font-weight: bold;font-size:13px; " href="index.php?page=Impuestos">&nbsp; Impuestos</a></li>

                            {{endif ReporteImpuestos}} {{if ReporteBancos}}
                            <li><i style="color:black" class="fa fa-list"></i><a style=" color: black; font-weight: bold;font-size:13px; " href="index.php?page=bancos">&nbsp; Reporte de Bancos</a></li>

                            {{endif ReporteBancos}}


                        </ul>
                    </li>


                    {{endif Reportes}} {{if Usuario}}
                    <li style="font-size:13px;  color: black; font-weight: bold;" class="menu-title">Usuarios</li>
                    <!-- /.menu-title -->
                    <li class="menu-title"></li>
                    <!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown " style="background-color:rgba(235, 180, 64, 0.10);">

                        <a style="font-size:13px;  color: black; font-weight: bold;" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file"></i>Registro</a>


                        <ul class="sub-menu children dropdown-menu" style="background-color:rgba(10, 255, 112, 0.01)">




                            <li><i style="color:black" class="fa fa-list"></i><a style=" color: black; font-weight: bold;font-size:13px; " href="index.php?page=Usuario">&nbsp; Nevo usuario</a></li>


                        </ul>
                    </li>
                    {{endif Usuario}}
                    <li style=" color: black" class="menu-title">Fin Menu</li>
                    <!-- /.menu-title -->

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </aside>


    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel" style="background-color:#fff">
        <!-- fondo principal-->
        <!-- Header-->
        <header id="header" class="header" style="background-color:rgba(103, 174, 226, 0.95);  ">
            <div class="top-left">
                <div class="navbar-header" style="background-color:rgba(103, 174, 226, 0.20);">

                    <!--  <a class="navbar-brand" href="#"><img src="images/1.png" alt="Logo"  ></a> -->
                    <!-- <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a> -->
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars" style="color: black;"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">




                    </div>

                    <div class="user-area dropdown float-right active">
                        <a style="color:white" href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fa fa-user">&nbsp {{logeo}}</span>
                        </a>

                        <div class="user-menu dropdown-menu">


                            <a class="nav-link" href="index.php?page=logout"><i class="fa fa-power -off"></i>Cerrar Sesión</a>
                            <a data-toggle="modal" data-target="#CambiarPsw" class="nav-link"><i class="fa fa-power -off"></i>Cambiar Contraseña</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <div style="text-align: center">
                <h1>Ingrese Rango de fecha</h1>
            </div>
            <div class="animated fadeIn">
                {{if mensaje}}
                <div class="alert alert-primary" role="alert">
                    {{mensaje}}
                </div>
                {{endif mensaje}}



                <div align="center">
                    <p>{{inicio}}</p>
                    <p>{{Final}}</p>

                    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="mediumModalLabel">Medium Modal</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Contraseña anterio </label></div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="pswAnterior" class="form-control" placeholder="Ingrese Contraseña anterior">
                                            <small id="TextoValiPswAnterior" class="help-block form-text">Please enter your email</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Contraseña nueva </label></div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="pswNueva" class="form-control" placeholder="Contraseña nueva ">

                                        </div>

                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label"> Confirmar Contraseña</label></div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="pswConfirmar" class="form-control" placeholder="Confirme Contraseña">

                                        </div>

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary" id="BtnNuevaContra">Confirm</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <section id="target">
                        <div class="row form-group">




                            <div class="card-body card-block">
                                <form action="index.php?page=Periodo" method="post" enctype="multipart/form-data" class="form-horizontal" id="form_login">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Tipo de Permiso o Licencia</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="tipo" id="tipo" class="form-control">
                                                {{foreach Tipo}}  
                                                <option value="{{cValor}}">{{cDescripcion}}</option>
                                                {{endfor Tipo}} 
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Periodo</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="periodo" id="periodo" class="form-control">
                                                <option value="0" selected value="0" disabled="">Selecione su opcion</option>
                                              {{foreach Periodo}}
                                                <option>{{periodo}}</option>
                                               {{endfor Periodo}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Horas diarias</label></div>
                                        <div class="col col-sm-3"> <input class="form-control" type='number' id="Horas" name='Horas' /><small id="" class="form-text text-muted"></small></div>

                                        <div class="row form-group" id="divRadios">


                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"></label></div>
                                            <div><input type="radio" name="cbox1" id="cbox1" checked> Dias Habiles<br></div>
                                            <div style="padding-left: 98px;"><input type="radio" name="cbox2" id="cbox2"> Inhabilitar Periodo<br></div>




                                        </div>

                                    </div>

                                    <div class="row form-group" id="divRadios">


                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label"></label></div>

                                        <input type="radio" name="num5" id="num5"> 5<br>
                                        <input type="radio" name="num10" id="num10"> 10<br>
                                        <input type="radio" name="num15" id="num15"> 15<br>
                                        <input type="radio" name="num20" id="num20"> 20<br>
                                        <input type="radio" name="num25" id="num25"> 25<br>
                                        <input type="radio" name="num30" id="num30" checked> 30<br>

                                    </div>

                                    <div id="boxtext">
                                        <label class="switch">
                                                <input type="checkbox" name="chkTexto" id="chkTexto">
                                                <span class="slider round"></span>
                                              </label>
                                    </div>
                                    <div id="mostrarOpcion" class="col-sm-4" style="display: none">
                                        <input type="number" name="dias" id="dias" class="form-control">
                                    </div>

                                    <div id="errorHolder"></div>

                                    <button type="button" id="btn" name="btn" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Guardar</button>


                                    <button type="button" id="abrirModal" class="btn btn-danger mb-1" data-toggle="modal" data-target="#staticModal" style="display: none;">
                                      Abrir MOdal
                                  </button>

                                </form>


                            </div>
                        </div>




                        <style>
                            .switch {
                                position: relative;
                                display: inline-block;
                                width: 60px;
                                height: 34px;
                            }
                            
                            .switch input {
                                opacity: 0;
                                width: 0;
                                height: 0;
                            }
                            
                            .slider {
                                position: absolute;
                                cursor: pointer;
                                top: 0;
                                left: 0;
                                right: 0;
                                bottom: 0;
                                background-color: #ccc;
                                -webkit-transition: .4s;
                                transition: .4s;
                            }
                            
                            .slider:before {
                                position: absolute;
                                content: "";
                                height: 26px;
                                width: 26px;
                                left: 4px;
                                bottom: 4px;
                                background-color: white;
                                -webkit-transition: .4s;
                                transition: .4s;
                            }
                            
                            input:checked+.slider {
                                background-color: #2196F3;
                            }
                            
                            input:focus+.slider {
                                box-shadow: 0 0 1px #2196F3;
                            }
                            
                            input:checked+.slider:before {
                                -webkit-transform: translateX(26px);
                                -ms-transform: translateX(26px);
                                transform: translateX(26px);
                            }
                            /* Rounded sliders */
                            
                            .slider.round {
                                border-radius: 34px;
                            }
                            
                            .slider.round:before {
                                border-radius: 50%;
                            }
                        </style>


                    </section>




                </div>


                <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Datos Ingresados con exito.
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>

                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    $('#pswAnterior').change(function() {
                        optenervalor = $('#pswAnterior').val();
                        $.post("index.php?page=Periodo", {
                                valoPsw: optenervalor,
                                op: "VerificarPsw"
                            })
                            .done(function(respuesta) {
                                alert(respuesta);
                                //   $('#TextoValiPswAnterior').text(optenervalor);  
                            });

                    });

                    $('#BtnNuevaContra').click(function() {
                        var anteriorpsq = $('#pswAnterior').val();
                        var nuevapsq = $('#pswNueva').val();
                        var Confirmarpsq = $('#pswConfirmar').val();
                        var val = 0;

                        alert(optenervalor);

                        if (anteriorpsq == '' || nuevapsq == '' || Confirmarpsq == '') {
                            val = 1;
                            toastr.error("no deje campos vacios");

                        }


                        if (val == 0) {
                            toastr.success("Actualizada con exito");
                        }


                    });





                    $('#target').show();
                </script>

                <script>
                    var emailValidator = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    $().ready(function(e) {
                        $("#btn").on('click', onClickHandler);
                    });

                    function onClickHandler(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        var errors = [];
                        var tipo = $("#tipo").val();
                        var periodo = $("#periodo").val();
                        var Horas = $("#Horas").val();

                        var cbox1 = $('#cbox1').val();
                        var chkTexto = $('input:checkbox[name=chkTexto]:checked').val();
                        var dias = $("#dias").val();


                        if (chkTexto == 'on') {
                            if (dias == '') {
                                errors.push("<div class='alert alert-primary' role='alert'> Ingreso de Dias vacio</div>");
                            }
                        }






                        if (errors.length) {
                            var errorBuffer = "<ul>";
                            errorBuffer += errors.map(function(error, i) {
                                return error
                            }).join('');
                            errorBuffer += "</ul>";
                            $("#errorHolder").html(errorBuffer)
                        } else {
                            function toasterOptions() {
                                toastr.options = {
                                    "closeButton": false,
                                    "debug": false,
                                    "newestOnTop": false,
                                    "progressBar": false,
                                    "positionClass": "toast-bottom-right",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                };
                            };


                            toasterOptions();
                            toastr.error("Error Message from toastr");


                        }
                    }





                    $("#divRadios input[name='num5']").click(function(event) {
                        $('#num10').attr('checked', false);
                        $('#num15').attr('checked', false);
                        $('#num20').attr('checked', false);
                        $('#num25').attr('checked', false);
                        $('#num30').attr('checked', false);
                    });
                    $("#divRadios input[name='num10']").click(function(event) {
                        $('#num10').attr('checked', false);
                        $('#num5').attr('checked', false);
                        $('#num15').attr('checked', false);
                        $('#num20').attr('checked', false);
                        $('#num25').attr('checked', false);
                        $('#num30').attr('checked', false);
                    });
                    $("#divRadios input[name='num15']").click(function(event) {
                        $('#num10').attr('checked', false);
                        $('#num5').attr('checked', false);
                        $('#num10').attr('checked', false);
                        $('#num20').attr('checked', false);
                        $('#num25').attr('checked', false);
                        $('#num30').attr('checked', false);
                    });
                    $("#divRadios input[name='num20']").click(function(event) {
                        $('#num10').attr('checked', false);
                        $('#num5').attr('checked', false);
                        $('#num10').attr('checked', false);
                        $('#num15').attr('checked', false);
                        $('#num25').attr('checked', false);
                        $('#num30').attr('checked', false);
                    });
                    $("#divRadios input[name='num25']").click(function(event) {
                        $('#num10').attr('checked', false);
                        $('#num5').attr('checked', false);
                        $('#num10').attr('checked', false);
                        $('#num20').attr('checked', false);
                        $('#num15').attr('checked', false);
                        $('#num30').attr('checked', false);
                    });
                    $("#divRadios input[name='num30']").click(function(event) {
                        $('#num10').attr('checked', false);
                        $('#num5').attr('checked', false);
                        $('#num10').attr('checked', false);
                        $('#num20').attr('checked', false);
                        $('#num15').attr('checked', false);
                        $('#num25').attr('checked', false);
                    });
                    $("#boxtext input[name='chkTexto']").click(function(event) {
                        if ($('input:checkbox[name=chkTexto]:checked').val() == 'on') {
                            $('#mostrarOpcion').show();
                        } else {
                            $('#mostrarOpcion').hide();
                            $('#dias').val('');
                        }
                    });
                </script>

                <script type="text/javascript">
                </script>
                <script type='text/javascript'>
                    $('#timepicker1').timepicki();
                </script>
            </div>
            <!-- .animated -->
        </div>
        <!-- .content -->

        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->

        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>

    <script src="assets/js/main.js"></script>
    <script src="./js/jquery-3.1.1.min.js"></script>
    <script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>



    <!--Local Stuff-->

</body>





<script type="text/javascript">
    $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable();
    });
</script>

</html>