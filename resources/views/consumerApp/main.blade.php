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
            <style type="text/css">
            	html {background-color: #4a148c !important;}
            </style>
        @stack('scripts')
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
        <nav>
            <div class="nav-wrapper purple darken-4">
                <a href="/" class="brand-logo">
                    <img class="corporativeLogo" src="/src/Logo.webp">
                    <b>Mensakas</b>
                </a>
                @auth
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li>Bienvenido <b>{{ Auth::user()->first_name }}</b></li>
                        <li>
                            <form method="POST" action="/logout">
                                @csrf
                                <button type="submit" id="logoutButton"><i class="material-icons">exit_to_app</i></button>
                            </form>
                        </li>
                    </ul>
                @endauth
            </div>
        </nav>
        @section('extendedSection')
        @show
    </body>
</html>