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

    var totalPrice = 
    
    $('.modal').modal();

    // SUM ITEM BUTTON
    
    $('.sumButtonItem').on('click', function() {
      var itemToAdd = $(this).parent().parent().find('h6').html();
      $(this).prev('input').val(parseInt($(this).prev('input').val())+1);
      $('<input>').attr({ type: 'hidden', name: 'item[]', value: $(this).next().html()}).appendTo('form');
      $('<h6>').text('- Producto: '+itemToAdd).appendTo('.modal-content');
      M.toast({html: 'Producto añadido al carrito&nbsp<i class="material-icons">shopping_cart</i>', classes: 'rounded'});
    });

    // SUBTRACT ITEM BUTTON
    
    $('.subButtonItem').on('click', function() {
      var inputName = $(this).nextAll('.orderItem').html();
      var itemToDelete = $(this).parent().parent().find('h6').html();
      $(this).next().val(parseInt($(this).next().val())-1);        
      $('input[name^="item"][value="'+inputName+'"]').first().remove(); 
      $('.modal-content h6:contains("'+itemToDelete+'")').first().remove();      
    });

    // SUM EXTRA BUTTON
    
    $('.sumButtonExtra').on('click', function() {
      var extraToAdd = $(this).parent().parent().find('h6').html();
      $(this).prev('input').val(parseInt($(this).prev('input').val())+1);
      $('<input>').attr({ type: 'hidden', name: 'extra[]', value: $(this).next().html()}).appendTo('form');
      $('<h6>').text('- Extra: '+extraToAdd).appendTo('.modal-content');
      M.toast({html: 'Extra añadido al carrito&nbsp<i class="material-icons">shopping_cart</i>', classes: 'rounded'});
    });

    // SUBTRACT EXTRA BUTTON
    
    $('.subButtonExtra').on('click', function() {
      var inputName = $(this).nextAll('.orderExtra').html();
      var extraToDelete = $(this).parent().parent().find('h6').html();
      $(this).next().val(parseInt($(this).next().val())-1);        
      $('input[name^="extra"][value="'+inputName+'"]').first().remove();   
      $('.modal-content h6:contains("'+extraToDelete+'")').first().remove();        
    });

  });
</script>
<script type="text/javascript">
  function getTotal() {
      var total = 0.0;
      $('.productQuantity').each(function(index, el) {
        total += parseFloat($(this).parent().parent().find('p:contains("Precio") em').first().html())*($(this).val());  
      });
      $('input[name="order_total"]').val(total);
    }

  function getComments() {
    $('input[name="comments"]').val($('#comments_box').val());
  }
</script>
@endpush

@section('extendedSection')
<div id="modal1" class="modal">
    <div class="modal-content">
      <h4 id="productCounter">Tu cesta</h4>
      <form id="shoppingCart" action="/checkout/{{ $bus_title }}" method="POST" style="display:none;">
        @csrf
        <input type="hidden" name="order_total" value="">
        <input type="hidden" name="comments" value="">
      </form>
    </div>
    <div class="modal-footer">
      <a onclick="getTotal(); getComments(); $('#shoppingCart').submit();" class="modal-close waves-effect waves-green btn-flat">Pagar</a>
    </div>
  </div>
	<div class="container" style="padding-top: 50px">
		@foreach ($business as $businessData)
		<div class="row">
        	<h4 class="left"><b>{{ $businessData->bus_name }}</b></h4>
        </div>
          <button data-target="modal1" class="btn modal-trigger right purple darken-4"><i class="material-icons">shopping_cart</i></button>
        <div class="row">
			<p><b>Dirección: </b>{{ $businessData->address }}</p>
      <p><b>Población: </b> {{ $businessData->loc_name }}</p>
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
                  	<p><b>Precio:</b>&nbsp<em>{{ $orderItem->item_price }}</em> €</p>
                    <div class="row">
                      <i class="material-icons subButtonItem" style="vertical-align: bottom; cursor: pointer">indeterminate_check_box</i>
                      <input type="" class="productQuantity" name="" style="width: 35px; text-align: center;" value="0" disabled>
                      <i class="material-icons sumButtonItem" style="vertical-align: bottom; cursor: pointer">add_box</i>
                      <p class="orderItem" style="display: none">{{ $orderItem->id }}</p>
                    </div>
                  </div>
                @endforeach
              </li>
            </ul>
          </div>
          <div class="row">
          <ul class="collapsible">
            <li>
              <div class="collapsible-header">
                <i class="material-icons">assignment</i>
                Extras
                <span class="badge">({{ count($extras) }}) elementos</span></div>
                @foreach ($extras as $orderExtra)
                  <div class="collapsible-body">
                    <h6>{{ $orderExtra->extra_name }}</h6>
                    <p><b>Precio:</b>&nbsp<em>{{ $orderExtra->extra_price }}</em>€</p>
                    <div class="row">
                      <i class="material-icons subButtonExtra" style="vertical-align: bottom; cursor: pointer">indeterminate_check_box</i>
                      <input type="" class="productQuantity" name="" style="width: 35px; text-align: center;" value="0" disabled>
                      <i class="material-icons sumButtonExtra" style="vertical-align: bottom; cursor: pointer">add_box</i>
                      <p class="orderExtra" style="display: none">{{ $orderExtra->id }}</p>
                    </div>
                  </div>
                @endforeach
              </li>
            </ul>
          </div>
       @endforeach
       <div class="row">
              <div class="input-field col s12">
               <textarea id="comments_box" class="materialize-textarea" data-length="250"></textarea>
                <label for="comments_box">Escribe un comentario</label>
              </div>
            </div>
      </div>
@endsection