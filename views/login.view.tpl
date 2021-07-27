<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Login Page - Ace Admin</title>

    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="./assetss/css/bootstrap.css" />
    <link rel="stylesheet" href="./assetss/css/font-awesome.css" />

    <!-- text fonts -->
    <link rel="stylesheet" href="./assetss/css/ace-fonts.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="./assetss/css/ace.css" />

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="./assetss/css/ace-part2.css" />
    <![endif]-->
    <link rel="stylesheet" href="./assetss/css/ace-rtl.css" />

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="./assetss/css/ace-ie.css" />
    <![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="./assetss/js/html5shiv.js"></script>
    <script src="./assetss/js/respond.js"></script>
    <![endif]-->
  <script src="./js/jquery-3.1.1.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <script src="./js/material.min.js"></script>
  <script src="./js/ripples.min.js"></script>
  <script src="./js/sweetalert2.min.js"></script>
  <script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="./js/main.js"></script>
  </head>

  <body class="login-layout light-login">
    <div class="main-container">
      <div class="main-content">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1">
            <div class="login-container">
              <div class="center">
              <img src="./img/9.png" style=" width:100%;";align="center">
                  
              </div>

              <div class="space-6"></div>

              <div class="position-relative">
                <div id="login-box" class="login-box visible widget-box no-border">
                  <div class="widget-body">
                    <div class="widget-main">
                      <h4 class="header blue lighter bigger">
                        <i class="glyphicon glyphicon-lock"></i>
                        Ingrese sus Datos
                      </h4>

                      <div class="space-6"></div>
                      
                    <form method="post" action="index.php?page=login" id="form_login">
                      <h1>holalalala</h1>
                        <fieldset>
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="text" id="Codigo" name="Codigo"class="form-control" placeholder="Codigo de Empleado" ></input>
                              <i class="ace-icon fa fa-user"></i>
                            </span>
                          </label>

                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                            <input type="password" id="passwd" name="passwd" value="" class="form-control" placeholder="contraseña" ></input>
                              <i class="ace-icon fa fa-lock"></i> 
                     
                              
                            </span>
                          </label>
                          <label class="block clearfix">
                            
                            <input type="checkbox" onclick="MOtrarcontra()" > Mostrar contraseña </input>
                           
                              
                            </span>
                          </label>
                          <div class="space"></div>

                          <div class="clearfix">
                            

                         
                           <button name="btnLogin" id="btnLogin" class="width-35 pull-right btn btn-sm btn-primary">
                              <i class="ace-icon fa fa-key"></i>
                              <span class="bigger-110">Iniciar </span>
                            </button>
                          </div>

                          <div class="space-4"></div>
                        </fieldset>
                      </form>
                      <div id="errorHolder" class="danger"/>
                      <p>{{texto}}</p>
                
                   
                 <script>
function MOtrarcontra(){
  var tipo = document.getElementById("passwd");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
}
    var emailValidator = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    $().ready(function(e){
        $("#btnLogin").on('click',onClickHandler);
      });
      function onClickHandler(e){
        e.preventDefault();
        e.stopPropagation();
        var codigo = $("#Codigo").val();
        var passwd = $("#passwd").val();
        var errors = [];
        if(codigo==''){
          errors.push("Codigo de empleado vacios");
        }
        if(passwd==''){
          errors.push("Contraseñia Vacia");
        }

        if(errors.length){
          var errorBuffer="<ul>";
          errorBuffer += errors.map(function(error,i){
            return '<li>'+error+'</li>'
            }).join('');
          errorBuffer += "</ul>";
          $("#errorHolder").html(errorBuffer)
        }else{
          $("#errorHolder").html("");
          $("#form_login").submit();
          
        }
      }
</script>

                    

              </div><!-- /.position-relative -->

            
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.main-content -->
    </div><!-- /.main-container -->

    <!-- basic scripts -->

    <!--[if !IE]> -->
   

    <!-- inline scripts related to this page -->
    <script type="text/javascript">
      jQuery(function($) {
       $(document).on('click', '.toolbar a[data-target]', function(e) {
        e.preventDefault();
        var target = $(this).data('target');
        $('.widget-box.visible').removeClass('visible');//hide others
        $(target).addClass('visible');//show target
       });
      });
      
      
      
      //you don't need this, just used for changing background
      jQuery(function($) {
       $('#btn-login-dark').on('click', function(e) {
        $('body').attr('class', 'login-layout');
        $('#id-text2').attr('class', 'white');
        $('#id-company-text').attr('class', 'blue');
        
        e.preventDefault();
       });
       $('#btn-login-light').on('click', function(e) {
        $('body').attr('class', 'login-layout light-login');
        $('#id-text2').attr('class', 'grey');
        $('#id-company-text').attr('class', 'blue');
        
        e.preventDefault();
       });
       $('#btn-login-blur').on('click', function(e) {
        $('body').attr('class', 'login-layout blur-login');
        $('#id-text2').attr('class', 'white');
        $('#id-company-text').attr('class', 'light-blue');
        
        e.preventDefault();
       });
       
      });
    </script>


  </body>
</html>
