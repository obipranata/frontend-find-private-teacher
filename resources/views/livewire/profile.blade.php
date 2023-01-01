<form class="p-10 bg-white rounded shadow-xl" action="{{route($data['route'])}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-6">
      <label class="block mb-2 text-sm font-medium">Nama</label>
      <input type="text" class="bg-gray-50 border border-black-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="nama" required name="nama" value="{{$data['nama']}}">
    </div>
    <div class="mb-6">
      <label class="block mb-2 text-sm font-medium">No Hp</label>
      <input type="number" class="bg-gray-50 border border-black-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="no hp" required name="no_hp" value="{{$data['no_hp']}}">
    </div>

    <div class="mb-6">
        <label class="block mb-2 text-sm font-medium">Password</label>
        <input type="password" class="bg-gray-50 border border-black-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="....." name="password">
    </div>

    @if (Route::currentRouteName() == 'guru.profile')
    <div class="mb-6">
      <label class="block mb-2 text-sm font-medium">Pendidikan Terakhir</label>
      <input type="text" class="bg-gray-50 border border-black-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="pendidikan terakhir" required name="pendidikan_terakhir" value="{{$data['pendidikan_terakhir']}}">
    </div>

    <label class="block mb-2 text-sm font-medium">Upload Foto</label>
    <input class="mb-2 block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-black-300 cursor-pointer dark:text-gray-400 focus:outline-noneby="user_avatar_help" type="file" name="foto">
    @endif

    <div>
      <label for="alamat" class="block mb-2 text-sm font-medium">Alamat</label>
      <textarea id="alamat" rows="4" class="text-smbg-gray-50 border border-black-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="alamat" placeholder="alamat...">{{$data['alamat']}}</textarea>
    </div>
    
      <div class="mt-6">
          <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
      </div>
  </form>