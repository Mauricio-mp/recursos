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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <link rel="stylesheet" href="assets/css/lib/chosen/chosen.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>

    <script>
        jQuery(document).ready(function() {
            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });
    </script>
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

                        <form id="form1" method="POST" action="index.php?page=Permisos">

                            <h1 id="pppp"></h1>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Buscar Por:</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="txtopcion" id="txtopcion" class="form-control">
                                  <option value="0" selected value="0" disabled="">Selecione su opcion</option>
                                
                                  <option value="identidad">Identidad</option>
                                  <option value="nombre">Nombres</option>
                                  <option value="Apellido">Apellido</option>
                                  <option value="Numero">Número de Empleado</option>
                                 
                              </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Fecha Inicio</label></div>
                                <div class="col-12 col-md-9"><input type="text" name="txtvalor" id="txtvalor" name="text-input" placeholder="Ingrese Valor" class="form-control"></div>
                            </div>

                            <button type="submit" id="BtnBuscar" name="BtnBuscar" class="btn btn-primary">&nbsp;Buscar</button>
                            <div class="card-body" id="tablaEmpleado">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Expediente</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Apellido</th>
                                            <th scope="col">Cargo</th>
                                            <th scope="col">Departamento</th>
                                            <th scope="col">Opción</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{foreach DatosEmpleado}}
                                        <tr>
                                            <th scope="row">{{cPersonaId}}</th>
                                            <td>{{cNombres}}</td>
                                            <td>{{cApellidos}}</td>
                                            <td>{{Cargo}}</td>
                                            <td>{{Departamento}}</td>
                                            <td> <button type="button" onclick="myFunction('{{cPersonaId}}')" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>&nbsp; </button></td>
                                        </tr>
                                        {{endfor DatosEmpleado}}
                                    </tbody>
                                </table>
                            </div>
                        </form>



                        <div id="arrorvalidacion"></div>
                    </section>

                    <section id="target3">
                        <div class="">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Módulo de Vacaciones</h4>
                                </div>
                                <div class="card-body">
                                    <div class="default-tab">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">datos Generales</a>
                                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Periodo</a>
                                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Permiso</a>
                                                <a class="nav-item nav-link" id="nav-BorarPeriodo-tab" data-toggle="tab" href="#nav-BorarPeriodo" role="tab" aria-controls="nav-BorarPeriodo" aria-selected="false">Eliminar Periodo</a>
                                                <a class="nav-item nav-link" id="nav-BorarPermiso-tab" data-toggle="tab" href="#nav-BorarPermiso" role="tab" aria-controls="nav-BorarPermiso" aria-selected="false">Eliminar Permiso</a>
                                                <a class="nav-item nav-link" id="nav-feriados-tab" data-toggle="tab" href="#nav-feriados" role="tab" aria-controls="nav-feriados" aria-selected="false">Dias feriados</a>
                                                <a class="nav-item nav-link" id="nav-vacaciones-tab" data-toggle="tab" href="#nav-vacaciones" role="tab" aria-controls="nav-vacaciones" aria-selected="false">Informe de Vacaciones</a>
                                                <a class="nav-item nav-link" id="nav-saldovacaciones-tab" data-toggle="tab" href="#nav-saldovacaciones" role="tab" aria-controls="nav-saldovacaciones" aria-selected="false">Informe Saldo de Vacaciones</a>
                                                

                                            </div>
                                        </nav>
                                        <div class="tab-content pl-3 pt-2" id="nav-tabContent">

                                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                <h1 style="text-align:right;">Estado: <strong id="labelEstado"></strong></h1>
                                                <form id="form2" method="POST" action="index.php?page=Permisos">


                                                    <div class="row form-group">
                                                        <label>Numero de Identidad</label>
                                                        <div class="col col-sm-3"><input type="text" id="txtExpediente" name="text-input" placeholder="Ingrese Valor" class="form-control .col-sm-3" disabled></div>
                                                    </div>
                                                    <br></br>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Codigo de Empleado</label></div>
                                                        <div class="col-12 col-md-9"><input type="text" id="txtCodigo" name="text-input" value="FSDSFDFSDF" class="form-control" disabled></div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nombre Completo</label></div>
                                                        <div class="col-12 col-md-9"><input type="text" id="txtnombre" name="text-input" value="FSDSFDFSDF" class="form-control" disabled></div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Cargo Actual</label></div>
                                                        <div class="col-12 col-md-9"><input type="text" id="txtcargo" name="text-input" value="{{cargo}}" class="form-control" disabled></div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Departamento</label></div>
                                                        <div class="col-12 col-md-9"><input type="text" id="txtdepto" name="text-input" value="{{Depto}}" class="form-control" disabled></div>
                                                    </div>



                                                    <button type="button" onclick="MostrarBusqueda()" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Buscar Empleado</button>

                                                </form>


                                                <div id="arrorvalidacion"></div>
                                            </div>
                                            <!-- PRUEBA-->
                                            <div class="tab-pane fade" id="nav-saldovacaciones" role="tabpanel" aria-labelledby="nav-saldovacaciones-tab">
                                                <div class="row form-group">
                                                    <div class="card-body card-block">
                                                        <form action="index.php?page=Permisos&x=Pdfsaldo&idem={{expedicnte}}" method="post" enctype="multipart/form-data" class="form-horizontal" id="pdform1">
                                                            <div class="row form-group">
                                                               <div class="card-body card-block">
                                                                   <div class="form-group"><label for="exampleInputName2" class="pr-1  form-control-label">Periodo</label></div>
                                                                       <select name="periodoseleccionar" id="periodoseleccionar" class="form-control">
                                                                           <option value="0"  >Selecione Periodo</option>
                                                                           <option value="1111 - 1111">Periodo de Pruebas</option>
                                                                           {{foreach Periodo}}
                                                                           
                                                                           <option>{{periodo}}</option>
                                                                           {{endfor Periodo}}  
                                                                       </select>

                                                                       <div class="form-group"><label for="exampleInputName2" class="pr-1  form-control-label">Jefes</label></div>
                                                                        <select name="jefes" id="jefes" class="form-control">
                                                                            <option value="0"  >Selecione un jefe</option>
                                                                            {{foreach Nombre_Firma}}
                                                                            <option>{{nombrecompleto}}</option>
                                                                            {{endfor Nombre_Firma}}  
                                                                        </select> <br>

                                                                        <div class="table-responsive">
                                                                            <table class="table table-bordered" id="dynamic_field">
                                                                               <tr>
                                                                                <td>OBSERVACIONES</td>
                                                                                <td class="col-md-1" >ACCIONES</td C>
                                                                              <tr>
                                                  
                                                                               
                                                                            </td>
                                                                        
                                                                                
                                                                              </tr>
                                                                            </table>
                                                                             <div>
                                                                                <button type="button" class="btn btn-primary mr-2" onclick="agregarFila()">AGREGAR OBSERVACIÓN </button>
                                                                                
                                                                                 </div>
                                                                            <br>
                                                                        
                                                                            
                                                                            <button type="button" onclick="validarsaldo()" class="btn btn-outline-primary btn-lg btn-block"  >Imprimir PDf</button>
                                                                          </div>
                                                               </div>
                                                           </div>
                                                       </form>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- FIN PRUEBA-->
                                            <!-- FERIADOS-->
                                            
                                            <div class="tab-pane fade" id="nav-feriados" role="tabpanel" aria-labelledby="nav-feriados-tab">
                                                <div class="row form-group">
                                                    <div class="card-body card-block">
                                                        <form method="post" enctype="multipart/form-data" class="form-horizontal" id="form_login">
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Dias</label></div>
                                                                <div class="col-12 col-md-3"> <input id='FechaFeriado' class="form-control" type='date' /><small id="" class="form-text text-muted"></small></div>



                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Observaciones</label></div>
                                                                <div class="col-12 col-md-9"><textarea name="textarea-input" id="ObservacionFeriado" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                                                            </div>
                                                            <button type="button" onclick="BtnFeriado()" class="btn btn-primary btn-lg btn-block">Submit</button>

                                                            <div class="row form-group">


                                                                <h1>{{pruebademensaje}}</h1>

                                                                <table class="table table-striped" id="tablaFeriados" width="100%">

                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">Motivo</th>
                                                                            <th scope="col">Fechas </th>
                                                                            <th scope="col">Accion</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        {{foreach listarfriados}}
                                                                        <tr>
                                                                            <td>{{cDescripcion}}</td>
                                                                            <td>{{cValor}}</td>
                                                                            <td scope="row"><a onclick="EliminarFeriado('{{cValor}}','Feriados','{{cDescripcion}}')" href="#"><i class="fa fa-minus-square"></i> Elimiar</a></td>

                                                                        </tr>
                                                                        {{endfor listarfriados}}
                                                                    </tbody>
                                                                </table>

                                                            </div>














                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                <div class="row form-group">


                                                    <!-- PERIODO-->

                                                    <div class="card-body card-block">
                                                        <form action="index.php?page=Periodo" method="post" enctype="multipart/form-data" class="form-horizontal" id="form_login">
                                                            <div class="row form-group" style="display: none;">
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
                                                                              <option value="1111 - 1111">Periodo de Pruebas</option>
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


                                                                    <div class="col col-md-3"><label for="text-input" ccbxPeriodolass=" form-control-label"></label></div>
                                                                    <div><input type="checkbox" name="cbxDias" id="cbxDias" value="1" checked> Dias Habiles<br></div>
                                                                    <div style="padding-left: 98px;"><input type="checkbox" name="cbxPeriodo" id="cbxPeriodo" value="1"> Inhabilitar Periodo<br></div>




                                                                </div>

                                                            </div>

                                                            <div class="row form-group" id="divRadios">


                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Dias Feriados</label></div>


                                                                <input type="radio" name="num" value="10"> 10<br>
                                                                <input type="radio" name="num" value="15"> 15<br>
                                                                <input type="radio" name="num" value="20"> 20<br>
                                                                <input type="radio" name="num" value="22"> 22<br>

                                                                <input type="radio" name="num" value="30" checked> 30<br>

                                                            </div>

                                                            <div id="boxtext">
                                                                <label class="switch">
                                                                        <input type="checkbox" name="chkTexto" id="chkTexto">
                                                                        <span class="slider round"></span>
                                                                      </label>
                                                            </div>
                                                            <div id="mostrarOpcion" class="col-sm-4" style="display: none">
                                                                <input type="number" name="Dias" id="dias" class="form-control">
                                                            </div>  
                                                            <div id="errorHolder"></div>

                                                            <button type="button" id="btn" name="btn" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Guardar</button>


                                                            <button type="button" id="abrirModal" class="btn btn-danger mb-1" data-toggle="modal" data-target="#staticModal" style="display: none;">
                                                                   Abrir MOdal
                                                               </button>

                                                        </form>


                                                    </div>
                                                </div>
                                            </div>
                                            <!--  FIN PERIODO-->

                                            <!--  PERMISO-->
                                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

                                                <div class="row form-group">
                                                    <div class="card-body card-block">
                                                        <div id="cardModificarpermisos">
                                                            <form action="index.php?page=Permisos" method="post" enctype="multipart/form-data" class="form-horizontal" id="">
                                                                
                                                                <div class="row form-group">
                                                                    
                                                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Dias</label></div>
                                                                    <div class="col-12 col-md-9"> <input id='NuevaHora' class="form-control" type='text' name='Horas' disabled/><small id="" class="form-text text-muted"></small></div>



                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Fecha Inicio</label></div>
                                                                    <div class="col-12 col-md-9"> <input id='NuevaFecha1' class="form-control" type='date' name='NuevaFecha1' /><small id="" class="form-text text-muted"></small></div>



                                                                </div>


                                                                <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Fecha Fin</label></div>
                                                                    <div class="col-12 col-md-9"> <input id='NuevaFecha2' class="form-control" type='date' name='NuevaFecha2' /><small id="" class="form-text text-muted"></small></div>



                                                                </div>

                                                                <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Motivo</label></div>
                                                                    <div class="col-12 col-md-9"> <select id="nuevoMotivo" class="form-control"></select><small id="" class="form-text text-muted"></div>

                                                                    </div>
                                                                        <div class="row form-group">
                                                                            <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Observaciones</label></div>
                                                                            <div class="col-12 col-md-9"><textarea name="NuevaObservacion" id="NuevaObservacion" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                                                                        </div>

                                                                <!-- <div class="row form-group">
                                                                                 <div class="col col-md-3"><label for="select" class=" form-control-label">Motivo de Permiso o Licencia</label></div>
                                                                                 <div class="col-12 col-md-9">
                                                                                     <select name="select" id="selectMotivo" class="form-control">
                                                                                         <option value="0" selected value="0" disabled="">Selecione Motivo</option>
                                                                                         {{foreach Motivo}}
                                                                                         <option value="{{cValor}}">{{cDescripcion}}</option>
                                                                                         {{endfor Motivo}}
                                                                                         
                                                                                     </select>
                                                                                 </div>
                                                                             </div> -->


                                                                <button type="button" onclick="guardarNuevoPermiso()" name="" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Guardar Cambios</button> &nbsp;&nbsp;&nbsp;
                                                                <button type="button" id="BtnCancelarPermisos" name="" class="btn btn-primary"><i class="fa fa-mail-reply-all"></i>&nbsp; Cancelar</button>

                                                            </form>
                                                        </div>
                                                        <div id="cardpermisos">


                                                            <form action="index.php?page=Permisos" method="post" enctype="multipart/form-data" class="form-horizontal" id="form_login">
                                                                <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Periodo</label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select name="chboxPeriodo" id="chboxPeriodo" class="form-control">
                                                                                  <option value="0" selected value="0" disabled="">Selecione su opcion</option>
                                                                                  <option value="1111 - 1111">Periodo de Pruebas</option>
                                                                                {{foreach Periodo}}
                                                                                  <option>{{periodo}}</option>
                                                                                 {{endfor Periodo}}
                                                                           
                                                                              </select>
                                                                    </div>
                                                                </div>


                                                                <div class="row form-group" style="display: none;">
                                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Tipo de Licencia o permiso</label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select name="periodo" id="TipoLicencia" class="form-control">
                                                                             <option value="0" selected value="0" disabled="">Selecione su opción</option>
                                                                           
                                                                            

                                                                             {{foreach Tipo}}  
                                                                             <option value="{{cValor}}">{{cDescripcion}}</option>
                                                                             {{endfor Tipo}} 
                                                                            
                                                                         </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Horas diarias</label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select class="form-control" id="chkdias"><option value="8">Dia Completo</option><option value="4">Medio dia</option></select>

                                                                        <small id="" class="form-text text-muted"></small></div>



                                                                </div>


                                                                <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Fecha Inicio</label></div>
                                                                    <div class="col-12 col-md-9"><input type="date" id="fecha_inicio" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="email-input" class=" form-control-label">Fecha Fin</label></div>
                                                                    <div class="col-12 col-md-9"><input type="date" id="fecha_fin" name="fecha_inicio" placeholder="Enter Email" class="form-control"><small class="help-block form-text"></small></div>
                                                                </div>
                                                                <!-- <div class="row form-group">
                                                                     <div class="col col-md-3"><label for="select" class=" form-control-label">Motivo de Permiso o Licencia</label></div>
                                                                     <div class="col-12 col-md-9">
                                                                         <select name="select" id="selectMotivo" class="form-control">
                                                                             <option value="0" selected value="0" disabled="">Selecione Motivo</option>
                                                                             {{foreach Motivo}}
                                                                             <option value="{{cValor}}">{{cDescripcion}}</option>
                                                                             {{endfor Motivo}}
                                                                             
                                                                         </select>
                                                                     </div>
                                                                 </div> -->

                                                                <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Observaciones</label></div>
                                                                    <div class="col-12 col-md-9"><textarea name="textarea-input" id="Observacion" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Nombre y cargo de quien autoriza</label></div>
                                                                    <div class="col-12 col-md-9"><input type="text" id="Atorizador" name="disabled-input" placeholder="Escriba el nombre" class="form-control"></div>
                                                                </div>
                                                                <h1 style="display: none;" id="pruebapermiso1"></h1>
                                                                <h1 style="display: none;" id="pruebapermiso2"></h1>
                                                                <h1 style="display: none;" id="pruebapermiso3"></h1>
                                                                <div id="errorHolder"></div>

                                                                <button type="button" id="btnGuardarPermiso" name="btn" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Guardar</button>

                                                                <button type="button" id="btnNuevo" name="btnNuevo" class="btn btn-primary"><i class="fa fa-mail-reply-all"></i>&nbsp;Buscar Nuevo</button>

                                                            </form>
                                                        </div>
                                                        <!-- fin card Permisos-->

                                                    </div>
                                                </div>

                                                <div class="card">

                                                    {{if OptenerPermisos}}


                                                    <h1>{{OptenerPermisos}}</h1>


                                                    {{endif OptenerPermisos}}
                                                    <div class="card-header">
                                                        <strong class="card-title"></strong>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table-striped" id="tablaPeriodo" width="50%" height="300px">

                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Licencia</th>
                                                                    <th scope="col">Periodo </th>
                                                                    <th scope="col">Disponible</th>
                                                                    <th scope="col">Opciones</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                {{foreach datosPermiso}}
                                                                <tr>
                                                                    <td scope="row"><button type="button" onclick="HistoricoPeriodo('{{PeriodoId}}')" class="btn btn-link btn-sm "><span class="ti-search">&nbsp; {{Tipo}}</span></button></td>
                                                                    <td>{{Periodo}}</td>
                                                                    <td>{{disponible}}</td>
                                                                    <td scope="row"><button type="button" onclick="EditarDias('{{PeriodoId}}')" class="btn btn-warning btn-sm">EDITAR</button></td>

                                                                </tr>
                                                                {{endfor datosPermiso}}
                                                            </tbody>
                                                        </table>
                                                        <div id="idtablaPermisos">

                                                            {{if mmm}}
                                                            <h1>{{mmm}}</h1>
                                                            {{endif mmm}}

                                                        </div>

                                                        <div class="DivDias" style="display: none;">
                                                            <form action="" >
                                                                <label for="">Dias</label>
                                                                <input type="text" name="diasvacaciones" id="diasvacaciones" > <br> </br>
                                                                
                                                                <button type="button" onclick="guardarNuevosDias()" name="" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Guardar Cambios</button> &nbsp;&nbsp;&nbsp;
                                                                <button type="button" onclick="retocederDias()"  class="btn btn-primary"><i class="fa fa-mail-reply"></i>&nbsp;</button>
                                                                
            
                                                            </form>

                                                        </div>
                                                        
                                                        <div>
                                                            <table class="table table-striped " id="tablaPermisos" width="50%" height="300px" style="display: none;">

                                                                <thead id="DivtablaPermisos">
                                                                    <tr>
                                                                        <th scope="col">Motivo</th>
                                                                        <th scope="col">Desde</th>
                                                                        <th scope="col">Hasta</th>
                                                                        <th scope="col">Dias</th>
                                                                        <th scope="col">Accion</th>

                                                                    </tr>
                                                                    {{foreach OptenerPermisos}}

                                                                    <tr>
                                                                        <td>{{Mot}}</td>
                                                                        <td>{{fDesde}}</td>
                                                                        <td>{{fHasta}}</td>
                                                                        <td>{{dias}}</td>
                                                                        <td><button type="button" onclick="editarPermisos('{{cPermisoId}}','{{Desde}}','{{Hasta}}')" class="btn btn-warning btn-sm">Editar</button></td>


                                                                    </tr>

                                                                    {{endfor OptenerPermisos}}
                                                                </thead>


                                                            </table>
                                                           
                                                        </div>
                                                        <center style="display:none" id="MOtrarBotonRetroceso">
                                                            <button type="button" onclick="retocederDias()" class="btn btn-primary"><i class="fa fa-mail-reply"></i>&nbsp;</button>
                                                        </center>

                                                        
                                                    </div>

                                                  
                                                    


                                                </div>

                                                 

                                                
                                            </div>
                                            <!-- FIN PERMISO-->

                                            <!--Borra Periodo-->
                                            <div class="tab-pane fade" id="nav-BorarPeriodo" role="tabpanel" aria-labelledby="nav-BorarPeriodo-tab">

                                                <div class="row form-group">
                                                    <div class="card-body card-block">
                                                        <form action="index.php?page=Periodo" method="post" enctype="multipart/form-data" class="form-horizontal" id="form_login">
                                                            <div class="row form-group">


                                                            </div>


                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="select" class=" form-control-label">Periodo</label></div>
                                                                <div class="col-12 col-md-9">
                                                                    <select name="chboxPeriodo" id="chboxPeriodoOpcion" class="form-control">
                                                                                    <option value="0" selected value="0" disabled="">Selecione su opcion</option>
                                                                                    <option value="1111 - 1111">Periodo de Pruebas</option>
                                                                                  {{foreach Periodo}}
                                                                                    <option>{{periodo}}</option>
                                                                                   {{endfor Periodo}}
                                                                                   
                                                                                </select>
                                                                </div>
                                                            </div>







                                                            <div id="errorHolder"></div>

                                                            <button type="button" id="btnAliminarPeriodo" name="btnAliminarPeriodo" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Guardar</button>


                                                            <button type="button" id="abrirModal" class="btn btn-danger mb-1" data-toggle="modal" data-target="#staticModal" style="display: none;">
                                                                          Abrir MOdal
                                                                      </button>

                                                        </form>
                                                    </div>

                                                </div>
                                            </div>

                                            <!-- FIn Borar Periodo-->
                                            <!-- INICIO BORAR PERMISO-->
                                            <div class="tab-pane fade" id="nav-BorarPermiso" role="tabpanel" aria-labelledby="nav-BorarPermiso-tab">

                                                <div class="row form-group">
                                                    <div class="card-body card-block">
                                                        <form action="index.php?page=Periodo" method="post" enctype="multipart/form-data" class="form-horizontal" id="form_login">
                                                            <div class="row form-group">


                                                                <div class="card-body card-block">
                                                                    <form action="#" method="post" class="form-inline" >
                                                                        <div class="form-group"><label for="exampleInputName2" class="pr-1  form-control-label">Periodo</label>
                                                                            <div id="idlist">
                                                                                <select id="ListarPeriodoEmpleado" class="form-control">
                                                                                                                    <option value="0" selected value="0" disabled="">Selecione Periodo</option>
                                                                                                                    <option value="1111 - 1111">Periodo de Pruebas</option>
                                                                                                                    {{foreach ListarPeriodoEmpleado}}
                                                                                                                    <option value="{{cPermisoId}}">{{cPeriodo}}</option>
                                                                                                                   
                                                                                                                    {{endfor ListarPeriodoEmpleado}}
                                                                                                                    
                                                                                                                   
                                                                                                                </select>
                                                                            </div>

                                                                        </div>
                                                                        <div class="form-group"><label for="exampleInputEmail2" class="px-1  form-control-label">Permisos</label><select id="chkPermisos" placeholder="" required="" class="form-control"></select></div>
                                                                        <center>
                                                                            <button type="button" id="BtnGuardarAnularPermiso" class="btn btn-primary btn-lg btn-block">Aceptar</button>
                                                                        </center>

                                                                    </form>
                                                                </div>



                                                            </div>

                                                            
                                    
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- FIN BORAR PERMISO-->


                                          <!-- INICIO DE REPORTE DE VACACIONES-->
                                          <div class="tab-pane fade" id="nav-vacaciones" role="tabpanel" aria-labelledby="nav-vacaciones-tab">
                                            <div class="row form-group">
                                                <div class="card-body card-block">
                                                    <form action="index.php?page=Permisos&x=PdfPermisos&idem={{expedicnte}}" method="post" enctype="multipart/form-data" class="form-horizontal" id="pdform">
                                                        <div class="row form-group">
                                                            <div class="card-body card-block">
                                                                
                                                                    <div class="form-group"><label for="exampleInputName2" class="pr-1  form-control-label">Opciones</label>
                                                                        <div id="idlist">
                                                                            
                                                                            
                                                                            
                                                                            <select name="ListarPeriodoEmpleado1"  id="ListarPeriodoEmpleado1" onchange="CambioPeriodo()"  class="form-control">
                                                                                
                                                                                <option value="0" selected >Selecione Periodo</option>
                                                                                <option value="1" value="1">Un Periodo</option>
                                                                                <option value="2" value="2">Varios Periodos</option>
                                                                            </select>
                                                                        </div> <br>

                                                                      

                                                                        <div id="idlistunico" style="display: none;">
                                                                            <div class="form-group"><label for="exampleInputName2" class="pr-1  form-control-label">Periodo</label>
                                                                                <select name="ListarPeriodoEmpleado2" id="ListarPeriodoEmpleado2"  class="form-control">
                                                                                    
                                                                                   
                                                                                    {{foreach Periodo}}
                                                                                    <option>{{periodo}}</option>
                                                                                   
                                                                                    {{endfor Periodo}}   
                                                                            </select>
                                                                        </div>
                                                                    </div> 
                                                                    <div class="form-group"><label for="exampleInputName2" class="pr-1  form-control-label">Seleccione Jefes</label>
                                                                    <select name="jefes1" id="jefes1" class="form-control">
                                                                        <option value="0"  >Selecione un jefe</option>
                                                                        {{foreach Nombre_Firma}}
                                                                        <option>{{nombrecompleto}}</option>
                                                                        {{endfor Nombre_Firma}}  
                                                                    </select> <br>
                                                                    <div id="variosperiodos" style="display: none;">
                                                                        <div required class="form-group"><label for="exampleInputName2" class="pr-1  form-control-label">Periodo</label>
                                                                             <select   id="idvariosperiodos" name="idvariosperiodos[]" data-placeholder="Seleccione los periodos" multiple class="standardSelect">
                                                                                {{foreach Periodo}}
                                                                                <option value="{{periodo}}">{{periodo}}</option>
                                                                                {{endfor Periodo}}   
                                                                            </select>
                                                                                
                                                                    </div>
                                                                </div> 

                                                                    
                                                                   
                                                                    <center>
                                                                        
                                                                        <button type="button"  id="habilitar1" class="btn btn-outline-primary btn-lg btn-block"  disabled >Imprimir PDf</button>
                                                                    </center>
                                                                
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- FIN DE REPORTE DE VACACIONES-->


                                        </div>

                                    </div>
                                     
                                </div>
                                
                            </div>
                        </div>


                    </section>

                </div>


                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <h4 class="modal-title">Modal with Dynamic Content</h4>
                            </div>
                            <div class="modal-body">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>

