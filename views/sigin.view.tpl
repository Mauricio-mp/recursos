<form method="post" action="index.php?page=signin" id="form_sigin">
  <fieldset>
    <label>Correo Electrónico</label>
    <input type="email" id="email" name="email" value="{{email}}" placeholder="Correo Electrónico" />
  </fieldset>
  <fieldset>
    <label>Contraseña</label>
    <input type="password" name="password" id="password" value="" placeholder="Contraseña" />
  </fieldset>
  <fieldset>
    <label>Validar Contraseña</label>
    <input type="password" name="password2" id="password2" value="" placeholder="Validar Contraseña" />
  </fieldset>
  <button name="btnRegistrar" id="btnRegistrar">Crear Cuenta</button>
</form>
<div id="errorHolder" class="danger"/>
<script>
    var emailValidator = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var passwordValidator = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/;
    $().ready(function(e){
        $("#btnRegistrar").on('click',onClickHandler);
      });
      function onClickHandler(e){
        e.preventDefault();
        e.stopPropagation();
        var emailValue = $("#email").val();
        var errors = [];
        if(!emailValidator.test(emailValue)){
          errors.push("Correo Electrónico no es válido");
        }
        var passwordValue= $("#password").val();
        var password2Value = $("#password2").val();
        if(!passwordValidator.test(passwordValue)){
          errors.push("Contraseña debe tener almenos 8 caracteres, un número, una mayúscula y un caracter especial.");
        }else{
          if(passwordValue !== password2Value){
            errors.push("Las contraseñas no coinciden");
          }
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
          $("#form_sigin").submit();
        }
      }
</script>
