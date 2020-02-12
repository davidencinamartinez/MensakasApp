<html>
    <head>
        <meta charset='utf-8'>
        <title>@yield('title')</title>
        <link rel="shortcut icon" type="image/png" href="/src/favicon.jpg">
        @stack('styles')
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="/css/main.css">
            <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        @stack('scripts')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </head>
    <body>
        <nav>
            <div class="nav-wrapper purple darken-3">
                <a href="/home" class="brand-logo">
                    <img class="corporativeLogo" src="/src/Logo.webp">
                    MensakasApp - Panel de Administración
                </a>
                @auth
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li>Bienvenido <b>{{ Auth::user()->first_name }}</b></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" id="logoutButton"><i class="material-icons">exit_to_app</i></button>
                            </form>
                        </li>
                    </ul>
                @endauth
            </div>
        </nav>
        <div class="navbar-fixed">
          <nav>
            <div class="nav-wrapper purple darken-1">
              <ul class="left hide-on-med-and-down">
                <li><a href="users">Usuarios</a></li>
                <li><a href="#">Empresas</a></li>
                <li><a href="#">Menús</a></li>
                <li><a href="#">Pedidos</a></li>
                <li><a href="#">Entregas</a></li>
              </ul>
            </div>
          </nav>
        </div>
        @section('extendedSection')
        @show
    </body>
</html>