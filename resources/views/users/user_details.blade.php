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
	    <form class="col s12">
	      <div class="row">
	        <div class="input-field col s6">
	          <input value="{{ $userData->first_name }}" id="first_name" type="text" class="validate">
	          <label for="first_name">Nombre</label>
	        </div>
	        <div class="input-field col s6">
	          <input value="{{ $userData->last_name }}" id="first_name" type="text" class="validate">
	          <label for="first_name">First Name</label>
	        </div>
	      </div>
	      <div class="row">
	      	<div class="input-field col s12">
	         <input value="{{ $userData->email }}" id="first_name" type="text" class="validate">
	          <label for="disabled">Correo electrónico</label>
	        </div>
	      </div>
	      <div class="row">
	     <div class="input-field col s6">
	         <select>
	         @if ($userData->role == 4)
	           <option value="" selected>Administrador</option>
	           <option value="1">Negocio</option>
	           <option value="2">Repartidor</option>
	           <option value="3">Cliente</option>
	         @elseif ($userData->role == 3)
	           <option value="" selected>Negocio</option>
	           <option value="1">Administrador</option>
	           <option value="2">Repartidor</option>
	           <option value="3">Cliente</option>
	           @elseif ($userData->role == 2)
	             <option value="" selected>Repartidor</option>
	             <option value="1">Administrador</option>
	             <option value="2">Negocio</option>
	             <option value="3">Cliente</option>
	           @elseif ($userData->role == 1)
	           <option value="" selected>Cliente</option>
	           <option value="1">Administrador</option>
	           <option value="2">Negocio</option>
	           <option value="3">Repartidor</option>
	          @endif
	         </select>
	         <label>Rol</label>
	       </div>
	   </div>
	    </form>
	  </div>
	</div>
@endforeach
@endsection