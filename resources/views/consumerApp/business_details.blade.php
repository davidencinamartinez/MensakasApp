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
	<div class="container" style="padding-top: 50px">
		@foreach ($business as $businessData)
		<div class="row">
        	<h4><b>{{ $businessData->bus_name }}</b></h4>
        </div>
        <div class="row">
			<p><b>Dirección: </b>{{ $businessData->address }}. {{ $businessData->loc_name }}</p>
			<p><b>Horario: </b>{{ date('H:i', strtotime($businessData->opening_schedule)) }} - {{ date('H:i', strtotime($businessData->closing_schedule)) }}</p>
      	</div>
      	<h4><b>Productos</b></h4>
      	 <div class="row">
        <ul class="collapsible">
          <li>
            <div class="collapsible-header">
              <i class="material-icons">assignment</i>
              Menús/Packs
              <span class="badge">({{ count($items) }}) elementos</span></div>
              @foreach ($items as $orderItem)
                <div class="collapsible-body">
                	<h6>{{ $orderItem->item_name }}</h6>
                	<p>{{ $orderItem->item_description }}</p>
                	<p><b>Precio:</b>&nbsp{{ $orderItem->item_price }}€</p>
                </div>
              @endforeach
             
          </li>
        </ul>
      </div>
       @endforeach
      </div>
@endsection