<div x-data="data">
    <div x-init="fetchUser()"></div>
    <section id="available" class="py-[80px] bg-[#E5E5E5]">
        <div class="container flex gap-[40px] flex-wrap">
            <template x-for="(paket, index) in course">
                <div class="card max-w-[328px] rounded-lg shadow-md ">
                    <a href="#">
                    <img x-bind:src="`http://localhost:8000/storage/${paket.thumbnail}`" class="rounded-t-lg" src="" alt="" />
                    </a>
                    <div class="p-5 flex justify-between">
                    <div>
                        <a href="#">
                        <h5 x-text="paket.mata_pelajaran.nama" class="mb-2 text-[21px] font-bold text-[#141E32]"></h5>
                        </a>
                        <p x-text="paket.guru.nama" class=" font-normal text-[#545BE8]"></p>
                        <p x-text="'Durasi Belajar ' +paket.durasi_belajar+ ' Menit'" class="text-gray-700 dark:text-gray-400"></p>
                        <p x-text="paket.jumlah_pertemuan+ ' Kali Pertemuan'" class="text-gray-700 dark:text-gray-400"></p>
                        <p x-text="'Rp. '+ paket.harga" class="text-[#141E32] font-bold"></p>
                        <button type="button" 
                        class="mt-3 inline-flex items-center px-[30px] py-[10px] text-sm font-medium text-center text-white rounded-lg bg-primary" x-on:click="tes(paket.id)" x-bind:message="'Apakah anda yakin?'" >
                        Get
                        </button>
                    </div>
                    <div>
                        <p x-text="'Kelas ' +paket.kelas.nama_kelas" class="text-[#545BE8] leading-[19px]"></p>
                    </div>
                    </div>
                </div>
            </template>
            @if ($textHeading)
                <div class="w-[364px]">
                    <span class="text-primary">AVAILABLE FOR YOU</span>
                    <h1 class="font-bold text-[40px] leading-[60px]">Available Courses</h1>
                    <p class="text-[18px] text-[#969696] leading-[27px] mb-[24px] mt-[16px]">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam dignissim, sem non convallis molestie.
                    </p>
                    <a href="/course"
                    class="inline-flex items-center px-[56px] py-[13px] text-sm font-medium text-center text-white rounded-lg bg-primary">
                    See All
                    </a>
                </div>
            @endif
        </div>
    </section>

    <div :class="{'' : isOn, 'hidden' : !isOn}" tabindex="-1" class="fixed hidden top-[200px] left-[30%] z-50 p-4 w-full h-modal md:h-full">
    <div class="relative w-full h-full max-w-[600px] md:h-auto">
        <div class="relative bg-white rounded-lg shadow ">
            <div class="px-2 py-2">
                <template x-for = "(paket, index) in course">
                    <template x-if = "paket.id == idPaket">
                        <div>
                            <div class="flex gap-2">
                                <img class="rounded-sm max-w-[200px]" src="" x-bind:src="'http://localhost:8000/storage/'+paket.guru.foto">
                                <div>
                                    <table>
                                            <tr>
                                                <th class="text-start">Nama Guru</th>
                                                <td>:</td>
                                                <td x-text="paket.guru.nama"></td>
                                            </tr>
                                            <tr>
                                                <th class="text-start">No Hp </th>
                                                <td>:</td>
                                                <td x-text="paket.guru.no_hp"></td>
                                            </tr>
                                            <tr>
                                                <th class="text-start">Pendidikan Terakhir </th>
                                                <td>:</td>
                                                <td x-text="paket.guru.pendidikan_terakhir"></td>
                                            </tr>
                                            <tr class="items-start">
                                                <th class="text-start">Alamat </th>
                                                <td>:</td>
                                                <td x-text="paket.guru.alamat"></td>
                                            </tr>
                                    </table>
                                </div>
                            </div>
                            <p x-text="paket.deskripsi"></p>
                        </div>
                    </template>
                </template>
            </div>
            <div class="p-6 text-center">
                <form action="{{route('pemesanan.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="id_harga_paket" x-model="idPaket">
                    <input type="hidden" name="id_user" x-model="idUser">
                    <button type="submit" class="text-white bg-primary focus:ring-4 focus:outline-none focus:ring-red-300  font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Get
                    </button>
                    <button x-on:click="isOn = ! isOn" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>