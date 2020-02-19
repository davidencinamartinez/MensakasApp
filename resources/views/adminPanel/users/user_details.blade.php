@extends('adminPanel.main')

@section('title', 'Detalles de usuario - MensakasApp')

@section('extendedSection')

@push('scripts')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script
			  src="https://code.jquery.com/jquery-3.4.1.js"
			  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
			  crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('input').on('input', function(event) {
				$('button[name="btn_login"]').removeClass('disabled');
			});
			$('select').change(function(event) {
				$('button[name="btn_login"]').removeClass('disabled');
			});
      $('.modal').modal();
		});
	</script>
@endpush

@foreach ($data as $userData)
<div class="container" style="padding-top: 50px">
	<div class="row">
		<form id="delete_user" action="/admin/users/delete/{{ $userData->id }}" method="POST">
			@csrf
			<button data-target="modal2" class="btn-floating btn-large waves-effect waves-light purple darken-1 modal-trigger right"><i class="material-icons">delete_forever</i></button>
		</form>
		<h4>Usuario Nº: {{ $userData->id }}</h4>
	</div>
	<div class="row">
	    <form class="col s12" id="updateForm" action="/admin/users/update/{{ $userData->id }}" method="POST">
	    	@csrf
	      <div class="row">
	        <div class="input-field col s6">
	          <input value="{{ $userData->first_name }}" name="first_name" type="text" class="validate" autocomplete="off">
	          <label for="first_name">Nombre</label>
	        </div>
	        <div class="input-field col s6">
	          <input value="{{ $userData->last_name }}" name="last_name" type="text" class="validate" autocomplete="off">
	          <label for="first_name">Apellido</label>
	        </div>
	      </div>
	      <div class="row">
	      	<div class="input-field col s12">
	         <input value="{{ $userData->email }}" name="email" type="text" class="validate" autocomplete="off">
	          <label for="disabled">Correo electrónico</label>
	        </div>
	      </div>
	      <div class="row">
	     <div class="input-field col s6">
	         <select name="role">
	         @if ($userData->role == 4)
	           <option value="4" selected>Administrador</option>
	           <option value="3">Negocio</option>
	           <option value="2">Repartidor</option>
	           <option value="1">Cliente</option>
	         @elseif ($userData->role == 3)
	           <option value="3" selected>Negocio</option>
	           <option value="4">Administrador</option>
	           <option value="2">Repartidor</option>
	           <option value="1">Cliente</option>
	           @elseif ($userData->role == 2)
	             <option value="2" selected>Repartidor</option>
	             <option value="4">Administrador</option>
	             <option value="3">Negocio</option>
	             <option value="1">Cliente</option>
	           @elseif ($userData->role == 1)
	           <option value="1" selected>Cliente</option>
	           <option value="4">Administrador</option>
	           <option value="3">Negocio</option>
	           <option value="2">Repartidor</option>
	          @endif
	         </select>
	         <label>Rol</label>
	       </div>
	   </div>
	   <button data-target="modal1" name='btn_login' class='col s12 btn btn-large waves-effect waves-light purple darken-1 modal-trigger disabled'><b>Guardar cambios</b></button>
	    </form>
	  </div>
	</div>
@endforeach
<div id="modal1" class="modal">
    <div class="modal-content">
			<h4>Atención!</h4>
      <p>Estas seguro de hacer cambios?</p>
    </div>
    <div class="modal-footer">
			<button onclick="return false" class="modal-close waves-effect waves-green btn-flat red accent-2" style="display:inline-flex"><i class="material-icons">cancel</i>&nbspCancelar</button>
      <button onclick="$('#updateForm').submit();" class="modal-close waves-effect waves-green btn-flat light-green" style="display:inline-flex"><i class="material-icons">check</i>&nbspConfirmar</button>
    </div>
</div>
<div id="modal2" class="modal">
		<div class="modal-content">
			<h4>Atención!</h4>
			<p>Estás seguro que deseas eliminar este registro?</p>
		</div>
		<div class="modal-footer">
			<button onclick="return false" class="modal-close waves-effect waves-green btn-flat red accent-2" style="display:inline-flex"><i class="material-icons">cancel</i>&nbspCancelar</button>
			<button onclick="$('#delete_user').submit();" class="modal-close waves-effect waves-green btn-flat light-green" style="display:inline-flex"><i class="material-icons">check</i>&nbspConfirmar</button>
		</div>
</div>

@endsection
