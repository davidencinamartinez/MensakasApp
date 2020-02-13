@extends('main')

@section('title', 'Pedidos - MensakasApp')

@push('styles')
<style type="text/css">
  .container {width:70% !important}
</style>
  
@endpush

@section('extendedSection')
<div class="container" style="padding-top: 50px">
  <div class="row">
    <h4>Pedidos</h4>
  </div>
</div>
<div class="container responsive-table">
  <table class="highlight">
    <thead>
      <tr>
          <th>Referencia</th>
          <th>Fecha</th>
          <th>Total (€)</th>
          <th>Estado</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $orderData)
      <tr onclick="window.open('/orders/{{ $orderData->id }}')" style="cursor: pointer;">
        <td>{{ $orderData->id }}</td>
        <td>{{ date('d/m/Y - H:i', strtotime($orderData->order_date)) }}</td>
        <td>{{ $orderData->order_total }}</td>
        @if ($orderData->order_status == 1)
          <td>Confirmada</td>
        @else
          <td>Pendiente</td>
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection