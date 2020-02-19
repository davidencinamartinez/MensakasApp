@extends('consumerApp.main')

@section('title', 'Mensakas')

@push('styles')

<style type="text/css">
	html,body {	background-color: white;
	}
</style>

@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.sumButton').on('click', function() {
      $(this).prev('input').val(parseInt($(this).prev('input').val())+1);
      $('<input>').attr({
          value: 'foo',
          name: 'bar'
      }).appendTo('#shoppingCart');
    });
    $('.subButton').on('click', function() {
      $(this).next().val(parseInt($(this).next().val())-1);        
      $('#shoppingCart input:last-child').remove();      
    });
  });
</script>
@endpush

@section('extendedSection')
  <form id="shoppingCart" action="/checkout/" method="POST" style="display:none;">
    @csrf
  </form>
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
                  <div class="row">
                    <i class="material-icons subButton" style="vertical-align: bottom; cursor: pointer">indeterminate_check_box</i>
                    <input type="" class="productQuantity" name="" style="width: 35px; text-align: center;" value="0">
                    <i class="material-icons sumButton" style="vertical-align: bottom; cursor: pointer">add_box</i>
                  </div>
                </div>
              @endforeach
             
          </li>
        </ul>
      </div>
       @endforeach
      </div>
@endsection