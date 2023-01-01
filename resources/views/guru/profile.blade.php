@extends('templates-guru')

@section('content-guru')
<div class="w-full overflow-x-hidden border-t flex flex-col">
  <main class="w-full flex-grow p-6">
      <h1 class="text-3xl text-black pb-6">My Profile</h1>
      @livewire('message')
      <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
        <p class="text-xl pb-6 flex items-center">
            <i class="fas fa-list mr-3"></i> Form Profile
        </p>
        <div class="leading-loose">
            @livewire('profile', ['data' => $data])
        </div>
      </div>
  </main>
</div>
@endsection