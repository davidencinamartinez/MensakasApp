@extends('main')

@section('title', 'Detalles de negocio - MensakasApp')

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
			   </div>
			   <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect waves-light purple darken-1'><b>Guardar cambios</b></button>
			    </form>
			  </div>
			</div>
	@endforeach
@endsection