function agregarFila(){
document.getElementById("dynamic_field").insertRow(-1).innerHTML = '<td><textarea id="CAI[]" name="CAI[]" placeholder="AGREGAR OBSERVACIÓN "  class="form-control"></textarea> </td> <td><input style=" text-aling:center" type="button" class="borrar btn btn-danger btn_remove" value="Eliminar" </td>        ';
}
$(document).on('click', '.borrar', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
});


function validarsaldo() {
    let periodo= document.getElementById('periodoseleccionar').value;
    let jefes= document.getElementById('jefes').value;
   if( periodo==0 || jefes==0 ){
    toastr.error("Campos vacios");
   }else{
    $('#pdform1').submit();
   }
}
function CambioPeriodo() {
    var id= document.getElementById('ListarPeriodoEmpleado1').value;
   
    if(id==0){
        $('#idlistunico').hide();
        $('#variosperiodos').hide();
        document.getElementById("habilitar1").disabled=true;
       
    }
    if(id==1){
        $('#idlistunico').show();
        $('#variosperiodos').hide();
        document.getElementById("habilitar1").disabled=false;
        
    }if(id==2){
        $('#variosperiodos').show();
        $('#idlistunico').hide();
        document.getElementById("habilitar1").disabled=false;
    }
    
}

                    $.post("index.php?page=Permisos", {
                        op: "ValidarUsuarioLogeado"
                    }, function(htmlexterno) {
                        if (htmlexterno == false) {
                            toastr.error('NO cuenta con los privilegios para este Formulario', 'Error');
                            window.location.href = 'index.php?page=home';

                        }

                    });
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
                    $(document).ready(function() {
            $('#habilitar1').click(function() {
                var item = [];
                var opcion = $('#ListarPeriodoEmpleado1').val();
                var opcion2 = $('#ListarPeriodoEmpleado2').val();
                var opcion3 = $('#jefes1').val();
  
                
                $('#idvariosperiodos').each(function() {
                    item.push($(this).val());
                });

                if(item=='' &&  opcion2 !='' && opcion==2 ){
                toastr.error("Campo varios periodos vacio");

             }else if(opcion3==0){
                toastr.error("Campo Jefe Vacio");
             }

            
               else{
                  $('#pdform').submit();
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


                    $('#BtnCancelarPermisos').click(function() {
                        $('#cardpermisos').show();
                        $('#card').show();
                        $('#tablaPermisos').show();
                        $('#MOtrarBotonRetroceso').show();
                        $('#cardModificarpermisos').hide();
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
                            var jsonValores = {
                                anteriorpsq,
                                nuevapsq,
                                Confirmarpsq
                            };


                            $.post("index.php?page=Permisos", {
                                    Password: jsonValores,
                                    op: "CambiarClave"
                                })
                                .done(function(data) {
                                    var mostrar = JSON.parse(data);
                                    console.log(data);
                                    if (mostrar.mensaje == 'ok') {
                                        alert('Actualizado con exito. debe iniciar sesion');
                                        location.href = "index.php";
                                    }

                                });
                        }





                    });

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
                    $('#btnGuardarPermiso').click(function() {
                        document.getElementById("btnGuardarPermiso").disabled = true;
                        var OpcionPeriodo = $('#chboxPeriodo').val();
                        var OpcionTipoLicencia = $('#TipoLicencia').val();
                        var CatidadHoras = $('#chkdias').val();

                        var FechaInicio = $('#fecha_inicio').val();
                        var FechaFin = $('#fecha_fin').val();
                        var MotivoLicencia = 'Vacaciones';
                        var OpcionPeriodo = $('#chboxPeriodo').val();
                        var Observacion = $('#Observacion').val();
                        var nombreAutorizacion = $('#Atorizador').val();


                        jsondatos = {
                            OpcionPeriodo,
                            OpcionTipoLicencia,
                            CatidadHoras,
                            FechaInicio,
                            FechaFin,
                            MotivoLicencia,
                            OpcionPeriodo,
                            Observacion,
                            nombreAutorizacion
                        };


                        $.post("index.php?page=Permisos", {
                                jsondatos: jsondatos,
                                op: "IngresoPeriodoNuevo"
                            })
                            .done(function(response) {
                                var DatosNuevoPermiso = JSON.parse(response);



                                if (DatosNuevoPermiso.mensaje == 0) {
                                    toastr.success("Permiso Ingresado con exito");
                                    $('#tablaPeriodo').load('index.php?page=Permisos #tablaPeriodo');
                                    document.getElementById("btnGuardarPermiso").disabled = false;
                                } else {
                                    toastr.error(DatosNuevoPermiso.mensaje);
                                    document.getElementById("btnGuardarPermiso").disabled = false;
                                }

                            });





                    });
                    $('#btnAliminarPeriodo').click(function() {
                        var opcion = $('#chboxPeriodoOpcion').val();
                        document.getElementById("btnAliminarPeriodo").disabled = true;
                        if (opcion == null) {
                            document.getElementById("btnAliminarPeriodo").disabled = false;


                            toasterOptions();

                            toastr.error("Seleccione periodo");

                        } else {
                            $.post("index.php?page=Permisos", {
                                    OpAnular: opcion,
                                    op: "AnularPeriodo"
                                })
                                .done(function(respuesta) {
                                    var DatosConsultaAnular = JSON.parse(respuesta);
                                    if (DatosConsultaAnular.Estado == 0) {
                                        toastr.error("Error al Eliminar Periodo, verifique que el periodo exista");
                                        document.getElementById("btnAliminarPeriodo").disabled = false;
                                    }

                                    if (DatosConsultaAnular.Estado == 2) {
                                        toastr.error("Oop, Error al guardar Cambios");
                                        document.getElementById("btnAliminarPeriodo").disabled = false;
                                    }
                                    if (DatosConsultaAnular.Estado == 1) {
                                        toastr.success("Anulado Con Exito");
                                        document.getElementById("btnAliminarPeriodo").disabled = false;
                                    }





                                });
                        }

                    });


                    $('#nav-BorarPermiso-tab').click(function() {
                        $('#idlist').load('index.php?page=Permisos #ListarPeriodoEmpleado');
                        $('#chkPermisos').val('');
                    });


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
                        $('#num25').attr('chMensajedeEditarecked', false);
                    });
                    $("#boxtext input[name='chkTexto']").click(function(event) {
                        if ($('input:checkbox[name=chkTexto]:checked').val() == 'on') {
                            $('#mostrarOpcion').show();
                        } else {
                            $('#mostrarOpcion').hide();
                            $('#dias').val('');
                        }


                    });
                    $("#divRadios input[name='cbox1']").click(function(event) {
                        $('#cbox2').attr('checked', false);
                        $('#cbox2').val('');
                        $('#cbox1').val('AM');
                    });
                    $("#divRadios input[name='cbox2']").click(function(event) {
                        $('#cbox1').attr('checked', false);
                        $('#cbox1').val('');
                        $('#cbox2').val('PM');
                    });


                    $('#idlist').change(function() {
                        var P = $('#ListarPeriodoEmpleado').val();

                        $.post("index.php?page=Permisos", {
                            op: "ListadePermisos",
                            periodo: P
                        }, function(data) {
                            $('#chkPermisos').empty();
                            $('#chkPermisos').append(data);








                        });
                    });

                    function EliminarFeriado(valor, feriado, Descripcion) {
                        $.post("index.php?page=Permisos", {
                            valor: valor,
                            feriado: feriado,
                            Descripcion: Descripcion,
                            op: "EliminarFeriado"
                        }, function(response) {
                            if (response == 1) {
                                toastr.success("Feriado " + Descripcion + " ingresado con exito", "mensaje");
                            } else if (response == 0) {
                                toastr.error("Oops, error al Eliminar feriado", "error");
                            }
                            $("#tablaFeriados").load("index.php?page=Permisos #tablaFeriados");
                        });
                    }
                    function EditarDias(periodo) {
                   
                   $('#tablaPeriodo').hide();
                   $('.DivDias').show();   
                  
                   

                   
                   $.post("index.php?page=Permisos", {
                                   periodo: periodo,
                                   op: "verDias"
                               }, function(htmlexterno) {
                var json = JSON.parse(htmlexterno);

                $('#diasvacaciones').val(json[0]['disponibilidad']);


                    })
                              
                   

                   
                  }

                function guardarNuevosDias(periodo) {
                var nuevodia =$('#diasvacaciones').val();
                
                   
              
                $.post("index.php?page=Permisos", {
                op: "Modificardias",
                periodo: periodo,
                nuevodia:nuevodia
                }, function(response) {
                    if(response==0 ){
                        toastr.success("Dias Actualizado con exito ");
                        $('#tablaPeriodo').load('index.php?page=Permisos #tablaPeriodo');
                        $('.DivDias').hide();   
                        $('#tablaPeriodo').show();
                    }else{
                        toastr.error(response);
                    }
                    

            
                 });

            }
                    function BtnFeriado() {
                        var feriado = $('#FechaFeriado').val();
                        var observacion = $('#ObservacionFeriado').val();

                        if (feriado == '' || observacion == '') {
                            toastr.error("No deje campos vacios", "Error");
                        } else {
                            $.post("index.php?page=Permisos", {
                                fechaferiado: feriado,
                                observacion: observacion,
                                op: "NuevoFeriado"
                            }, function(response) {

                                if (response == 1) {
                                    toastr.success("Ingresado con exito", "mensaje");
                                    $('#FechaFeriado').val('');
                                    $('#ObservacionFeriado').val('');

                                } else if (response == 2) {
                                    toastr.error("Oops, error al ingresar feriado", "error");
                                } else if (response == 3) {
                                    toastr.error("Ya existe un Feriado con esa fecha");
                                }


                                console.log(response);

                            });
                        }


                        $("#tablaFeriados").load("index.php?page=Permisos #tablaFeriados");
                    }

                    $('#BtnGuardarAnularPermiso').click(function() {

                        document.getElementById("BtnGuardarAnularPermiso").disabled = true;
                        var permisoId = $('#chkPermisos').val();
                        var periodoId = $('#ListarPeriodoEmpleado').val();
                        var cPermiso= $('#ListarPeriodoEmpleado option:selected').text();
                       
                         
                        if (periodoId == null || periodoId == null) {
                            toastr.error("No deje campos vacios", "Error");
                            document.getElementById("BtnGuardarAnularPermiso").disabled = false;
                        } else {
                            $.post("index.php?page=Permisos", {
                                op: "BorrarPermisos",
                                permisoId: permisoId,
                                periodoId: periodoId,
                                cPermiso:cPermiso
                            }, function(respuesta) {



                                if (respuesta == 0) {
                                    toastr.success("Anulado Con Exito");
                                    $('#idlist').load('index.php?page=Permisos #ListarPeriodoEmpleado');
                                    $('#chkPermisos').val('');
                                    document.getElementById("BtnGuardarAnularPermiso").disabled = false;
                                } else {
                                    toastr.error(respuesta);
                                    document.getElementById("BtnGuardarAnularPermiso").disabled = false;

                                }





                            });
                        }








                    });


                    $().ready(function(e) {
                        $("#BtnBuscar").on('click', onClickHandlers);
                    });

                    function onClickHandlers(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        var opcion = $("#txtopcion").val();
                        var valor = $("#txtvalor").val();



                        var errores = [];
                        if (opcion == '') {
                            errores.push("<div class='alert alert-primary' role='alert'> Seleccione opcion</div>");
                        }
                        if (opcion == null) {
                            errores.push("<div class='alert alert-primary' role='alert'> selecciones opcion</div>");
                        }
                        if (valor == null) {
                            errores.push("<div class='alert alert-primary' role='alert'>Ingrese valor</div>");
                        }
                        if (valor == '') {
                            errores.push("<div class='alert alert-primary' role='alert'>Ingrese valor</div>");
                        }


                        if (errores.length) {
                            var errorBuffers = "<ul>";
                            errorBuffers += errores.map(function(errores, i) {
                                return errores
                            }).join('');
                            errorBuffers += "</ul>";
                            $("#arrorvalidacion").html(errorBuffers)
                        } else {
                            $("#arrorvalidacion").html("");
                            $('#form1').submit();




                        }
                    }
                    $().ready(function(e) {
                        $("#BtnPermisos").on('click', onClickPermisos);
                    });

                    function onClickPermisos(e) {
                        $('#target').show();
                        $('#target2').hide();
                        $('#target3').hide();
                    }

                    $().ready(function(e) {
                        $("#btnNuevo").on('click', onClickNuevo);
                    });

                    function onClickNuevo(e) {


                        $('#target').hide();
                        $('#target2').show();
                        $('#target3').hide();


                    }




                    var emailValidator = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    $().ready(function(e) {
                        $("#btn").on('click', onClickHandler);
                    });

                    function onClickHandler(e) {
                        e.preventDefault();
                        e.stopPropagation();



                        document.getElementById("btn").disabled = true;
                        var valor = $('input:radio[name=num]:checked').val();

                        var tipo = $("#tipo").val();
                        var periodo = $("#periodo").val();
                        var cbox1 = $("#cbxDias").val();
                        var cbox2 = $("#cbxPeriodo").val();

                        if (cbox1 != 1) {
                            cbox1 = 0;
                        }
                        if (cbox2 != 1) {
                            cbox2 = 0;
                        }

                        var validarcbx = cbox1 + cbox2;
                        var txtDias = $('#dias').val();
                        if (txtDias == '') {
                            Dias = valor;
                        } else {
                            Dias = txtDias;
                        }

                        var Horas = $("#Horas").val();
                        var json = {
                            tipo,
                            periodo,
                            cbox1,
                            cbox2,
                            Dias
                        };

                        var errors = [];
                        if (Horas == 0) {
                            errors.push("<divdiv class='alert alert-primary' role='alert'>Horas Diarias vacio</div>");
                            document.getElementById("btn").disabled = false;

                        }
                        if (tipo == null) {
                            errors.push("<div class='alert alert-primary' role='alert'> Tipo de permiso vacio</div>");
                            document.getElementById("btn").disabled = false;
                        }
                        if (periodo == null) {
                            errors.push("<div class='alert alert-primary' role='alert'>Seleccione periodo</div>");
                            document.getElementById("btn").disabled = false;
                        }




                        if (errors.length) {
                            var errorBuffer = "<ul>";
                            errorBuffer += errors.map(function(error, i) {
                                return error
                            }).join('');
                            errorBuffer += "</ul>";
                            $("#errorHolder").html(errorBuffer)
                        } else {
                            $("#errorHolder").html("");
                            $.post("index.php?page=Permisos", {
                                    valDatosPermisol: json,
                                    op: "IngresoPeriodo"
                                })
                                .done(function(respuesta) {
                                    console.log(respuesta);

                                  var mostarRespuesta = JSON.parse(respuesta);
                                    console.log(mostarRespuesta.Estado);
                                    if (mostarRespuesta.Estado == 0) {
                                        toastr.success("Guardado Con Exito");
                                        document.getElementById("btn").disabled = false;
                                    }else if(mostarRespuesta.Estado == 2) {
                                        toastr.error("Este periodo ya existe");
                                        document.getElementById("btn").disabled = false;
                                    }else  {
                                        

                                        toastr.error("Error al insertar datos");
                                        toastr.error(mostarRespuesta.Estado);
                                        document.getElementById("btn").disabled = false;
                                    }
                                });

                            console.log(JSON.stringify(json));




                        }
                    }
                </script>
                <!-- Peticiones ajax-->

                <script>
                    function MostrarBusqueda() {
                        $('#target2').show();
                        $('#target').hide();
                        $('#target3').hide();
                    }

                    function HistoricoPeriodo(periodo) {



                        $('#tablaPeriodo').hide();

                        $('#MOtrarBotonRetroceso').show();

                        $('#tablaPermisos').show();






                        const string4 = encode(periodo);



                        $("#DivtablaPermisos").load("index.php?page=Permisos&z=2&periodo=" + string4 + " #DivtablaPermisos");






                    }
                

                    

                    function encode(str) {
                        var encoded = "";
                        for (i = 0; i < str.length; i++) {
                            var a = str.charCodeAt(i);
                            var b = a ^ 123;
                            encoded = encoded + String.fromCharCode(b);
                        }
                        return encoded;
                    }

                    function retoceder() {
                        $('#tablaPeriodo').show();
                        $('#tablaPermisos').hide();
                        $('#MOtrarBotonRetroceso').hide();

                        $('#tablaPermisos td').remove();

                    }
                    function retocederDias() {
                        $('#tablaPeriodo').show();
                        $('#tablaPermisos').hide();
                        $('#MOtrarBotonRetroceso').hide();

                        $('.DivDias').hide();  
                    }

                    function editarPermisos(mot, desde, hasta) {
                        console.log(mot);
                        var fecha1 = encode(desde);
                        var fecha2 = encode(hasta);
                        var periodo = encode(mot);
                        $('#pruebapermiso3').text(periodo);


                        $('#cardpermisos').hide();
                        $('#card').hide();
                        $('#tablaPermisos').hide();
                        $('#MOtrarBotonRetroceso').hide();
                        $('#cardModificarpermisos').show();





                        $.post("index.php?page=Permisos", {
                            op: "MostrarPermisosAmodificar",
                            periodo: periodo,
                            fecha1: fecha1,
                            fecha2: fecha2
                            
                            
                            
                            
                        }, function(htmlexterno) {



                            var json = JSON.parse(htmlexterno);

                            $('#NuevaHora').val(json[0]['dias']);
                            $('#NuevaFecha1').val(json[0]['fDesde']);
                            $('#NuevaFecha2').val(json[0]['fHasta']);
                            $('#nuevoMotivo').append('<option>Vacaciones</option><option>Salud</option><option>Duelo</option><option>Estudios</option><option>Personal</option><option>Nupcias</option>');
                            $('#NuevaObservacion').val(json[0]['observaciones']);

                        });




                    }
                    

                    function guardarNuevoPermiso() {

                        var fecha_inicio = $('#NuevaFecha1').val();
                        var fecha_fin = $('#NuevaFecha2').val();
                        var Motivo = $('#nuevoMotivo').val();
                        var Observacion =$('#NuevaObservacion').val();
                        
                        $.post("index.php?page=Permisos", {
                            op: "ModificarPermisos",
                            fechaInicio: fecha_inicio,
                            fechaFin: fecha_fin,
                            Motivo: Motivo,
                            Observacion:Observacion
                        }, function(response) {

                            MensajedeEditar(response);
                        });

                    }


                    $('#nav-contact-tab').click(function() {
                        $('#tablaPeriodo').load('index.php?page=Permisos #tablaPeriodo');
                        $('#cardpermisos').show();
                        $('#tablaPeriodo').show();
                        $('#card').show();
                        $('#tablaPermisos').hide();
                        $('#MOtrarBotonRetroceso').hide();
                        $('#cardModificarpermisos').hide();



                    });

                    function MensajedeEditar(response) {
                        $('#tablaPeriodo').load('index.php?page=Permisos #tablaPeriodo');
                        if (response == 1) {
                            toastr.success("Permiso actualizado Con Exito");
                            $('#cardpermisos').show();
                            $('#tablaPeriodo').show();
                            $('#card').show();
                            $('#tablaPermisos').hide();
                            $('#MOtrarBotonRetroceso').hide();
                            $('#cardModificarpermisos').hide();

                        } else {
                            toastr.error(response, "Oops");
                        }
                    }

                    function myFunction(valor) {
                        
                        $.post("index.php?page=Permisos", {
                                vall: valor,
                                op: "ver"
                            })
                            .done(function(data) {
                                var datos = JSON.parse(data);

                                $('#txtExpediente').val(datos.Expediente);
                                $('#txtnombre').val(datos.nombre + ' ' + datos.apellido);
                                $('#txtCodigo').val(datos.Codigo);

                                $('#txtcargo').val(datos.cargo);
                                $('#txtdepto').val(datos.departamento);
                                $('#labelEstado').html(datos.estado);


                                $('#target2').hide();
                                $('#target').hide();
                                $('#target3').show();
                            });
                    }
                </script>

                <script type="text/javascript">
                    $('#target').hide();
                    $('#target3').hide();
                    $('#target2').show();
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