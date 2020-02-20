<!DOCTYPE html>
<html>
<head>
  <title></title>
  <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
         
</head>
<body>
<div class="container" style="padding-top: 50px">
  <div class="row">
    <h4>Registro de usuario</h4>
  </div>
  <div class="row">
      <form class="col s12" id="create_user" action="/register" method="POST">
        @csrf
        <div class="row">
          <div class="input-field col s6">
            <input id="first_name" name="first_name" type="text" class="validate" autocomplete="off">
            <label for="first_name">Nombre</label>
          </div>
          <div class="input-field col s6">
            <input id="last_name" name="last_name" type="text" class="validate" autocomplete="off">
            <label for="last_name">Apellido</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
           <input id="email" name="email" type="email" class="validate" autocomplete="off">
           <label for="email">Correo electrónico</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
          <input id="password" name="password" type="password" class="validate" autocomplete="off">
          <label for="password">Contraseña</label>
        </div>
        </div>
     <button data-target="modal1" name='btn_login' class='col s12 btn btn-large waves-effect waves-light purple darken-1 modal-trigger'><b>Registrarse</b></button>
      </form>
    </div>
  </div>
</body>
</html>