@extends('main')

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
        <h4>Pedido Nº: {{ $orderData->id }}</h4>
      </div>
      <div class="row">
        <ul class="collapsible">
          <li>
            <div class="collapsible-header">
              <i class="material-icons">assignment</i>
              Menús/Packs
              <span class="badge">({{ count($items) }}) elementos</span></div>
              @foreach ($items as $orderItem)
                <div class="collapsible-body"><p>{{ $orderItem->item }}</p></div>
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
                <div class="collapsible-body"><p>{{ $orderExtra->extra }}</p></div>
              @endforeach
          </li>
        </ul>
      </div>
      <h4 class="right">Total: <b>{{ $orderData->order_total }} €</b></h4>
    </div>
  @endforeach
@endsection