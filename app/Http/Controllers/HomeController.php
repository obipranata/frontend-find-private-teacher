<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\HttpClient;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $getMapel = HttpClient::fetch("GET", "http://localhost:8000/api/mapel");
        $getGuru = HttpClient::fetch("GET", "http://localhost:8000/api/guru");
        $getPaket = HttpClient::fetch("GET", "http://localhost:8000/api/paket");
        $mapel = count($getMapel['data']);
        $guru = count($getGuru['data']);
        $paket = count($getPaket['data']);
        return view('index', compact('mapel', 'guru', 'paket'));
    }
}
