<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\HttpClient;
use Illuminate\Support\Facades\Session;

class KelasController extends Controller
{
    public function index()
    {
        $getKelas = HttpClient::fetch("GET", "http://localhost:8000/api/kelas");
        $kelas = $getKelas['data'];
        return view('admin.kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('admin.kelas.create');
    }

    public function edit($id)
    {
        $getKelas = HttpClient::fetch("GET", "http://localhost:8000/api/kelas/".$id);
        $kelas = $getKelas['data'];
        return view('admin.kelas.edit', compact('kelas'));
    }

    public function store(Request $request)
    {
        $nama_kelas = $request->nama_kelas;

        $payload = [
            'nama_kelas' => $nama_kelas
        ];

        $kelas = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/kelas",
            $payload
        );

        if ($kelas['status']) {
            $pesan = "data berhasil disimpan";
            $status = "success";
        } else {
            $pesan = "gagal!!";
            $status = "error";
        }

        return redirect()->route('kelas.index')->with($status, $pesan);
    }

    public function update(Request $request, $id)
    {
        $payload = $request->all();

        $update = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/kelas/".$id."/edit",
            $payload
        );

        if ($update['status']) {
            $pesan = "data berhasil diupdate";
            $status = "success";
        } else {
            $pesan = "gagal!!";
            $status = "error";
        }

        return redirect()->route('kelas.index')->with($status, $pesan);
    }

    public function destroy($id)
    {
        $delete = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/kelas/".$id."/delete"
        );

        if ($delete['status']) {
            $pesan = "data berhasil dihapus";
            $status = "success";
        } else {
            $pesan = "gagal!!";
            $status = "error";
        }
        return redirect()->route('kelas.index')->with($status, $pesan);
    }
}
