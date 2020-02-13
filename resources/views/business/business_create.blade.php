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
<div class="container" style="padding-top: 50px">
	<div class="row">
		<h4>Registro de negocio</h4>
	</div>
	<div class="row">
	    <form class="col s12" action="/new/business" method="POST" onsubmit="return confirm('Estás seguro de registrar a este negocio?');">
	    	@csrf
	      <div class="row">
	        <div class="input-field col s6">
	          <input id="bus_name" name="bus_name" type="text" class="validate" autocomplete="off">
	          <label for="bus_name">Nombre</label>
        	</div>
        	<div class="input-field col s6">
	          <input id="postal_code" name="postal_code" type="text" class="validate" autocomplete="off">
	          <label for="postal_code">Codigo postal</label>
        	</div>
	      </div>
	      <div class="row">
	      	<div class="input-field col s12">
	         <input id="bus_description" name="bus_description" type="text" class="validate" autocomplete="off">
	         <label for="bus_description">Descripción</label>
	        </div>
	      </div>
        <div class="row">
	      	<div class="input-field col s12">
	         <input id="address" name="address" type="text" class="validate" autocomplete="off">
	         <label for="address">Dirección</label>
	        </div>
	      </div>
	      </div>
	     <div class="row">
	     <div class="input-field col s6">
	         <select name="category_id">
             <option value="5" selected>Healthy</option>
	           <option value="4" selected>Kebab</option>
	           <option value="3">Italiano</option>
	           <option value="2">Sushi</option>
	           <option value="1">Fast Food</option>
	         </select>
	         <label>category_id</label>
	       </div>
	   </div>
	   <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect waves-light purple darken-1'><b>Registrar negocio</b></button>
	    </form>
	  </div>
	</div>
@endsection
