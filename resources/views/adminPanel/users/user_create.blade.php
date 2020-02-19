@extends('adminPanel.main')

@section('title', 'Registro de usuario - MensakasApp')
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
		<h4>Registro de usuario</h4>
	</div>
	<div class="row">
	    <form class="col s12" id="create_user" action="/admin/new/user" method="POST">
	    	@csrf
	      <div class="row">
	        <div class="input-field col s6">
	          <input id="first_name" name="first_name" type="text" class="validate" autocomplete="off">
	          <label for="first_name">Nombre</label>
        	</div>
        	<div class="input-field col s6">
	          <input id="last_name" name="last_name" type="text" class="validate" autocomplete="off">
	          <label for="last_name">Apellido</label>
        	</div>
	      </div>
	      <div class="row">
	      	<div class="input-field col s12">
	         <input id="email" name="email" type="email" class="validate" autocomplete="off">
	         <label for="email">Correo electrónico</label>
	        </div>
	      </div>
	      <div class="row">
	      	<div class="input-field col s12">
          <input id="password" name="password" type="password" class="validate" autocomplete="off">
          <label for="password">Contraseña</label>
        </div>
	      </div>
	     <div class="row">
	     <div class="input-field col s6">
	         <select name="role">
	           <option value="4" selected>Administrador</option>
	           <option value="3">Negocio</option>
	           <option value="2">Repartidor</option>
	           <option value="1">Cliente</option>
	         </select>
	         <label>Rol</label>
	       </div>
	   </div>
	   <button data-target="modal1" name='btn_login' class='col s12 btn btn-large waves-effect waves-light purple darken-1 modal-trigger disabled'><b>Registrar usuario</b></button>
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
	      <button onclick="$('#create_user').submit();" class="modal-close waves-effect waves-green btn-flat light-green" style="display:inline-flex"><i class="material-icons">check</i>&nbspConfirmar</button>
			</div>
	</div>
	
@endsection
