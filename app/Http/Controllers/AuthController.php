<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClient;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        if (!session()->isStarted()) {
            session()->start();
        }
        session()->flush();
        return redirect('/');
    }
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $payload = [
            'email' => $email,
            'password' => $password,
        ];

        $auth = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/login",
            $payload,
        );

        if (!session()->isStarted()) {
            session()->start();
        }

        if ($auth['status'] == false) {
            return redirect('/')->with('error', $auth['message']);
        }

        $token = $auth['data']['auth']['token'];
        $token_type = $auth['data']['auth']['token_type'];
        $idUser = $auth['data']['user']['id'];
        $role = $auth['data']['user']['role'];

        session()->put("token", "$token_type $token");
        session()->put("idUser", $idUser);
        session()->put("role", $role);

        if ($role == 0) {
            return redirect()->route('mapel.index');
        } elseif ($role == 1) {
            return redirect()->route('guru.pemesanan');
        }
        return redirect('/')->with('success', "Login berhasil! Selamat Datang");
    }

    public function register(Request $request)
    {
        $payload = $request->all();

        if ($request->pilihan == 'ortu') {
            $register = HttpClient::fetch(
                "POST",
                "http://localhost:8000/api/ortu",
                $payload,
            );
        } else {
            $file = [
                'foto' => $request->file('foto')
            ];
            $register = HttpClient::fetch(
                "POST",
                "http://localhost:8000/api/guru",
                $payload,
                $file
            );
        }

        if ($register['status']) {
            $pesan = "berhasil registrasi. silahkan login";
            $status = "success";
        } else {
            $pesan = "gagal!!";
            $status = "error";
        }
        return redirect('/')->with($status, $pesan);
    }
}
