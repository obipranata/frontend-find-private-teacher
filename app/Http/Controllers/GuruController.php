<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\HttpClient;
use Illuminate\Support\Facades\Session;

class GuruController extends Controller
{
    public function pemesanan()
    {
        $getOrder = HttpClient::fetch("GET", "http://localhost:8000/api/pemesanan/orderGuru");
        $pemesanan = $getOrder['data'];

        if (!session()->isStarted()) {
            session()->start();
        }

        $id_user = session()->get('idUser');

        $guru = HttpClient::fetch(
            "GET",
            "http://localhost:8000/api/guru/".$id_user
        );

        $nama = $guru['data']['nama'];
        $foto = $guru['data']['foto'];

        session()->put("nama", $nama);
        session()->put("foto", $foto);

        return view('guru.order', compact('pemesanan'));
    }

    public function editStatus($id)
    {
        return view('guru.edit-status', compact('id'));
    }
    public function updateStatus(Request $request, $id)
    {
        if (!session()->isStarted()) {
            session()->start();
        }

        $payload = $request->all();

        $id_user = session()->get('idUser');

        $guru = HttpClient::fetch(
            "GET",
            "http://localhost:8000/api/guru/".$id_user
        );

        $payload['id_guru'] = $guru['data']['id'];

        $update = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/pemesanan/$id/edit",
            $payload,
        );

        if ($update['status']) {
            $pesan = "data berhasil diupdate";
            $status = "success";
        } else {
            $pesan = "gagal!!";
            $status = "error";
        }

        return redirect()->route('guru.pemesanan')->with($status, $pesan);
    }

    public function paket()
    {
        $paket = HttpClient::fetch(
            "GET",
            "http://localhost:8000/api/paket/byGuru"
        );

        return view("guru.paket", compact('paket'));
    }

    public function createPaket()
    {
        $kelas = HttpClient::fetch(
            "GET",
            "http://localhost:8000/api/kelas"
        );
        $mapel = HttpClient::fetch(
            "GET",
            "http://localhost:8000/api/mapel"
        );
        return view('guru.add-paket', compact('kelas', 'mapel'));
    }

    public function storePaket(Request $request)
    {
        if (!session()->isStarted()) {
            session()->start();
        }

        $payload = $request->all();

        $id_user = session()->get('idUser');

        $guru = HttpClient::fetch(
            "GET",
            "http://localhost:8000/api/guru/".$id_user
        );

        $payload['id_guru'] = $guru['data']['id'];

        $file = [
            'thumbnail' => $request->file('thumbnail')
        ];

        $paket = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/paket",
            $payload,
            $file
        );

        if ($paket['status']) {
            $pesan = "data berhasil ditambahkan!";
            $status = "success";
        } else {
            $pesan = "gagal!!";
            $status = "error";
        }

        return redirect()->route('guru.paket')->with($status, $pesan);
    }

    public function editPaket($id)
    {
        $paket = HttpClient::fetch(
            "GET",
            "http://localhost:8000/api/paket/$id"
        );

        $kelas = HttpClient::fetch(
            "GET",
            "http://localhost:8000/api/kelas"
        );

        $mapel = HttpClient::fetch(
            "GET",
            "http://localhost:8000/api/mapel"
        );


        return view('guru.edit-paket', compact('kelas', 'mapel', 'paket'));
    }

    public function updatePaket(Request $request, $id)
    {
        $payload = $request->all();
        $file = [];

        if (isset($payload['thumbnail'])) {
            $file = [
                'thumbnail' => $request->file('thumbnail')
            ];
        }

        $update = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/paket/$id/edit",
            $payload,
            $file
        );

        if ($update['status']) {
            $pesan = "data berhasil diupdate";
            $status = "success";
        } else {
            $pesan = "gagal!!";
            $status = "error";
        }

        return redirect()->route('guru.paket')->with($status, $pesan);
    }

    public function destroyPaket($id)
    {
        $delete = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/paket/".$id."/delete"
        );

        if ($delete['status']) {
            $pesan = "data berhasil dihapus";
            $status = "success";
        } else {
            $pesan = "gagal!!";
            $status = "error";
        }
        return redirect()->route('guru.paket')->with($status, $pesan);
    }

    public function profile()
    {
        $id_user = session()->get('idUser');
        $getMe = HttpClient::fetch(
            "GET",
            "http://localhost:8000/api/guru/".$id_user
        );
        $data = $getMe['data'];
        $data['route'] = 'guru.updateProfile';
        return view('guru.profile', compact('data'));
    }

    public function updateProfile(Request $request)
    {
        $payload = $request->all();

        $id_user = session()->get('idUser');

        // update password
        $user = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/user/".$id_user."/update",
            $payload
        );

        $guru = HttpClient::fetch(
            "GET",
            "http://localhost:8000/api/guru/".$id_user
        );

        $id = $guru['data']['id'];

        $file = [];

        if (isset($payload['foto'])) {
            $file = [
                'foto' => $request->file('foto')
            ];
        }

        $update = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/guru/$id/edit",
            $payload,
            $file
        );

        if ($update['status']) {
            $pesan = "data berhasil diupdate";
            $status = "success";
            session()->put('foto', $update['data']['foto']);
        } else {
            $pesan = "gagal!!";
            $status = "error";
        }

        return redirect()->back()->with($status, $pesan);
    }
}
