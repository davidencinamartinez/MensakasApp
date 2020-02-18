@extends('main')

@section('title', 'Detalles de negocio - MensakasApp')
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
		$('input').on('change', function(event) {
			$('button[type="submit"]').removeClass('disabled');
		});
		$('select').change(function(event) {
			$('button[type="submit"]').removeClass('disabled');
		});
	});
</script>
@endpush

@section('extendedSection')
	@foreach ($data as $businessData)
		<div class="container" style="padding-top: 50px">
			<div class="row">
				<form id="delete_business" action="/admin/businesses/delete/{{ $businessData->id }}" method="POST">
					@csrf
					<button data-target="modal2" class="btn-floating btn-large waves-effect waves-light purple darken-1 modal-trigger right"><i class="material-icons">delete_forever</i></button>
				</form>
				<h4>Negocio Nº: {{ $businessData->id }}</h4>
			</div>
			<div class="row">
			    <form class="col s12" id="updateForm" action="/admin/businesses/update/{{ $businessData->id }}" method="POST">
			    	@csrf
			      <div class="row">
			        <div class="input-field col s6">
			          <input value="{{ $businessData->bus_name }}" name="bus_name" type="text" class="validate" autocomplete="off">
			          <label for="bus_name">Nombre del negocio</label>
			        </div>
			        <div class="input-field col s6">
			        	<select name="location_id">
				         	@foreach ($locations as $loc)
				         		@if ($businessData->location_id == $loc->id)
			  	           			<option value="{{ $loc->id }}" selected>{{ $loc->name }}</option>
			  	           		@else
			  	           			<option value="{{ $loc->id }}">{{ $loc->name }}</option>
			  	           		@endif
		  	           		@endforeach
			         	</select>
			         <label>Población</label>
			        </div>
			      </div>
			      <div class="row">
			      	<div class="input-field col s12">
			      		<input value="{{ $businessData->address }}" name="bus_address" type="text" class="validate" autocomplete="off">
			      		<label>Dirección</label>
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
			         		@if ($businessData->category_id == $cat->id)
		  	           			<option value="{{ $cat->id }}" selected>{{ $cat->name }}</option>
		  	           		@else
		  	           			<option value="{{ $cat->id }}">{{ $cat->name }}</option>
		  	           		@endif
		  	           	@endforeach
			         </select>
			         <label>Categoría</label>
			       </div>
			       <div class="input-field col s3">
			       	  <label for="timepicker_opening">Hora de apertura</label>
			       	  <input id="timepicker_opening" name="opening_schedule" class="timepicker" type="time" value="{{ $businessData->opening_schedule }}">
			       	</div>
			       	<div class="input-field col s3">
			       	  <label for="timepicker_closing">Hora de cierre</label>
			       	  <input id="timepicker_closing" name="closing_schedule" class="timepicker" type="time" value="{{ $businessData->closing_schedule }}">
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
				<button onclick="$('#delete_business').submit();" class="modal-close waves-effect waves-green btn-flat light-green" style="display:inline-flex"><i class="material-icons">check</i>&nbspConfirmar</button>
			</div>
	</div>
@endsection
