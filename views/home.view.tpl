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
    <!--admin -->

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




                            {{if Crearusuario}}
                            <li><i style="color:black" class="fa fa-list"></i><a style=" color: black; font-weight: bold;font-size:13px; " href="index.php?page=Usuario">&nbsp; Nevo usuario</a></li>
                            {{endif Crearusuario}}

                            {{if Jefes}}
                            <li><i style="color:black" class="fa fa-list"></i><a style=" color: black; font-weight: bold;font-size:13px; " href="index.php?page=nuevoJefe">&nbsp; Nuevo Jefe</a></li>
                            {{endif Jefes}}


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
    <div id="right-panel" class="right-panel" style="background-color:rgb(24, 5, 5)">
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


                            <a class="nav-link" href="index.php?page=logout"><i class="fa fa-power -off"></i>Cerrar Sesi??n</a>
                            <a data-toggle="modal" data-target="#CambiarPsw" class="nav-link"><i class="fa fa-power -off"></i>Cambiar Contrase??a</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="modal fade" id="CambiarPsw" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
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
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Contrase??a anterio </label></div>
                                <div class="col-12 col-md-9">
                                    <input type="password" id="pswAnterior" class="form-control" placeholder="Ingrese Contrase??a anterior">
                                    <small id="TextoValiPswAnterior" class="help-block form-text"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Contrase??a nueva </label></div>
                                <div class="col-12 col-md-9">
                                    <input type="password" id="pswNueva" class="form-control" placeholder="Contrase??a nueva ">

                                </div>

                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label"> Confirmar Contrase??a</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="password" id="pswConfirmar" class="form-control" placeholder="Confirme Contrase??a">
                                    <small id="Verpassword" class="help-block form-text"></small>
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

            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="form-group has-success">
                        <img src="images/logo.png" alt="logo" width="70%" style="margin-left: 20%">
                        <h1 class="titulo">Misi&oacuten </h1>
                        </br>

                        <p class="parrafo">{{mision}}</p>
                        <br></br>

                        <h1 class="titulo">Visi&oacuten </h1>
                        </br>
                        <p class="parrafo">{{vision}}</p>

                    </div>
                    <!-- /Widgets -->
                    <!--  Traffic  -->

                    <!--  /Traffic -->
                    <div class="clearfix"></div>
                    <!-- Orders -->

                    <!-- /To Do and Live Chat -->
                    <!-- Calender Chart Weather  -->

                    <!-- /Calender Chart Weather -->
                    <!-- Modal - Calendar - Add New Event -->

                    <!-- /#event-modal -->
                    <!-- Modal - Calendar - Add Category -->

                    <!-- /#add-category -->
                </div>
                <!-- .animated -->
            </div>
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

        <!--  Chart js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

        <!--Chartist Chart-->
        <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
        <script src="assets/js/init/weather-init.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
        <script src="assets/js/init/fullcalendar-init.js"></script>

        <!--Local Stuff-->
        <script>
            var val = 0;
            $('#pswAnterior').keyup(function() {

                optenervalor = $('#pswAnterior').val();

                $.post("index.php?page=home", {
                        Password: optenervalor,
                        op: "Verificarpsw"
                    })
                    .done(function(data) {
                        var datas = JSON.parse(data);
                        if (datas.Password == 0) {
                            val = 0;
                            $("#TextoValiPswAnterior").css({
                                'color': 'black',
                                'font-weight': 'bold'
                            });
                            $("#TextoValiPswAnterior").text('Contrase??a Correcta');

                        }
                        console.log(datas.Password);
                        if (datas.Password != 0) {
                            val = 1;
                            $("#TextoValiPswAnterior").css({
                                'color': 'red',
                                'color': 'red',
                                'font-weight': 'bold'
                            });
                            $("#TextoValiPswAnterior").text('Contrase??a Incorrecta');
                        }

                    });


            });

            $("#pswConfirmar").keyup(function() {
                var optenernueva = $('#pswNueva').val();
                var confirmar = $('#pswConfirmar').val();

                if (optenernueva == confirmar) {

                    $("#Verpassword").css({
                        'color': 'black',
                        'color': 'black',
                        'font-weight': 'bold'
                    });
                    $("#Verpassword").text('Las Contrase??as Coinciden');


                }
                if (optenernueva != confirmar) {

                    $("#Verpassword").css({
                        'color': 'red',
                        'color': 'red',
                        'font-weight': 'green'
                    });
                    $("#Verpassword").text('Las Contrase??as No Coinciden');
                }

            });

            $('#BtnNuevaContra').click(function() {
                var anteriorpsq = $('#pswAnterior').val();
                var nuevapsq = $('#pswNueva').val();
                var Confirmarpsq = $('#pswConfirmar').val();


                if (anteriorpsq == '' || nuevapsq == '' || Confirmarpsq == '') {
                    val = 1;
                    toastr.error("no deje campos vacios");

                }


                if (val == 0) {
                    var json = {
                        anteriorpsq,
                        nuevapsq,
                        Confirmarpsq
                    };

                    $.post("index.php?page=home", {
                            Password: json,
                            op: "CambiarClave"
                        })
                        .done(function(data) {
                            var mostrar = JSON.parse(data);
                            if (mostrar.mensaje == 'ok') {
                                alert('Actualizado con exito. debe iniciar sesion');
                                location.href = "index.php";
                            }

                        });
                }





            });
        </script>
</body>

</html>