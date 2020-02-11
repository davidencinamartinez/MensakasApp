<html>
    <head>
        <meta charset='utf-8'>
        <title>@yield('title')</title>
        @stack('styles')
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="css/main.css">
        @stack('scripts')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </head>
    <body>
        <nav>
            <div class="nav-wrapper deep-purple accent-4">
                <a href="/" class="brand-logo">
                    <img class="corporativeLogo" src="/storage/Logo.webp">
                    MensakasApp - Panel de Administración
                </a>
                @auth
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li>Bienvenido <b>{{ Auth::user()->name }}</b></li>
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
            <div class="nav-wrapper deep-purple accent-2">
              <ul class="left hide-on-med-and-down">
                <li><a href="/users">Users</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Menus</a></li>
                <li><a href="#">Orders</a></li>
                <li><a href="#">Deliver</a></li>
              </ul>
            </div>
          </nav>
        </div>
        @section('extendedSection')
        @show
    </body>
</html>