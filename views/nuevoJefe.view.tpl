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
    <link href="build/toastr.css" rel="stylesheet" type="text/css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="toastr.js"></script>


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
                            <li><i style="color:black" class="fa fa-list"></i><a style=" color: black; font-weight: bold;font-size:13px; " href="index.php?page=nuevoJefe">&nbsp; Nuevo Jefe</a></li>

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
                        <form method="post" action="index.php?page=nuevoJefe" method="post" id="pdform1" >


                            <div class="card">
                                <div class="card-header">
                                    <!-- <strong >Registro </strong> -->
                                    <div style="text-align:end;">
                                        <strong>Registro </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        
                                        <button type="button" id="Btnjefes" class="btn btn-outline-primary"><i class="fa fa-user"></i>&nbsp; Nuevo Jefe</button>
                                        <button type="button" id="BtnEditarjefes" class="btn btn-outline-primary"><i class="fa fa-user"></i>&nbsp; Jefes</button>
                                    </div>


                                </div>
                                <div class="card-body ">
                                    <div class="Pantallajefes" id="Pantallajefes" >


                                        {{if mensaje}}
                                        <div class="card-body">
                                            <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                                                <span class="badge badge-pill badge-primary">Exito</span> {{mensaje}}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            {{endif mensaje}}


                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Nombres*</label></div>
                                                <div class="col-12 col-md-9"><input type="text" name="nombreFirma" id="nombreFirma" name="text-input" placeholder="Ingrese Nombres" class="form-control"><small class="form-text text-muted" id="msg1"></small></div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Apellidos*</label></div>
                                                <div class="col-12 col-md-9"><input type="text" name="apellidoFirma" id="apellidoFirma" name="text-input" placeholder="Ingrese Apellidos" class="form-control"><small class="form-text text-muted" id="msg1"></small></div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Puesto o Cargo</label></div>
                                                <div class="col-12 col-md-9"><input type="text" name="puesto" id="puesto" name="text-input" placeholder="Ingrese Cargo o Puesto" class="form-control"><small class="form-text text-muted"></small></div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Fecha de Creacion*</label></div>
                                                <div class="col-12 col-md-9"><input type="date" name="fecha" id="fecha" name="text-input" placeholder="Text" class="form-control" value="{{fecha_actual}}"disabled ><small class="form-text text-muted" id="msg2"></small></div>
                                            </div>
                                          

                                     
                                            <div id="lista"></div>




                                            <div id="errorHolder"></div>



                                            <div style="text-align: center">


                                                <button onclick="guardarjefes()" type="button" class="btn btn-primary btn-lg btn-block">Aceptar</button>

                                            </div>
                                        </div>
                                        <div style="text-align:left">
                                            <!-- <p>-----------------------------------------------------------------------------------------------------------------------------------------------</p>
                                    <h4>Nombre</h4> -->

                                    <div id="MostrarEdicion" class="MostrarEdicion" style="display: none;">
                                        <form action="index.php?page=nuevoJefe" method="post" id="nuevosjefeseditar" >
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Nombres*</label></div>
                                            <div class="col-12 col-md-9"><input type="text" name="nuevonombreFirma" id="nuevonombreFirma" name="text-input" placeholder="Ingrese Nombres" class="form-control"><small class="form-text text-muted" id="msg1"></small></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Apellidos*</label></div>
                                            <div class="col-12 col-md-9"><input type="text" name="nuevoapellidoFirma" id="nuevoapellidoFirma" name="text-input" placeholder="Ingrese Apellidos" class="form-control"><small class="form-text text-muted" id="msg1"></small></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Puesto o Cargo</label></div>
                                            <div class="col-12 col-md-9"><input type="text" name="nuevopuesto" id="nuevopuesto" name="text-input" placeholder="Ingrese Cargo o Puesto" class="form-control"><small class="form-text text-muted"></small></div>
                                        </div>

                                       

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Estado</label></div>
                                            <div class="col-12 col-md-9"> <select class="form-control" name="nuevoestado" id="nuevoestado">
                                                <option value="1"> Activo</option>
                                                <option value="0">Inactivo</option>
                                               
                                            </select> </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Creado Por</label></div>
                                            <div class="col-12 col-md-9"><input type="text" name="usucreacion" id="usucreacion" name="text-input" disabled class="form-control"><small class="form-text text-muted"></small></div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Modificado Por</label></div>
                                            <div class="col-12 col-md-9"><input type="text" name="usumodificacion" id="usumodificacion" name="text-input" disabled class="form-control"><small class="form-text text-muted"></small></div>
                                        </div>

                                    
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Fecha de Creacion*</label></div>
                                            <div class="col-12 col-md-9"><input type="date" name="fechacreacion1" id="fechacreacion1" name="text-input" placeholder="Text" class="form-control" disabled ><small class="form-text text-muted" id="msg2"></small></div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Fecha de Modificacion*</label></div>
                                            <div class="col-12 col-md-9"><input type="date" name="fechamodificacion" id="fechamodificacion" name="text-input" placeholder="Text" class="form-control" disabled ><small class="form-text text-muted" id="msg2"></small></div>
                                        </div>

                                        <div style="text-align: center">


                                            <button onclick="guardarnuevojefes()" type="button" class="btn btn-primary btn-lg btn-block">Aceptar</button>

                                        </div>
                                          </form>
                                        </div>







                                        </div>

                                    </div>
                                    <!-- finf clase -->
                                    
                                <div class="PantallaEditarjefes" id="PantallaEditarjefes" style="display: none;">
                                    <div class="card-body">
                                        <div class="row form-group">


                                            <!-- Rectangular switch -->

                                            <div class="card-body">
                                                <div class="divtablaEditar">
                                                    <table class="table" id="tablaEditarjefes">
                                                        <thead class="thead-dark" id="">
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Nombre</th>
                                                                <th scope="col">Apellido</th>
                                                                <th scope="col">Cargo</th>
                                                                <th scope="col">Usuario Creacion</th>
                                                                <th scope="col">Estado</th>
                                                                <th scope="col">Accion</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {{foreach Nombre_Firma}}
                                                            <tr>
                                                                <th> {{Id}}</th>
                                                                <th> {{Nombre_Firma}}</th>
                                                                <th> {{Apellido_Firma}}</th>
                                                                <th> {{Cargo}}</th>
                                                                <th> {{Usuario_Creacion}}</th>
                                                                <th>

                                                                    
                                                                    <button type="button" class="{{clase}}">{{Estado}}</button>
                                                                </th>
                                                                <td scope="row"><button type="button" onclick="EditarJefe('{{Id}}','{{Nombre_Firma}}','{{Apellido_Firma}}','{{Cargo}}','{{Estado}}','{{Fecha_Creacion}}','{{numero}}','{{Fecha_Modificacion}}','{{Usuario_Creacion}}','{{Usuario_Modificacion}}' )" class="btn btn-warning btn-sm">EDITAR</button></td>
                                                                
                                                            


                                                            </tr>
                                                            {{endfor Nombre_Firma}}
                                                        </tbody>
                                                    </table>
                                                            
                                                 
                                                </div>
                                               
                                            </form>

                                            
                                           
                                               
                                              
                                                

                                                    </div>
                                                    
                                            </div>
                                       
                                        </div>

                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- /# card -->


                

                </div>

                <style>
                    dl.col3 {
                        PADDING-RIGHT: 0px;
                        PADDING-LEFT: 0px;
                        FLOAT: left;
                        PADDING-BOTTOM: 0px;
                        MARGIN: 15px 0px;
                        WIDTH: 100%;
                        PADDING-TOP: 0px;
                        LIST-STYLE-TYPE: none
                    }
                    
                    dl.col3 dt {
                        PADDING-RIGHT: 2px;
                        DISPLAY: inline;
                        PADDING-LEFT: 2px;
                        float: left;
                        PADDING-BOTTOM: 2px;
                        width: 30%;
                        PADDING-TOP: 2px
                    }
                </style>


                <!-- /Widgets -->
                <!--  Traffic  -->

                <!--  /Traffic -->
                <div class="clearfix "></div>
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
        <div class="clearfix "></div>
        <!-- Footer -->

        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js "></script>
    <script src="assets/js/main.js "></script>

    <!--  Chart js -->
    <script>
