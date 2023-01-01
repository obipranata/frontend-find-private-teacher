<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\HttpClient;
use Illuminate\Support\Facades\Session;

class MataPelajaranController extends Controller
{
    public function index()
    {
        $getMapel = HttpClient::fetch("GET", "http://localhost:8000/api/mapel");
        $mapel = $getMapel['data'];
        return view('admin.mapel.index', compact('mapel'));
    }

    public function create()
    {
        return view('admin.mapel.create');
    }

    public function edit($id)
    {
        $getMapel = HttpClient::fetch("GET", "http://localhost:8000/api/mapel/".$id);
        $mapel = $getMapel['data'];
        return view('admin.mapel.edit', compact('mapel'));
    }

    public function store(Request $request)
    {
        $nama = $request->nama;

        $payload = [
            'nama' => $nama
        ];

        $mapel = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/mapel",
            $payload
        );

        if ($mapel['status']) {
            $pesan = "data berhasil disimpan";
            $status = "success";
        } else {
            $pesan = "gagal!!";
            $status = "error";
        }

        return redirect()->route('mapel.index')->with($status, $pesan);
    }

    public function update(Request $request, $id)
    {
        $payload = $request->all();

        $update = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/mapel/".$id."/edit",
            $payload
        );

        if ($update['status']) {
            $pesan = "data berhasil diupdate";
            $status = "success";
        } else {
            $pesan = "gagal!!";
            $status = "error";
        }

        return redirect()->route('mapel.index')->with($status, $pesan);
    }

    public function destroy($id)
    {
        $delete = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/mapel/".$id."/delete"
        );

        if ($delete['status']) {
            $pesan = "data berhasil dihapus";
            $status = "success";
        } else {
            $pesan = "gagal!!";
            $status = "error";
        }
        return redirect()->route('mapel.index')->with($status, $pesan);
    }
}
