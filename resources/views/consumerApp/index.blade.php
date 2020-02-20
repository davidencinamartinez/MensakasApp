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
	@if (Auth::check())
		<div class="col s12 m6">
			<h5 style="color: white;"><b>Platos deliciosos del restaurante a tu casa</b></h5>
			<div class="card" style="background-color: rgba(255,255,255,0.4); border-radius: 10px;">
				<div class="card-content white-text">	
					<p>Selecciona tu población para encontrar restaurantes cerca:</p>
					<select name="location_id" class="col s6">	
						@foreach ($locations as $loc)	
							<option value="{{ $loc->id }}">{{ $loc->name }}</option>	
						@endforeach
					</select>
					<button class="btn waves-effect waves-light" name="action">	
						<a href="" class="white-text">Buscar</a>
					</button>
				</div>
			</div>
		</div>
	@else
		<div class="col s12 m6">
			<h5 style="color: white;"><b>Platos deliciosos del restaurante a tu casa</b></h5>
			<div class="card" style="background-color: rgba(255,255,255,0.4); border-radius: 10px;">
				<div class="card-content white-text">	
					<button class="btn waves-effect waves-light" name="action">	
						<a href="/register" class="white-text">Registrarse</a>
					</button>
					<button class="btn waves-effect waves-light" name="action">	
						<a href="/login" class="white-text">Log In</a>
					</button>
				</div>
			</div>
		</div>
	@endif
</div>
@endsection