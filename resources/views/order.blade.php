@extends('templates')

@section('content')

<section class="bg-[#E5E5E5] h-[100vh] py-[80px]">
  <div class="container" x-data="data">
  
    @livewire('message')
  
    <div x-init="fetchOrder()"></div>
    <template x-if="order.data.length != 0">
      <div>
        <h1 class="font-bold text-[40px] text-black leading-[60px]">Data Order</h1>
        <div class="overflow-x-auto relative">
            <table class="w-full text-sm text-left text-black">
                <thead class="text-xs bg-primary text-white">
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
                        <td class="py-4 px-6" x-text="'Rp. '+(pesan.harga_paket.harga/1000).toFixed(3)"></td>
                        <td>
                          <button class="py-2 px-2 rounded-full text-white" 
                          x-text=
                          "pesan.pemesanan.status == 0 ? 'Belum Dikonfirmasi' : pesan.pemesanan.status == 1 ? 'Dikonfirmasi' : pesan.pemesanan.status == 2 ? 'Ditolak' : 'Lunas' "
                          x-bind:class=
                          "pesan.pemesanan.status == 0 ? 'bg-yellow-500' : pesan.pemesanan.status == 1 ? 'bg-cyan-500' : pesan.pemesanan.status == 2 ? 'bg-red-500' : 'bg-green-500'">
                          </button>
                        </td>
                        <td>
                          <a href="" target="_blank" x-bind:href="'https://wa.me/'+pesan.harga_paket.guru.no_hp">
                            <img src="./assets/icons/wa.png" width="30">
                          </a>
                        </td>
                    </tr>
                  </template>
                </tbody>
            </table>
          </div>
        </div>
      </div>
  </template>
  <template x-if="order.data.length == 0">
    <div>
      <div class="flex justify-center">
        <img src="./assets/icons/empty.jpg" width="500" class="rounded-xl">
      </div>
      <h1 class="text-[54px] text-primary text-center">
        Data Kosong...
      </h1>
    </div>
  </template>
</section>



@endsection