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
    <title>Ela Admin - HTML5 Admin Template</title>
    <link rel="stylesheet" href="public/css/estilo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/lib/chosen/chosen.min.css">


    <script>
        jQuery(document).ready(function() {
            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });
    </script>
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
</head>

<body>
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
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="">
                    <div>
                        <form method="post" action="index.php?page=Ingresos&x=1">


                            <div class="card">
                                <div class="card-header">
                                    <strong>Ingresos Por Planilla </strong>

                                </div>
                                <div class="card-body">

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Seleccione busqueda</label></div>
                                        <div class="col-12 col-md-9"> <select name="opcionBusqueda" id="opcionBusqueda"  class="standardSelect" tabindex="1" onchange="MostrarElement()">
                                           <option value="0">Mes</option>
                                           <option value="1">Nomina</option>
                                        </select></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ingreso</label></div>
                                        <div class="col-12 col-md-9"> <select name="CbxIngresos" data-placeholder="Seleccione Ingresos" class="standardSelect">
                                            {{foreach seleccion}}
                                            <option value="{{cpaycode}}">{{cpaycode}} - {{cdesc}}</option>
                                            {{endfor seleccion}}
                                        </select></div>
                                    </div>
                                    <div id="mostrarmes" style="display: block;">
                                        <div class="row form-group"  >
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Seleciones Mes</label></div>
                                            <div class="col-12 col-md-9"><select data-placeholder="Seleccione planilla" name="TipoMes"  id="TipoMes" class="standardSelect" tabindex="1">
                                             
                                                {{foreach fechas}}
                                                <option value="{{opcion}}">{{mese}}</option>
                                               {{endfor fechas}}
    
                                               
                                            </select></div>
                                        </div>
                                    </div>
       
                                   
                                    <div id="divpNomina" style="display: none;">
                                       
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Seleciones Nomina</label></div>
                                            <div class="col-12 col-md-9"><select data-placeholder="Seleccione planilla" name="mes" class="standardSelect" tabindex="1">
                                                {{foreach nomina}}
                                                <option  >{{cpayno}}</option>
                                               {{endfor nomina}}
                                            </select></div>
                                        </div>

                                    </div>
                                   




                                    <div id="errorHolder"></div>



                                    <div style="text-align: center">


                                        <button id="BtnAceptar" type="submit" class="btn btn-primary btn-lg btn-block">Aceptar</button>


                                    </div>
                                </div>
                                <div style="text-align:left">
                                    <!-- <p>-----------------------------------------------------------------------------------------------------------------------------------------------</p>
                                    <h4>Nombre</h4> -->

                                    {{if Dat}}
                                    <div style="text-align: left;">
                                        <button type="button" onclick="MyFunction()" class="btn btn-success"><i class="fa fa-print"></i>&nbsp; Pdf</button> &nbsp;
                                        <button type="button" onclick="excel()" class="btn btn-success"><i class="fa fa-table"></i>&nbsp; EXCEL</button> &nbsp;
                                        <button type="button" onclick="excelPlanillas()" class="btn btn-danger"><i class="fa fa-table"></i>&nbsp; EXCEL</button>
                                        <div id="gif" style="text-align: center;"></div>
                                    </div>
                                    <div style="text-align: right;">
                                        <h1>L.{{Total}}</h1>
                                    </div>
                                    {{endif Dat}}
                                    <div id="ad54"></div>
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Codigo de empleado</th>
                                                <th>Fecha de ingreso</th>
                                                <th>Planilla</th>
                                                <th>Monto</th>
                                                <th>Deduccion</th>
                                                <th>Fecha Contrato</th>
                                                <th>Fecha Acuerdo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{foreach Dat}}
                                            <tr>
                                                <td>{{num}}</td>
                                                <td>{{nombre}}</td>
                                                <td>{{cempno}}</td>
                                                <td>{{dcheck}}</td>
                                                <td>{{cplnid}}</td>
                                                <td>{{nothtax}}</td>
                                                <td>{{cref}}</td>
                                                <td>{{dhire}}</td>
                                                <td>{{dcntrct}}</td>

                                            </tr>
                                            {{endfor Dat}}



                                        </tbody>
                                    </table>





                                </div>
                            </div>
                            <!-- /# card -->

                        </form>
                        <div>

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
            <script>
                function MostrarElement(){
                    var opcion = document.getElementById('opcionBusqueda').value;
                    var mes = document.getElementById('TipoMes').value;
                    var divmeses= document.getElementById('mostrarmes');
                    var divpNomina= document.getElementById('divpNomina');
                 
                   if(opcion=="0"){
              
                    divmeses.style.display = "block";
                    divpNomina.style.display = "none";
                   }else{
                    divmeses.style.display = "none";
                    divpNomina.style.display = "block";
                   }
                }
                function MyFunction() {
                    var link = "http://172.17.0.254/recursos/Pdf/ReporteIngresos.php";
                    var iframe = document.createElement('iframe');
                    iframe.frameBorder = 0;
                    iframe.width = "1000px";
                    iframe.height = "1000px";
                    iframe.id = "randomid";
                    iframe.setAttribute("src", link);
                    document.getElementById("ad54").appendChild(iframe);
                }

                function excel(mes) {
                    location.href = 'index.php?page=Ingresos&x=2';
                }

                function excelPlanillas() {
                
                    location.href = 'index.php?page=Ingresos&x=3';
                }
            </script>

            <!--Local Stuff-->

            <script>
                jQuery(document).ready(function($) {
                    "use strict";

                    // Pie chart flotPie1
                    var piedata = [{
                        label: "Desktop visits",
                        data: [
                            [1, 32]
                        ],
                        color: '#5c6bc0'
                    }, {
                        label: "Tab visits",
                        data: [
                            [1, 33]
                        ],
                        color: '#ef5350'
                    }, {
                        label: "Mobile visits",
                        data: [
                            [1, 35]
                        ],
                        color: '#66bb6a'
                    }];

                    $.plot('#flotPie1', piedata, {
                        series: {
                            pie: {
                                show: true,
                                radius: 1,
                                innerRadius: 0.65,
                                label: {
                                    show: true,
                                    radius: 2 / 3,
                                    threshold: 1
                                },
                                stroke: {
                                    width: 0
                                }
                            }
                        },
                        grid: {
                            hoverable: true,
                            clickable: true
                        }
                    });
                    // Pie chart flotPie1  End
                    // cellPaiChart
                    var cellPaiChart = [{
                        label: "Direct Sell",
                        data: [
                            [1, 65]
                        ],
                        color: '#5b83de'
                    }, {
                        label: "Channel Sell",
                        data: [
                            [1, 35]
                        ],
                        color: '#00bfa5'
                    }];
                    $.plot('#cellPaiChart', cellPaiChart, {
                        series: {
                            pie: {
                                show: true,
                                stroke: {
                                    width: 0
                                }
                            }
                        },
                        legend: {
                            show: false
                        },
                        grid: {
                            hoverable: true,
                            clickable: true
                        }

                    });
                    // cellPaiChart End
                    // Line Chart  #flotLine5
                    var newCust = [
                        [0, 3],
                        [1, 5],
                        [2, 4],
                        [3, 7],
                        [4, 9],
                        [5, 3],
                        [6, 6],
                        [7, 4],
                        [8, 10]
                    ];

                    var plot = $.plot($('#flotLine5'), [{
                        data: newCust,
                        label: 'New Data Flow',
                        color: '#fff'
                    }], {
                        series: {
                            lines: {
                                show: true,
                                lineColor: '#fff',
                                lineWidth: 2
                            },
                            points: {
                                show: true,
                                fill: true,
                                fillColor: "#ffffff",
                                symbol: "circle",
                                radius: 3
                            },
                            shadowSize: 0
                        },
                        points: {
                            show: true,
                        },
                        legend: {
                            show: false
                        },
                        grid: {
                            show: false
                        }
                    });
                    // Line Chart  #flotLine5 End
                    // Traffic Chart using chartist
                    if ($('#traffic-chart').length) {
                        var chart = new Chartist.Line('#traffic-chart', {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                            series: [
                                [0, 18000, 35000, 25000, 22000, 0],
                                [0, 33000, 15000, 20000, 15000, 300],
                                [0, 15000, 28000, 15000, 30000, 5000]
                            ]
                        }, {
                            low: 0,
                            showArea: true,
                            showLine: false,
                            showPoint: false,
                            fullWidth: true,
                            axisX: {
                                showGrid: true
                            }
                        });

                        chart.on('draw', function(data) {
                            if (data.type === 'line' || data.type === 'area') {
                                data.element.animate({
                                    d: {
                                        begin: 2000 * data.index,
                                        dur: 2000,
                                        from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                        to: data.path.clone().stringify(),
                                        easing: Chartist.Svg.Easing.easeOutQuint
                                    }
                                });
                            }
                        });
                    }
                    // Traffic Chart using chartist End
                    //Traffic chart chart-js
                    if ($('#TrafficChart').length) {
                        var ctx = document.getElementById("TrafficChart");
                        ctx.height = 150;
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
                                datasets: [{
                                    label: "Visit",
                                    borderColor: "rgba(4, 73, 203,.09)",
                                    borderWidth: "1",
                                    backgroundColor: "rgba(4, 73, 203,.5)",
                                    data: [0, 2900, 5000, 3300, 6000, 3250, 0]
                                }, {
                                    label: "Bounce",
                                    borderColor: "rgba(245, 23, 66, 0.9)",
                                    borderWidth: "1",
                                    backgroundColor: "rgba(245, 23, 66,.5)",
                                    pointHighlightStroke: "rgba(245, 23, 66,.5)",
                                    data: [0, 4200, 4500, 1600, 4200, 1500, 4000]
                                }, {
                                    label: "Targeted",
                                    borderColor: "rgba(40, 169, 46, 0.9)",
                                    borderWidth: "1",
                                    backgroundColor: "rgba(40, 169, 46, .5)",
                                    pointHighlightStroke: "rgba(40, 169, 46,.5)",
                                    data: [1000, 5200, 3600, 2600, 4200, 5300, 0]
                                }]
                            },
                            options: {
                                responsive: true,
                                tooltips: {
                                    mode: 'index',
                                    intersect: false
                                },
                                hover: {
                                    mode: 'nearest',
                                    intersect: true
                                }

                            }
                        });
                    }
                    //Traffic chart chart-js  End
                    // Bar Chart #flotBarChart
                    $.plot("#flotBarChart", [{
                        data: [
                            [0, 18],
                            [2, 8],
                            [4, 5],
                            [6, 13],
                            [8, 5],
                            [10, 7],
                            [12, 4],
                            [14, 6],
                            [16, 15],
                            [18, 9],
                            [20, 17],
                            [22, 7],
                            [24, 4],
                            [26, 9],
                            [28, 11]
                        ],
                        bars: {
                            show: true,
                            lineWidth: 0,
                            fillColor: '#ffffff8a'
                        }
                    }], {
                        grid: {
                            show: false
                        }
                    });
                    // Bar Chart #flotBarChart End
                });
            </script>
            <script>
            </script>
</body>

</html>
