@extends('templates-guru')

@section('content-guru')
<div x-data="data">
  <div class="w-full overflow-x-hidden border-t flex flex-col">
    <main class="w-full flex-grow p-6">
        <h1 class="text-3xl text-black pb-6">Pemesanan</h1>

        @livewire('message')

        <div class="w-full mt-12">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> Tabel Pemesanan
            </p>
            <div class="bg-white overflow-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Nama Ortu</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Mata Pelajaran</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Kelas</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Harga</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No Hp</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Status</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Alamat</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                      @foreach ($pemesanan as $p)
                        @php
                            $status = $p['pemesanan']['status'];
                        @endphp
                        <tr>
                            <td class="text-left py-3 px-4">{{$p['pemesanan']['orang_tua']['nama']}}</td>
                            <td class="text-left py-3 px-4">{{$p['harga_paket']['mata_pelajaran']['nama']}}</td>
                            <td class="text-left py-3 px-4">{{$p['harga_paket']['kelas']['nama_kelas']}}</td>
                            <td class="text-left py-3 px-4">{{$p['harga_paket']['harga']}}</td>
                            <td class="text-left py-3 px-4">{{$p['pemesanan']['orang_tua']['no_hp']}}</td>
                            <td class="text-left py-3 px-4">
                              @if ($status == 0)
                                Belum Dikonfirmasi
                              @elseif($status == 1)
                                Dikonfirmasi
                              @elseif($status == 2)
                                Ditolak
                              @elseif($status == 3)
                                Lunas
                              @endif
                            </td>
                            <td>{{$p['pemesanan']['orang_tua']['alamat']}}</td>
                            <td class="text-left py-3 px-4">
                              <a href="{{route('guru.editStatus', $p['pemesanan']['id'])}}" type="button" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">
                                Update
                              </a>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
  </div>
</div>
@endsection