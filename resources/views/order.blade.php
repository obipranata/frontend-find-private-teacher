@extends('templates')

@section('content')

<section class="bg-[#E5E5E5] h-[100vh] py-[80px]">
  <div class="container" x-data="data">
  
    @livewire('message')
  
    <div x-init="fetchOrder()"></div>
    <h1 class="font-bold text-[40px] text-primary leading-[60px]">Data Order</h1>
    <div class="overflow-x-auto relative">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                  <th scope="col" class="py-3 px-6">
                    Nama Mata Pelajaran
                  </th>
                  <th scope="col" class="py-3 px-6">
                    Kelas
                  </th>
                  <th scope="col" class="py-3 px-6">
                    Nama Guru
                  </th>
                  <th scope="col" class="py-3 px-6">
                    Harga Paket
                  </th>
                  <th scope="col" class="py-3 px-6">
                    Status
                  </th>
                  <th scope="col" class="py-3 px-6">
                    Contact
                  </th>
              </tr>
          </thead>
          <tbody>
            <template x-for="(pesan, index) in order.data">
              <tr class="bg-white border-b ">
                  <th scope="row" class="py-4 px-6 font-medium" x-text="pesan.harga_paket.mata_pelajaran.nama"></th>
                  <td class="py-4 px-6" x-text="pesan.harga_paket.kelas.nama_kelas"></td>
                  <td class="py-4 px-6" x-text="pesan.harga_paket.guru.nama"></td>
                  <td class="py-4 px-6" x-text="pesan.harga_paket.harga"></td>
                  <td>
                    <button class="py-2 px-2 rounded-full text-white" 
                    x-text=
                    "pesan.pemesanan.status == 0 ? 'Belum Dikonfirmasi' : pesan.pemesanan.status == 1 ? 'Dikonfirmasi' : pesan.pemesanan.status == 2 ? 'Ditolak' : 'Lunas' "
                    x-bind:class=
                    "pesan.pemesanan.status == 0 ? 'bg-yellow-500' : pesan.pemesanan.status == 1 ? 'bg-cyan-500' : pesan.pemesanan.status == 2 ? 'bg-red-500' : 'bg-green-500'">
                    </button>
                  </td>
                  <td>
                    <a href="" x-bind:href="'https://wa.me/'+pesan.harga_paket.guru.no_hp">
                      <img src="./assets/icons/wa.png" width="30">
                    </a>
                  </td>
              </tr>
            </template>
          </tbody>
      </table>
    </div>
  </div>
</section>



@endsection