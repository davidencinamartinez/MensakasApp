@extends('main')

@push('scripts')
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('select').not('.disabled').formSelect();
    $('a[href^="users"]').attr('href', '/users');
});
</script>
@endpush
@push('styles')
<style type="text/css">
  .container {width:70% !important}
</style>

@endpush

@section('extendedSection')
<div class="container" style="padding-top: 50px">
  <div class="row">
    <a href="new/user" class="btn-floating btn-large waves-effect waves-light purple darken-1 right"><i class="material-icons">person_add</i></a>
    <h4>Usuarios</h4>
  </div>
</div>
<div class="container responsive-table">
  <table class="highlight">
    <thead>
      <tr>
          <th>Nom</th>
          <th>Categoria</th>
          <th>Descripció</th>
          <th>Codi postal</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $businessData)
      <tr onclick="window.open('/businesses/{{ $businessData->id }}')" style="cursor: pointer;">
        <td>{{ $businessData->bus_name }}</td>
        @if ($businessData->category_id == 1)
          <td>Japones</td>
        @elseif ($businessData->category_id == 2)
            <td>Haburgueseria</td>
        @endif
        <td>{{ $businessData->bus_description }}</td>
        <td>{{ $businessData->postal_code }}</td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
