<html>
    <head>
        <meta charset='utf-8'>
        <title>Mi negocio - Mensakas</title>
        <link rel="shortcut icon" type="image/png" href="/src/favicon.jpg">
        @stack('styles')
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="/css/main.css">
            <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
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
        <div class="container" style="padding-top: 50px; padding-bottom: 50px">
  <div class="row">
    <h4>Pedidos</h4>
  </div>
</div>
<div class="container responsive-table">
  <table class="highlight">
    <thead>
      <tr>
          <th>Opciones</th>
          <th>Referencia</th>
          <th>Estado</th>
          <th>Hora de preparación</th>
          <th>Hora de entrega</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $orderData)
      <tr>
        <td>
          <ul id="dropdown2" class="dropdown-content hover">
            <li>
              <a href="/admin/orders/{{ $orderData->id }}">
                Ver detalles
                <i class="material-icons">remove_red_eye</i>
              </a>
            </li>
          </ul>
          <a class="btn dropdown-trigger" data-target="dropdown2"><i class="material-icons">settings</i></a>
        </td> 
        <td>{{ $orderData->id }}</td>
        <td>
            <select name="">
                @if ($orderData->order_status == 1)
                <option value="{{ $orderData->order_status }}">Confirmada</option>
                <option value="3">Procesando</option>
                <option value="4">Listo para recogida</option>
                <option value="5">Entregado</option>
                @elseif ($orderData->order_status == 3)
                <option value="{{ $orderData->order_status }}">Procesando</option>
                <option value="4">Listo para recogida</option>
                <option value="5">Entregado</option>
                @elseif ($orderData->order_status == 4)
                <option value="{{ $orderData->order_status }}">Listo para recogida</option>
                <option value="5">Entregado</option>
                @elseif ($orderData->order_status == 5)
                <option value="{{ $orderData->order_status }}">Entregado</option>
                @endif
            </select>
        </td>
        <td>
            <input id="timepicker_pickuptime" name="pickup_time" class="timepicker" type="time" value="{{ $orderData->pickup_time }}">
        </td>
        <td>
            
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
        @show
    </body>
</html>