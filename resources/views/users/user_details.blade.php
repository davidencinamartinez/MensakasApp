@extends('main')

@section('title', 'Detalles de usuario - MensakasApp')

@section('extendedSection')

@push('scripts')
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('input').on('input', function(event) {
				$('button[type="submit"]').removeClass('disabled');
			});
			$('select').change(function(event) {
				$('button[type="submit"]').removeClass('disabled');
			});
		});
	</script>
@endpush

@foreach ($data as $userData)
<div class="container" style="padding-top: 50px">
	<div class="row">
		<form action="/admin/users/delete/{{ $userData->id }}" method="POST" onsubmit="return confirm('Estás seguro que deseas eliminar este registro?');">
			@csrf
			<button type="submit" class="btn-floating btn-large waves-effect waves-light purple darken-1 right"><i class="material-icons">delete_forever</i></button>
		</form>
		<h4>Usuario Nº: {{ $userData->id }}</h4>
	</div>
	<div class="row">
	    <form class="col s12" action="/admin/users/update/{{ $userData->id }}" method="POST" onsubmit="return confirm('Deseas guardar los cambios?');">
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
	   <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect waves-light purple darken-1 disabled'><b>Guardar cambios</b></button>
	    </form>
	  </div>
	</div>
@endforeach
@endsection