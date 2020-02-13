@extends('main')

@section('title', 'Negocios - MensakasApp')

@push('styles')
<style type="text/css">
  .container {  width:70% !important
  }
</style>

@endpush

@section('extendedSection')
<div class="container" style="padding-top: 50px">
  <div class="row">
    <a href="new/business" class="btn-floating btn-large waves-effect waves-light purple darken-1 right"><i class="material-icons">add_circle</i></a>
    <h4>Negocios</h4>
  </div>
</div>
<div class="container responsive-table">
  <table class="highlight">
    <thead>
      <tr>
          <th>Nombre</th>
          <th>Categoría</th>
          <th>Dirección</th>
          <th>Código postal</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $businessData)
      <tr onclick="window.open('/businesses/{{ $businessData->id }}')" style="cursor: pointer;">
        <td>{{ $businessData->bus_name }}</td>
        <td>{{ $businessData->bus_category }}</td>
        <td>{{ $businessData->address }}</td>
        <td>{{ $businessData->postal_code }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
