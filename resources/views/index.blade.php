@extends('templates')

@section('content')

<div class="container">

  @livewire('message')

</div>

  @livewire('hero')

  @livewire('benefit')

  @livewire('people-taking',[
      'mapel' => $mapel,
      'guru' => $guru,
      'paket' => $paket
    ]
  )

  @livewire('avalaible', ['textHeading' => true]);

@endsection