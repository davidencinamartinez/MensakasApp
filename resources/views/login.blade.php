<!DOCTYPE html>
<html>
<head>
    <title></title>
     <link rel="shortcut icon" type="image/png" href="/src/favicon.jpg">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="/css/main.css">
            <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
            <script
              src="https://code.jquery.com/jquery-3.4.1.min.js"
              integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
              crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            <script type="text/javascript" src="/js/main.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('select').formSelect();
                    $('textarea#bus_description').characterCounter();
                    $('select').not('.disabled').formSelect();
                    $('.collapsible').collapsible();
                    $(".dropdown-trigger").dropdown({
                        constrainWidth: false
                    });
                    $('.timepicker').timepicker({
                        i18n: { cancel: 'Cancelar',
                                done: 'Establecer'
                        },
                        twelveHour : false,
                    });
                });
            </script>
</head>
<body>
    <div class="section"></div>
    <div class="section"></div>
    <div class="section"></div>
    <center>
        <div class="section"></div>
        <div class="section"></div>
        <div class="container">
            <div class="z-depth-1 white lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE; width: 348px;">
                
                <form action="/login" class="col s12" method="post">
                    @csrf
                    <div class='row'>
                        <h4>Login</h4>
                        <div class='input-field col s12'>
                            <input class='validate' type='email' name='email' id='email' autofocus autocomplete="off">
                            <label for='email'>Correo electrónico</label>
                        </div> 
                    </div>
                    <div class='row'>
                        <div class='input-field col s12'>
                            <input class='validate' type='password' name='password' id='password' autocomplete="off">
                            <label for='password'>Contraseña</label>
                        </div>
                    </div>
                    @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">*Credenciales incorrectas*</strong>
                            </span>
                    @enderror
                    <br>
                    <br>
                    <center>
                        <div class='row'>
                            <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect purple darken-1'>Entrar</button>
                        </div>
                    </center>
                </form>
            </div>
        </div>
    </center>

    <div class="section"></div>
    <div class="section"></div>
</body>
</html>
    