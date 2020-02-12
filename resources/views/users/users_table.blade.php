@extends('main')

@push('scripts')
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('select').not('.disabled').formSelect();
    $('a[href^="users"]').attr('href', '/users');
});
</script>
@endpush
@push('styles')
<style type="text/css">
  .container {width:70% !important}
</style>
  
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
          <th>Nombre</th>
          <th>Apellido</th>
          <th>E-Mail</th>
          <th>Rol</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $userData)
      <tr onclick="window.open('/users/{{ $userData->id }}')" style="cursor: pointer;">
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
      @endforeach
    </tbody>
  </table>
</div>
@endsection