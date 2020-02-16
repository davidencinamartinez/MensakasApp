@extends('main')

@section('title', 'Registro de negocio - MensakasApp')

@section('extendedSection')
<div class="container" style="padding-top: 50px">
	<div class="row">
		<h4>Registro de negocio</h4>
	</div>
	<div class="row">
	    <form class="col s12" action="/admin/new/business" method="POST" onsubmit="return confirm('Estás seguro de registrar a este negocio?');">
	    	@csrf
		<div class="row">
			<div class="input-field col s6">
				<input id="bus_name" name="bus_name" type="text" class="validate" autocomplete="off">
				<label for="bus_name">Nombre del negocio</label>
			</div>
		<div class="input-field col s6">
			<select name="location_id">
		     	@foreach ($locations as $loc)
		       		<option value="{{ $loc->id }}">{{ $loc->name }}</option>
		       	@endforeach
		 	</select>
			<label>Población</label>
		</div>
		</div>
        	<div class="row">
	      	<div class="input-field col s12">
	         <input id="address" name="bus_address" type="text" class="validate" autocomplete="off">
	         <label for="address">Dirección</label>
	        </div>
	      </div>
	      <div class="row">
	      	<div class="input-field col s12">
	         <textarea id="bus_description" name="bus_description" class="materialize-textarea" data-length="120"></textarea>
	         <label for="bus_description">Descripción</label>
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
	       <div class="input-field col s3">
	       	  <label for="timepicker_opening">Hora de apertura</label>
	       	  <input id="timepicker_opening" name="opening_schedule" class="timepicker" type="time" value="00:00">
	       	</div>
	       	<div class="input-field col s3">
	       	  <label for="timepicker_closing">Hora de cierre</label>
	       	  <input id="timepicker_closing" name="closing_schedule" class="timepicker" type="time" value="00:00">
	       </div>
	   </div>
	   <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect waves-light purple darken-1'><b>Registrar negocio</b></button>
	    </form>
	  </div>
	</div>
@endsection
