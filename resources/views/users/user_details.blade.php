@extends('main')
@push('scripts')
	<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		    $('select').formSelect();
		    $('a[href^="users"]').attr('href', '/users');
		  });
	</script>
@endpush
@section('extendedSection')
@foreach ($data as $userData)
<div class="container" style="padding-top: 50px">
	<div class="row">
	    <form class="col s12" action="/users/update/{{ $userData->id }}" method="POST" onsubmit="return confirm('Deseas guardar los cambios?');">
	    	@csrf
	      <div class="row">
	        <div class="input-field col s6">
	          <input value="{{ $userData->first_name }}" name="first_name" type="text" class="validate">
	          <label for="first_name">Nombre</label>
	        </div>
	        <div class="input-field col s6">
	          <input value="{{ $userData->last_name }}" name="last_name" type="text" class="validate">
	          <label for="first_name">Apellido</label>
	        </div>
	      </div>
	      <div class="row">
	      	<div class="input-field col s12">
	         <input value="{{ $userData->email }}" name="email" type="text" class="validate">
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
	   <button type='submit' name='btn_login' class='col s12 btn btn-large waves-light purple darken-1'>Guardar cambios<i class="material-icons right">save</i></button>
	    </form>
	  </div>
	</div>
@endforeach
@endsection