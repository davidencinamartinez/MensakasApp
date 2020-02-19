@extends('consumerApp.main')

@section('title', 'Mensakas')

@push('styles')

<style type="text/css">
	html,body {	background-color: white;
	}
</style>

@endpush

@push('scripts')

@endpush

@section('extendedSection')
	<div class="row">
		<h3>Restaurantes en {{ $location }}</h3>
	</div>
	<div class="row">
		@foreach($businesses as $data)
      		<div class="col s4">
        		<div class="card medium">
        			<div class="card-image">
						<img src="/src/{{ $data->id }}.png">
					</div>
					<div class="card-content">
						<p>{{ $data->bus_description }}</p>
					</div>
					<div class="card-action">
						<b>{{ $data->bus_name }}</b>
						<a href="/business/{{ $data->id }}" class="right">Ver productos</a>
					</div>
  				</div>
      		</div>
		@endforeach
    </div>
@endsection