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


    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>


    <link href="build/toastr.css" rel="stylesheet" type="text/css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="toastr.js"></script>

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/lib/chosen/chosen.min.css">




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
    <div id="right-panel" class="right-panel">
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
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Contraseña anterior </label></div>
                                <div class="col-12 col-md-9">
                                    <input type="password" id="pswAnterior" class="form-control" placeholder="Ingrese Contraseña anterior">
                                    <small id="TextoValiPswAnterior" class="help-block form-text"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Contraseña nueva </label></div>
                                <div class="col-12 col-md-9">
                                    <input type="password" id="pswNueva" class="form-control" placeholder="Contraseña nueva ">

                                </div>

                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label"> Confirmar Contraseña</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="password" id="pswConfirmar" class="form-control" placeholder="Confirme Contraseña">
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
            <div style="text-align: center">

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




                    <section id="target">





                    </section>
                    <section id="target2">





                        <div id="arrorvalidacion"></div>
                    </section>



                </div>

                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">CALCULO PROYECTADO DE INDEMNIZACIONES AL 50%</strong>
                    </div>
                    <div class="card-body " id="GeneraEmpleado">

                        <form id="form1" method="POST">

                            <h1 id="pppp"></h1>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Buscar Por:</label></div>
                                <div class="col-12 col-md-9">



                                    <select class="form-control" id="opcion" name="opcionBuscar">
                                       
                                        <option value="1">Codigo de Empleado</option>
                                       <option value="0">Nombre</option>
                                       <option value="2">Identidad</option>

                                      
                                       
                                   </select>

                                </div>

                            </div>
                            <div id="MostrarNombre" style="display: none;">
                                <!--Inicio de MOstrar Nombre -->
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Nombre</label></div>
                                    <div class="col-12 col-md-9">



                                        <select data-placeholder="Escriba el Nombre" class="standardSelect" tabindex="1" id="nombre" name="nombre">
                                    <option value="" label="default"></option>
                                    {{foreach empleado}}
                                    <option value="{{cempno}}">{{cfname}}{{clname}}</option>
                                    {{endfor empleado}}
                                    
                                </select>

                                    </div>

                                </div>
                            </div>
                            <!--Fin de MOstrar Nombre -->

                            <div id="MostrarCodigo">
                                <!--Inicio de MOstrar Codigo -->
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Codigo Empleado</label></div>
                                    <div class="col-12 col-md-9">



                                        <input type="number" class="form-control" placeholder="Codigo de Empleado" name="CodigoEmpleado" id="CodigoEmpleado">

                                    </div>

                                </div>
                            </div>
                            <!--Fin de MOstrar Codigo -->

                            <div id="MostrarIdentidad" style="display: none;">
                                <!--Inicio de MOstrar Identidad -->
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Identidad</label></div>
                                    <div class="col-12 col-md-9">



                                        <input type="text" class="form-control" placeholder="Identidad">

                                    </div>

                                </div>
                            </div>
                            <!--Fin de MOstrar Identidad -->
                            <div style="text-align: center;">
                                <button style="background-color:#67aee2" type="sumbit" id="BtnAceptar" name="BtnAceptar" class="btn btn-primary">&nbsp;Aceptar</button>

                            </div>

                            <div>




                                <div class="card-body">
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Num. Empleado</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Identidad</th>
                                                <th scope="col">Sueldo Act.</th>
                                                <th scope="col">Cargo</th>
                                                <th scope="col">acccion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{foreach ListarEmpleado}}
                                            <tr>
                                                <th>{{num}}</th>
                                                <td>{{cempno}}</td>
                                                <td>{{Nombre}}</td>
                                                <td>{{cfedid}}</td>
                                                <td>{{nmonthpay}}</td>
                                                <td>{{puesto}}</td>
                                                <td><a class="btn btn-primary" href="#" onclick="MyFunction('{{cempno}}');" style="background-color:#67aee2 ;" role="button">Detalle</a></td>
                                            </tr>
                                            {{endfor ListarEmpleado}}

                                        </tbody>
                                    </table>

                                </div>


                            </div>


                            <div class="card-body" id="tablaEmpleado">

                            </div>
                        </form>
                    </div>

                    <div class="card-body " id="Detalle" style="display:none">
                        <div id="gif" style="text-align: center;"></div>
                        <div id="refresh">
                            <!--inicio  Div de refresh-->
                            <h5 style="text-align: right; color: red; font-weight: bold;"> Generado de la planilla: <span id="planilla"> </span> </h5>
                            <h2>Datos Generales</h2>

                            </br>
                            <div class="row form-group">
                                <div class="col col-md-6">Nombre del servidor</div>
                                <div class="col col-md-6">
                                    <dd id="nombres"></dd>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-6">Puesto</div>
                                <div class="col col-md-6">
                                    <dd id="puesto"></dd>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-6">Fecha de Ingreso</div>
                                <div class="col col-md-6">
                                    <dd id="Fechainicio"></dd>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-6">Fecha de Proyeccion</div>
                                <div class="col col-md-6">
                                    <dd id="fechaProyeccion"></dd>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-6">Antigüedad</div>
                                <div class="col col-md-6">
                                    <dd id="antiguedad"></dd>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-6">Sueldo Ordinario</div>
                                <div class="col col-md-6">
                                    <dd id="ordinario"></dd>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-6">Sueldo Promedio Devengado De Los Ultimos 6 Meses Lps:</div>
                                <div class="col col-md-6">
                                    <dd id="labelSueldoPromedio"></dd>
                                </div>
                            </div>

                            </br>

                            <div class="row form-group">
                                <div class="col col-md-6">Preaviso</div>
                                <div class="col col-md-6">
                                    <dd id="preaviso"></dd>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-6">Cesantia</div>
                                <div class="col col-md-6">
                                    <dd id="cesantia"></dd>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-6">Total</div>
                                <div class="col col-md-6">
                                    <dd id="total"></dd>
                                </div>
                            </div>






                            <div style="text-align: center;">
                                <button type="button" id="BtnImprimir" onclick="imprimir();" style="background-color:#67aee2;color:black" class="btn btn-secondary"><i class="fa fa-print"></i>&nbsp; Imprimir</button>&nbsp;
                                <button type="button" onclick="BuscarNuevo();" style="background-color:#E8B540;color:black" class="btn btn-success">Buscar Nuevo</button>





                            </div>
                        </div>
                        <!-- fin  Div de Refresh-->
                    </div>
                </div>



                <script>
                    var val = 0;
                    $('#pswAnterior').keyup(function() {

                        optenervalor = $('#pswAnterior').val();

                        $.post("index.php?page=Permisos", {
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
                                    $("#TextoValiPswAnterior").text('Contraseña Correcta');

                                }
                                console.log(datas.Password);
                                if (datas.Password != 0) {
                                    val = 1;
                                    $("#TextoValiPswAnterior").css({
                                        'color': 'red',
                                        'color': 'red',
                                        'font-weight': 'bold'
                                    });
                                    $("#TextoValiPswAnterior").text('Contraseña Incorrecta');
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
                            $("#Verpassword").text('Las Contraseñas Coinciden');


                        }
                        if (optenernueva != confirmar) {

                            $("#Verpassword").css({
                                'color': 'red',
                                'color': 'red',
                                'font-weight': 'green'
                            });
                            $("#Verpassword").text('Las Contraseñas No Coinciden');
                        }

                    });


                    function toasterOptions() {
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "6000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        };
                    };
                    toasterOptions();


                    var globalcodigo = '0';

                    function MyFunction(numero) {

                        globalcodigo = numero;
                        $('#gif').html('<div alt="logo" class="loading"><img src="img/gif.gif" alt="loading" /><br/>Un momento, por favor...</div>');
                        $('#GeneraEmpleado').hide();
                        $('#Detalle').show();


                        $.post("index.php?page=Deuda", {
                            codigo: numero,
                            op: "Datos"
                        }, function(data) {
                            $('#gif').fadeIn(1000).html('');
                            var arr = JSON.parse(data);
                            console.log(arr);

                            if (arr.DatosEmpleado.Ultimosueldo == null || arr.DatosEmpleado.sueldo6meses == null) {
                                toastr.error(arr.DatosEmpleado.planilla);
                                document.getElementById('BtnImprimir').disabled = true;
                            } else {
                                $('#planilla').text(arr.DatosEmpleado.planilla);
                                $('#nombres').text(arr.dat.Nombre);
                                $('#puesto').text(arr.dat.puesto);
                                $('#Fechainicio').text(arr.dat.fechainicio);
                                $('#fechaProyeccion').text(arr.DatosEmpleado.ultimo);
                                $('#antiguedad').text(arr.DatosEmpleado.dif);
                                $('#ordinario').text(arr.DatosEmpleado.Ultimosueldo);
                                $('#labelSueldoPromedio').text(arr.DatosEmpleado.SueldoProm6mese);
                                $('#preaviso').text(arr.DatosEmpleado.preaviso);
                                $('#cesantia').text(arr.DatosEmpleado.cesantia);
                                $('#total').text(arr.DatosEmpleado.Total);
                            }









                        });






                    }

                    function imprimir() {
                        if (globalcodigo == '') {
                            toastr.error("El empleado no existe", "Error");
                        } else {

                            $.post("index.php?page=Deuda", {
                                globalcodigo: globalcodigo,
                                op: "InsertarReporte"
                            }, function(response) {
                                if (response == 0) {
                                    location.href = "Pdf/Alivio_Deuda.php?x=" + globalcodigo;
                                } else {
                                    toastr.error("Error al imprimir el documento", "Error");
                                }
                            });

                        }


                    }

                    function BuscarNuevo() {
                        $('#nombres').text('');
                        $('#puesto').text('');
                        $('#Fechainicio').text('');
                        $('#fechaProyeccion').text('');
                        $('#antiguedad').text('');
                        $('#ordinario').text('');
                        $('#labelSueldoPromedio').text('');
                        $('#preaviso').text('');
                        $('#cesantia').text('');
                        $('#total').text('');

                        $('#GeneraEmpleado').show();
                        $('#Detalle').hide();
                        $('#form1')[0].reset();
                    }







                    $("#CodigoEmpleado").on("keyup", function() {
                        var opcion = $('#opcion').val();
                        var codigo = $("#CodigoEmpleado").val();
                        $.post("index.php?page=Deuda", {
                            op: "GetEmpleado",
                            codigo: codigo
                        }, function(data) {


                            var parse = JSON.parse(data);

                            $('#labelCodigo').text(parse[0].cempno);
                            $('#labelNombre').text(parse[0].cfname + parse[0].clname);
                            $('#labelIdentidad').text(parse[0].cfedid);
                        });

                    });



                    $(function() {
                        var availableTags = [
                            "ActionScript", "AppleScript", "Asp", "BASIC", "C", "C++",
                            "Clojure", "COBOL", "ColdFusion", "Erlang", "Fortran",
                            "Groovy", "Haskell", "Java", "JavaScript", "Lisp", "Perl",
                            "PHP", "Python", "Ruby", "Scala", "Scheme"
                        ];

                        $("#autocomplete").autocomplete({
                            source: availableTags
                        });
                    });


                    $('#opcion').change(function() {
                        var opcion = $('#opcion').val();
                        console.log(opcion);

                        if (opcion == 0) {
                            $('#MostrarCodigo').hide();
                            $('#MostrarIdentidad').hide();
                            $('#MostrarNombre').show();



                        }
                        if (opcion == 1) {
                            $('#MostrarCodigo').show();
                            $('#MostrarIdentidad').hide();
                            $('#MostrarNombre').hide();



                        }
                        if (opcion == 2) {
                            $('#MostrarCodigo').hide();
                            $('#MostrarIdentidad').show();
                            $('#MostrarNombre').hide();



                        }

                    });
                </script>
                <!-- Peticiones ajax-->



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





    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <script src="assets/js/main.js"></script>
    <script src="./js/jquery-3.1.1.min.js"></script>
    <script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
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

</body>



<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>



<script type="text/javascript">
    $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable();
    });

    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>

</html>