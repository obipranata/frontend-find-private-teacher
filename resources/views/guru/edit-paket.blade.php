@extends('templates-guru')

@section('content-guru')
<div class="w-full overflow-x-hidden border-t flex flex-col">
  <main class="w-full flex-grow p-6">
      <h1 class="text-3xl text-black pb-6">Add Paket Private</h1>
      <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
        <p class="text-xl pb-6 flex items-center">
            <i class="fas fa-list mr-3"></i> Form Create
        </p>
        <div class="leading-loose">
            <form class="p-10 bg-white rounded shadow-xl" action="{{route('guru.updatePaket', $paket['data']['id'])}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="mb-6">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="id_kelas">
                  <option disabled>Pilih</option>
                  @foreach ($kelas['data'] as $k)
                    <option {{$k['id'] == $paket['data']['id_kelas'] ? 'selected' : ''}} value="{{$k['id']}}">{{$k['nama_kelas']}}</option>
                  @endforeach
                </select>
              </div>

              <div class="mb-6">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mata Pelajaran</label>
                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="id_mata_pelajaran">
                  <option selected disabled>Pilih</option>
                  @foreach ($mapel['data'] as $m)
                    <option {{$m['id'] == $paket['data']['id_mata_pelajaran'] ? 'selected' : ''}} value="{{$m['id']}}">{{$m['nama']}}</option>
                  @endforeach
                </select>
              </div>

              <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                <input type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="harga" required name="harga" value="{{$paket['data']['harga']}}">
              </div>
              <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Durasi Belajar</label>
                <input type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="durasi belajar" required name="durasi_belajar" value="{{$paket['data']['durasi_belajar']}}">
              </div>
              <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Pertemuan</label>
                <input type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="jumlah pertemuan" required name="jumlah_pertemuan" value="{{$paket['data']['jumlah_pertemuan']}}">
              </div>

              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Thumbnail</label>
              <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" type="file" name="thumbnail">
              
              <div>
                <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                <textarea id="deskripsi" rows="4" class="text-smbg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" name="deskripsi" placeholder="deskripsi...">{{$paket['data']['deskripsi']}}</textarea>
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