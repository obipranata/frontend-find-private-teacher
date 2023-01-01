@extends('templates-admin')

@section('content-admin')
<div class="w-full overflow-x-hidden border-t flex flex-col">
  <main class="w-full flex-grow p-6">
      <h1 class="text-3xl text-black pb-6">Edit Mata Pelajaran</h1>
      <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
        <p class="text-xl pb-6 flex items-center">
            <i class="fas fa-list mr-3"></i> Form Edit
        </p>
        <div class="leading-loose">
            <form class="p-10 bg-white rounded shadow-xl" action="{{route('mapel.update', $mapel['id'])}}" method="post" >
              @csrf
              <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mata Pelajaran</label>
                <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="nama mapel" required name="nama" value="{{$mapel['nama']}}">
              </div>
                <div class="mt-6">
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
                </div>
            </form>
        </div>
      </div>
  </main>
</div>
@endsection