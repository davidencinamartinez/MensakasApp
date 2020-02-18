@extends('main')

@section('title', 'Pedidos - MensakasApp')

@push('styles')
<style type="text/css">
  .container {width:70% !important}
</style>  
@endpush

@section('extendedSection')
<div class="container" style="padding-top: 50px; padding-bottom: 50px">
  <div class="row">
    <h4>Pedidos</h4>
  </div>
</div>
<div class="container responsive-table">
  <table class="highlight">
    <thead>
      <tr>
          <th>Opciones</th>
          <th>Referencia</th>
          <th>Negocio</th>
          <th>Fecha</th>
          <th>Total (€)</th>
          <th>Estado</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $orderData)
      <tr>
        <form id="delForm" action="/admin/orders/delete/{{ $orderData->id }}" 
          method="POST" style="display:none;" 
          onsubmit="return confirm('Estás seguro que deseas eliminar este registro?');">
          @csrf
        </form>
        <td>
          <ul id="dropdown2" class="dropdown-content hover">
            <li>
              <a href="/admin/orders/{{ $orderData->id }}">
                Ver detalles
                <i class="material-icons">remove_red_eye</i>
              </a>
            </li>
          </ul>
          <a class="btn dropdown-trigger" data-target="dropdown2"><i class="material-icons">settings</i></a>
        </td> 
        <td>{{ $orderData->id }}</td>
        <td>{{ $orderData->bus_name }}</td>
        <td>{{ date('d/m/Y - H:i', strtotime($orderData->order_date)) }}</td>
        <td>{{ $orderData->order_total }}</td>
        @if ($orderData->order_status == 1)
          <td>Confirmada</td>
        @elseif ($orderData->order_status == 2)
          <td>Pendiente</td>
        @elseif ($orderData->order_status == 3)
          <td>En proceso</td>
        @elseif ($orderData->order_status == 4)
          <td>Listo para recogida</td>
        @else
          <td>Entregado</td>
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection