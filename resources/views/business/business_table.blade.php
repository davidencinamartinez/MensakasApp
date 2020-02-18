@extends('main')

@section('title', 'Negocios - MensakasApp')

@push('styles')
  <style type="text/css">
    .container {  width:70% !important
    }
  </style>
@endpush

@push('scripts')
  <script src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
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

      $('.modal').modal();

    });
  </script>
@endpush

@section('extendedSection')
<div class="container" style="padding-top: 50px">
  <div class="row">
    <a href="new/business" class="btn-floating btn-large waves-effect waves-light purple darken-1 right"><i class="material-icons">add_circle</i></a>
    <h4>Negocios</h4>
  </div>
</div>
<div class="container responsive-table">
  <table class="highlight">
    <thead>
      <tr>
        <th>Opciones</th>
        <th>Nombre</th>
        <th>Categoría</th>
        <th>Población</th>
        <th>Dirección</th>
        <th>CP</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $businessData)
      <tr>
        <form id="delForm" action="/admin/businesses/delete/{{ $businessData->id }}"
          method="POST" style="display:none;"
          >
          @csrf
        </form>
        <td>
          <ul id="dropdown2" class="dropdown-content hover">
            <li>
              <a href="/admin/businesses/{{ $businessData->id }}">
                Editar registro
                <i class="material-icons">edit</i>
              </a>
            </li>
            <li>
              <a class="aSubmit modal-trigger" href="#modal1">
                Eliminar registro
                <i class="material-icons">delete_sweep</i>
              </a>
            </li>
            </ul>
          <a class="btn dropdown-trigger" data-target="dropdown2"><i class="material-icons">settings</i></a>
        </td>
        <td>{{ $businessData->bus_name }}</td>
        <td>{{ $businessData->bus_category }}</td>
        <td>{{ $businessData->name }}</td>
        <td>{{ $businessData->address }}</td>
        <td>{{ $businessData->postal_code }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div id="modal1" class="modal">
    <div class="modal-content">
			<h4>Atención!</h4>
      <p>Estás seguro que deseas eliminar este registro?</p>
    </div>
    <div class="modal-footer">
			<button onclick="return false" class="modal-close waves-effect waves-green btn-flat red accent-2" style="display:inline-flex"><i class="material-icons">cancel</i>&nbspCancelar</button>
      <button onclick="$('#delForm').submit();" class="modal-close waves-effect waves-green btn-flat light-green" style="display:inline-flex"><i class="material-icons">check</i>&nbspConfirmar</button>
    </div>
</div>

@endsection
