@extends('main')

@push('scripts')
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('select').not('.disabled').formSelect();
});
</script>
@endpush

@section('extendedSection')
<div class="container responsive-table">
<h4>Usuarios</h4>
<table class="highlight">
  <thead>
    <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>E-Mail</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $userData)
    <tr onclick="window.open('/users/{{ $userData->id }}')">
      <td>{{ $userData->first_name }}</td>
      <td>{{ $userData->last_name }}</td>
      <td>{{ $userData->email }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

@endsection