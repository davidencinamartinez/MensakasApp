@extends('consumerApp.main')

@section('title', 'Mensakas')

@push('styles')
<style type="text/css">
	@media only screen and (max-width: 19206px) {
        body 	{	background-image: url("https://pixtin.es/wp-content/uploads/2018/07/Msk_Cabecera.jpg");
					background-repeat: no-repeat;
					background-attachment: fixed;
					background-size: contain;
				}
    }

    @media only screen and (min-width: 1920px) {
        body 	{	background-image: url("https://pixtin.es/wp-content/uploads/2018/07/Msk_Cabecera.jpg");
					background-repeat: no-repeat;
					background-attachment: fixed;
					background-size: cover;
				}
    	}
</style>
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('select').change(function(index, el) {
			$('button a').attr('href', '/locations/'+$(this).children("option:selected").val());
		});
	});
</script>
@endpush

@section('extendedSection')
<div class="section"></div>
<div class="section"></div>
<div class="row">
	<div class="col s6 m6">
		<div class="card">
			<div class="card-content">
				<span class="card-title"><h3>Sign up to find out more about Two Lanterns.</h3></span>
				<form class="container">
					<div class = "row">
						<div class="input-field col m6">
							<input id="first_name" name="first_name" type="text" class="validate">
							<label for="first_name">Nombre</label>
						</div>
						<div class="input-field col m6">
							<input id="last_name" name="last_name" type="text" class="validate">
							<label for="last_name">Apellido</label>
						</div>
					</div>
					<div class = "row">
						<div class="input-field col m6">
							<input id="email" type="email" class="validate">
							<label for="email">Email</label>
						</div>
						<div class="input-field col m6">
							<input id="address" type="text" name="address" class="validate">
							<label for="address">Dirección</label>
						</div>
					</div>
					<div class = "row">
						<select id="location" name="location_id" class="col s2">
							<option selected disabled>Población</option>
							@foreach ($locations as $loc)
								<option value="{{ $loc->id }}">{{ $loc->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="row">
						<button class="btn waves-effect waves-light purple darken-4" type="submit">Buscar<i class="material-icons right">forward</i>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection