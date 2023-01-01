  <!-- Main modal -->
  <div id="register-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <!-- Modal content -->
        <div x-data="{pilihan: 'ortu'}" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="px-6 py-1 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Silahkan Registrasi</h3>
                <form class="space-y-1" action="{{route('register')}}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div>
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">nama</label>
                        <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="nama" required>
                    </div>
                    <div>
                        <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">no hp</label>
                        <input type="number" name="no_hp" id="no_hp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="nomor hp" required>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="obito@email.com" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
                    <div>
                      <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih</label>
                      <select x-on:change="pilihan = $event.target.value" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" name="pilihan">
                        <option value="ortu">Orang Tua</option>
                        <option value="guru">Guru</option>
                      </select>
                    </div>
                    <template x-if="pilihan == 'guru' ">
                      <div>
                        <div>
                          <label for="pendidikan_terakhir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pendidikan Terakhir</label>
                          <input type="text" name="pendidikan_terakhir" id="pendidikan_terakhir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="perndidikan terakhir" required>
                        </div>
                        <div>
                          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Upload</label>
                          <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" type="file" name="foto">
                        </div>
                      </div>
                    </template>
                    <div>
                      <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                      <textarea id="alamat" rows="4" class="text-smbg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" name="alamat" placeholder="alamat..."></textarea>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrasi</button>
                </form>
            </div>
        </div>
    </div>
  </div> 
