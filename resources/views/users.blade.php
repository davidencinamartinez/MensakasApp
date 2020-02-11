@extends('main')

@section('extendedSection')
  @foreach ($data as $userData)
   {{ $userData->name }}
  @endforeach  
@endsection

