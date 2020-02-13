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
		    $('textarea#bus_description').characterCounter();
		  });
	</script>
@endpush
@section('extendedSection')
@foreach ($data as $businessData)
<div class="container" style="padding-top: 50px">
	<div class="row">
		<form action="/businesses/delete/{{ $businessData->id }}" method="POST" onsubmit="return confirm('Estás seguro que deseas eliminar este registro?');">
			@csrf
			<button type="submit" class="btn-floating btn-large waves-effect waves-light purple darken-1 right"><i class="material-icons">delete_forever</i></button>
		</form>
		<h4>Negocio Nº: {{ $businessData->id }}</h4>
	</div>
	<div class="row">
	    <form class="col s12" action="/businesses/update/{{ $businessData->id }}" method="POST" onsubmit="return confirm('Deseas guardar los cambios?');">
	    	@csrf
	      <div class="row">
	        <div class="input-field col s6">
	          <input value="{{ $businessData->bus_name }}" name="bus_name" type="text" class="validate" autocomplete="off">
	          <label for="bus_name">Nombre del negocio</label>
	        </div>
	        <div class="input-field col s6">
	          <input value="{{ $businessData->postal_code }}" name="postal_code" type="text" class="validate" autocomplete="off">
	          <label for="postal_code">Código Postal</label>
	        </div>
	      </div>
	      <div class="row">
	      	<div class="input-field col s12">
	         <textarea id="bus_description" name="bus_description" class="materialize-textarea" data-length="250">{{ $businessData->bus_description }}</textarea>
	          <label for="disabled">Descripción</label>
	        </div>
	      </div>
	      <div class="row">
	     <div class="input-field col s6">
	         <select name="category_id">
	         	@foreach ($categories as $cat)
  	           		<option value="{{ $cat->id }}">{{ $cat->name }}</option>
  	           	@endforeach
	         </select>
	         <label>Categoría</label>
	       </div>
	   </div>
	   <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect waves-light purple darken-1'><b>Guardar cambios</b></button>
	    </form>
	  </div>
	</div>
@endforeach
@endsection
