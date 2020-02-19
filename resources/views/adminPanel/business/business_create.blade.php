@extends('adminPanel.main')

@section('title', 'Registro de negocio - MensakasApp')
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
@section('extendedSection')
<div class="container" style="padding-top: 50px">
	<div class="row">
		<h4>Registro de negocio</h4>
	</div>
	<div class="row">
	    <form class="col s12" id="create_res" action="/admin/new/business" method="POST">
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
	    <button data-target="modal1" name='btn_login' class='col s12 btn btn-large waves-effect waves-light purple darken-1 modal-trigger disabled'><b>Registrar negocio</b></button>
	    </form>
	  </div>
	</div>

	<div id="modal1" class="modal">
	    <div class="modal-content">
				<h4>Atención!</h4>
	      <p>Estas seguro de añadir este restaurante?</p>
	    </div>
	    <div class="modal-footer">
				<button onclick="return false" class="modal-close waves-effect waves-green btn-flat red accent-2" style="display:inline-flex"><i class="material-icons">cancel</i>&nbspCancelar</button>
	      <button onclick="$('#create_res').submit();" class="modal-close waves-effect waves-green btn-flat light-green" style="display:inline-flex"><i class="material-icons">check</i>&nbspConfirmar</button>
			</div>
	</div>
@endsection
