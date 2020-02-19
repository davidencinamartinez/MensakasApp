@extends('adminPanel.main')

@section('title', 'Detalles de pedido - MensakasApp')

@push('styles')
<style type="text/css">
  .container {  width:70% !important
  }
}
</style>
  
@endpush

@section('extendedSection')
  @foreach ($data as $orderData)
    <div class="container" style="padding-top: 50px">
      <div class="row">
        <h4 class="left">Pedido Nº: {{ $orderData->id }}</h4>
        <h4 class="right">Estado: 
          @if ($orderData->order_status == 1)
            Confirmado
          @elseif ($orderData->order_status == 2)
            Pendiente
          @elseif ($orderData->order_status == 3)
            Procesando ...
          @elseif ($orderData->order_status == 4)
            Listo para entrega
          @else
            Entregado
          @endif 
      </div>
      <div class="row">
        <h5 class="left">Negocio: {{ $business->bus_name }}</h5>
      </div>
      <div class="row">
        <p><b>Fecha del pedido:</b> {{ date('d/m/Y - H:i', strtotime($orderData->order_date)) }}</p>
        <p><b>Hora estimada para recogida:</b>
          @if (is_null($orderData->pickup_time))
            -
          @else
           {{ date('d/m/Y - H:i', strtotime($orderData->pickup_time)) }}</p>
          @endif
        <p><b>Hora de entrega:</b>
          @if (is_null($orderData->delivery_time))
            -
          @else
           {{ date('d/m/Y - H:i', strtotime($orderData->delivery_time)) }}</p>
          @endif
      </div>
      <div class="row">
        <ul class="collapsible">
          <li>
            <div class="collapsible-header">
              <i class="material-icons">assignment</i>
              Menús/Packs
              <span class="badge">({{ count($items) }}) elementos</span></div>
              @foreach ($items as $orderItem)
                <div class="collapsible-body"><p>{{ $orderItem->item_name }}</p><label><b>Precio:</b>&nbsp{{ $orderItem->item_price }}€</label></div>
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
                <div class="collapsible-body"><p>{{ $orderExtra->extra_name }}</p><label><b>Precio:</b>&nbsp{{ $orderExtra->extra_price }}€</label></div>
              @endforeach
          </li>
        </ul>
      </div>
      <div class="row">
        <div class="input-field col s12">
          @if (is_null($orderData->comments))
          <textarea id="comments" name="comments" class="materialize-textarea" disabled>No hay comentarios en este pedido</textarea>
          @else
          <textarea id="comments" name="comments" class="materialize-textarea" disabled>{{ $orderData->comments }}</textarea>
          @endif
          <label for="comments">Comentarios</label>
          </div>
      </div>
      <h4 class="right">Total: <b>{{ $orderData->order_total }} €</b></h4>
    </div>
  @endforeach
@endsection