var IdGlobal=0;
function guardarjefes() {
  
    var nombreFirma = $('#nombreFirma').val();
    var apellidoFirma = $('#apellidoFirma').val();
    var puesto = $('#puesto').val();
   
    if(nombreFirma==''){
        toastr.error("Campo Nombre Vacio");
    }else if(apellidoFirma==''){
        toastr.error("Campo Apellido Vacio");
    }else if(puesto==''){
        toastr.error("Campo Puesto Vacio");
    }else {
        $.post("index.php?page=nuevoJefe&x=Insertar", {
                            nombreFirma: nombreFirma,
                            apellidoFirma: apellidoFirma,
                            puesto: puesto,
                          
                        }, function(response) {
           if(response==0){
            toastr.success("Jefe Guardado con exito ");
            $('#Pantallajefes').load('index.php?page=nuevoJefe #Pantallajefes');
            $('#tablaEditarjefes').load('index.php?page=nuevoJefe #tablaEditarjefes');
            
             
            
           }else{
            toastr.error(" No se puede Guardar  ");
           }
        });
    }
    
    
}
function guardarnuevojefes(){
id=IdGlobal;
    var nuevonombreFirma = $('#nuevonombreFirma').val();
    var nuevoapellidoFirma = $('#nuevoapellidoFirma').val();
    var nuevopuesto = $('#nuevopuesto').val();
    var nuevoestado=$('#nuevoestado').val();
    if(nuevonombreFirma==''){
        toastr.error("Campo Nombre Vacio");
    }else if(nuevoapellidoFirma==''){
        toastr.error("Campo Apellido Vacio");
    }else if(nuevopuesto==''){
        toastr.error("Campo Puesto Vacio");
    }else {
        $.post("index.php?page=nuevoJefe&x=Modificar", {
                            id:id,
                            nuevonombreFirma: nuevonombreFirma,
                            nuevoapellidoFirma: nuevoapellidoFirma,
                            nuevopuesto: nuevopuesto,
                            nuevoestado:nuevoestado,
                        }, function(response) {
           if(response==0){
            toastr.success("Jefe Actualizado con exito ");
            $('#tablaEditarjefes').load('index.php?page=nuevoJefe #tablaEditarjefes');
            
            $('.MostrarEdicion').hide(); 
            $('.divtablaEditar').show();   
            
           }else{
            /*toastr.error(response);*/
            console.log(response)
           }
        });
    }
                       
}
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
        $('#BtnRol').click(function() {
            $('.Pantallajefes').hide();
            $('.PantallaEditarjefes').hide();
            $('.PantallaRol').show();
        });
        $('#RetrocesoEditar').click(function() {
            $('.divtablaEditarjefes').show();
            $('.MostrarEdicion').hide();
        });
        $('#BtnEditarjefes').click(function() {
            $('.Pantallajefes').hide();
            $('.MostrarEdicion').hide();
          $('.divtablaEditar').show();
            
            $('.PantallaEditarjefes').show();
            
            $(".divtablaEditarjefes").load("index.php?page=Usuario .divtablaEditarjefes");
            
        });
        $('#Btnjefes').click(function() {
            $('.Pantallajefes').show();
            $('.PantallaEditarjefes').hide();
            $('.PantallaRol').hide();
            $('.MostrarEdicion').hide();
            
        });
        $('#text').click(function() {
            alert('hola');
        });
        var idrol = $('#select').val();
        $.post("index.php?page=Usuario&x=rol ", {
            rol: idrol
        }, function(response) {
            $("#lista ").text('');
            var json = JSON.parse(response);
            var count = json['cantidadArray'];
            for (count = 0; count < 10; count++) {
                $("#lista ").prepend('<h5>*' + json['permisos'][count]['Descripcion_Permisos'] + '</h5>');
            }
        });
        function EditarJefe(id,nombre,apellido,cargo,estado,fecha,numero,Fecha_Modificacion,usuario,usumodificacion) { 
         
            IdGlobal=id;
            $('.divtablaEditar').hide();
            $('.MostrarEdicion').show();
          
            $('#nuevonombreFirma').val(nombre);
            $('#nuevoapellidoFirma').val(apellido);
            $('#nuevopuesto').val(cargo);
            $('#fechamodificacion').val(Fecha_Modificacion);
            $('#fechacreacion1').val(fecha);
            $('#usucreacion').val(usuario);
            $('#usumodificacion').val(usumodificacion);
            
            if (estado == "Activo") {
          $("#nuevoestado option[value='1']").attr('selected',true);
} else {
          $("#nuevoestado option[value='0']").attr('selected',true);
   }
            
            
            
       
            
            
            
           
            
}
        function Anular(cod) {
            confirmar = confirm("DESEA ANULAR EL USUARIO");
            if (confirmar == true) {
                $.post("index.php?page=Usuario&x=Anular", {
                    codigo: cod
                }, function(data) {
                    if (data == 0) {
                        toastr.success("Usuario Anulado con exito");
                        $(".divtablaEditarjefes").load("index.php?page=Usuario .divtablaEditarjefes");
                    }
                    if (data == 1) {
                        toastr.error("Error al Anular Usuario");
                    }
                });
            }
        }
        function CrearRol() {
            var checked = [];
            $("input[name='rol[]']:checked").each(function() {
                checked.push(this.value);
            });
            var NombreRol = $('#NombreRol').val();
            $.post("index.php?page=Usuario&x=NuevoRol ", {
                Roles: checked,
                Nombre: NombreRol
            }, function(response) {
                if (response == 1) {
                    toastr.success("Rol Ingresado con exito");
                    setTimeout('document.location.reload()', 100);
                } else {
                    toastr.error("error al ingresar");
                }
            });
        }
        function editarUser(user) {
            var NuevoCodigo = $('#NuevoCodigo').val();
            var NuevoNombre1 = $('#NuevoNombre1').val();
            var NuevoNombre2 = $('#NuevoNombre2').val();
            var NuevoApellido1 = $('#NuevoApellido1').val();
            var NuevoApellido2 = $('#NuevoApellido2').val();
            var NuevoRol = $('#NuevoRol').val();
            $.post("index.php?page=Usuario&x=Editar", {
                codigo: user
            }, function(data) {
                var json = JSON.parse(data);
                $('#iduser').text(json[0]['Id_Usuario']);
                $('#NuevoCodigo').val(json[0]['CodEmpleado']);
                $('#NuevoNombre1').val(json[0]['Nombre']);
                $('#NuevoNombre2').val(json[0]['Nombre2']);
                $('#NuevoApellido1').val(json[0]['Apellido']);
                $('#NuevoApellido2').val(json[0]['Apellido2']);
                $('#NuevoRol').append(' <option selected value=' + json[0]['id_Rol'] + '>' + json[0]['Descripcion'] + '</option>');
                $('#Contrasenia').val(json[0]['Contrasenia']);
                $('.divtablaEditarjefes').hide();
                $('.MostrarEdicion').show();
            });
        }
        function MoficarUsuario() {
            var codigo = $('#NuevoCodigo').val();
            var Nombre1 = $('#NuevoNombre1').val();
            var Nombre2 = $('#NuevoNombre2').val();
            var apellido1 = $('#NuevoApellido1').val();
            var apellido2 = $('#NuevoApellido2').val();
            var NuevloRol = $('#NuevoRol').val();
            var Contra = $('#Contrasenia').val();
            var iduser = $('#iduser').text();
            $.post("index.php?page=Usuario&x=ModificarUser ", {
                codigo: codigo,
                Nombre1: Nombre1,
                Nombre2: Nombre2,
                apellido1: apellido1,
                apellido2: apellido2,
                NuevloRol: NuevloRol,
                Contra: Contra,
                iduser: iduser
            }, function(response) {
                if (response == 1) {
                    $('.divtablaEditarjefes').show();
                    $('.MostrarEdicion').hide();
                    $(".divtablaEditarjefes").load("index.php?page=Usuario .divtablaEditarjefes");
                    toastr.success("Usuario Modificado con exito");
                    
                } else {
                    toastr.success("Error al Modificar los datos", "Oops");
                }
            });
        }
        $('#select').change(function() {
            var rol = $('#select').val();
            $.post("index.php?page=Usuario&x=rol ", {
                rol: rol
            }, function(response) {
                $("#lista ").text('');
                var json = JSON.parse(response);
                var count = json['cantidadArray'];
                for (count = 0; count < 10; count++) {
                    $("#lista ").prepend('<h5>*' + json['permisos'][count]['Descripcion_Permisos'] + '</h5>');
                }
            });
        });
        $('#CodEmpleado').keyup(function() {
            var text4 = $('#CodEmpleado').val();
            var text3 = $('#password').val();
            var text1 = $('#PrimerNombre').val();
            var text2 = $('#PrimerApellido').val();
            if (text4 == '') {
                $('#msg1').text('Este campo es obligatorio');
                document.getElementById("BtnAceptar ").disabled = true;
            } else {
                $('#msg1').text('');
                if (text2 == '' || text3 == '' || text1 == '') {
                    document.getElementById("BtnAceptar ").disabled = true;
                } else {
                    document.getElementById("BtnAceptar ").disabled = false;
                }
            }
        });
        $('#PrimerNombre').keyup(function() {
            var text3 = $('#password').val();
            var text1 = $('#PrimerNombre').val();
            var text2 = $('#PrimerApellido').val();
            var text4 = $('#CodEmpleado').val();
            if (text1 == '') {
                $('#msg1').text('Este campo es obligatorio');
                document.getElementById("BtnAceptar ").disabled = true;
            } else {
                $('#msg1').text('');
                if (text2 == '' || text3 == '' || text4 == '') {
                    document.getElementById("BtnAceptar ").disabled = true;
                } else {
                    document.getElementById("BtnAceptar ").disabled = false;
                }
            }
        });
        $('#PrimerApellido').keyup(function() {
            var text3 = $('#password').val();
            var text1 = $('#PrimerNombre').val();
            var text2 = $('#PrimerApellido').val();
            var text4 = $('#CodEmpleado').val();
            if (text2 == '') {
                $('#msg2').text('Este campo es obligatorio');
                document.getElementById("BtnAceptar ").disabled = true;
            } else {
                $('#msg2').text('');
                if (text1 == '' || text3 == '' || text4 == '') {
                    document.getElementById("BtnAceptar ").disabled = true;
                } else {
                    document.getElementById("BtnAceptar ").disabled = false;
                }
            }
        });
        $('#password').keyup(function() {
            var text3 = $('#password').val();
            var text1 = $('#PrimerNombre').val();
            var text2 = $('#PrimerApellido').val();
            var text4 = $('#CodEmpleado').val();
            if (text3 == '') {
                $('#msg3').text('Este campo es obligatorio');
                document.getElementById("BtnAceptar ").disabled = true;
            } else {
                $('#msg3').text('');
                if (text1 == '' || text2 == '' || text4 == '') {
                    document.getElementById("BtnAceptar ").disabled = true;
                } else {
                    document.getElementById("BtnAceptar ").disabled = false;
                }
            }
        });
    </script>

    <!--Local Stuff-->

    <script>
        jQuery(document).ready(function($) {
            "use strict ";
            // Pie chart flotPie1
            var piedata = [{
                label: "Desktop visits ",
                data: [
                    [1, 32]
                ],
                color: '#5c6bc0'
            }, {
                label: "Tab visits ",
                data: [
                    [1, 33]
                ],
                color: '#ef5350'
            }, {
                label: "Mobile visits ",
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
                label: "Direct Sell ",
                data: [
                    [1, 65]
                ],
                color: '#5b83de'
            }, {
                label: "Channel Sell ",
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
                        fillColor: "#ffffff ",
                        symbol: "circle ",
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
                var ctx = document.getElementById("TrafficChart ");
                ctx.height = 150;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ["Jan ", "Feb ", "Mar ", "Apr ", "May ", "Jun ", "Jul "],
                        datasets: [{
                            label: "Visit ",
                            borderColor: "rgba(4, 73, 203,.09) ",
                            borderWidth: "1 ",
                            backgroundColor: "rgba(4, 73, 203,.5) ",
                            data: [0, 2900, 5000, 3300, 6000, 3250, 0]
                        }, {
                            label: "Bounce ",
                            borderColor: "rgba(245, 23, 66, 0.9) ",
                            borderWidth: "1 ",
                            backgroundColor: "rgba(245, 23, 66,.5) ",
                            pointHighlightStroke: "rgba(245, 23, 66,.5) ",
                            data: [0, 4200, 4500, 1600, 4200, 1500, 4000]
                        }, {
                            label: "Targeted ",
                            borderColor: "rgba(40, 169, 46, 0.9) ",
                            borderWidth: "1 ",
                            backgroundColor: "rgba(40, 169, 46, .5) ",
                            pointHighlightStroke: "rgba(40, 169, 46,.5) ",
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
            $.plot("#flotBarChart ", [{
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