@extends('adminPanel.main')

@section('title', 'Usuarios - MensakasApp')

@push('styles')
  <style type="text/css">
    .container {  width:70% !important
    }
  </style>
@endpush

@push('scripts')
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(document).ready(function($) {
      var idCount = 1;
      var idTarget = 1;
      var idForm = 1;
      var aSubId = 1;
      $('tr td ul').each(function(index, el) {
        $(this).attr('id', 'dropdown'+idCount);
        idCount++;
      });
      $('a[data-target="dropdown2"]').each(function(index, el) {
        $(this).attr('data-target', 'dropdown'+idTarget);
        idTarget++;
      });
      $('tr form').each(function(index, el) {
        $(this).attr('id', 'deleteForm'+idForm);
        idForm++;
      });
      $('.aSubmit').each(function(index, el) {
        $(this).attr('onclick', '$("#deleteForm'+aSubId+'").submit();');
        aSubId++;
      });
    });
  </script>
@endpush

@section('extendedSection')
<div class="container" style="padding-top: 50px">
  <div class="row">
    <a href="new/user" class="btn-floating btn-large waves-effect waves-light purple darken-1 right"><i class="material-icons">person_add</i></a>
    <h4>Usuarios</h4>
  </div>
</div>
<div class="container responsive-table">
  <table class="highlight">
    <thead>
      <tr>
          <th>Opciones</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>E-Mail</th>
          <th>Rol</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $userData)
        @if ($userData->status == 1) {{-- USER IS ENABLED --}}
      <tr>
        <form id="delForm" action="/admin/users/delete/{{ $userData->id }}" 
          method="POST" style="display:none;" 
          onsubmit="return confirm('Estás seguro que deseas eliminar este registro?');">
          @csrf
        </form>
        <td>
          <ul id="dropdown2" class="dropdown-content hover">
            <li>
              <a href="/admin/users/{{ $userData->id }}">
                Ver detalles
                <i class="material-icons">remove_red_eye</i>
              </a>
            </li>
            <li>
              <a class="aSubmit">
                Eliminar registro
                <i class="material-icons">delete_sweep</i>
              </a>
            </li>
            </ul>
          <a class="btn dropdown-trigger" data-target="dropdown2"><i class="material-icons">settings</i></a>
        </td> 
        <td>{{ $userData->first_name }}</td>
        <td>{{ $userData->last_name }}</td>
        <td>{{ $userData->email }}</td>
        @if ($userData->role == 4)
          <td>Administrador</td>
        @elseif ($userData->role == 3)
          <td>Negocio</td>
        @elseif ($userData->role == 2)
          <td>Repartidor</td>
        @else
          <td>Cliente</td>
        @endif
      </tr>
      @else {{-- USER IS DISABLED --}}
      @endif
      @endforeach
    </tbody>
  </table>
</div>
@endsection