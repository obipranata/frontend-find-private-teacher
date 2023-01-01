@extends('templates')

@section('content')
  <div class="container mt-5">
    @livewire('message')
    @livewire('profile', ['data' => $data])
  </div>
@endsection