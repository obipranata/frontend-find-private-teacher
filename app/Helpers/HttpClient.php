<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades;

class HttpClient
{
    public static function fetch($method, $url, $body = [], $files = [])
    {
        $headers = [];
        $token = session()->get("token", "");

        if ($token != "") {
            $headers["Authorization"] = "Bearer $token";
        }

        if ($method == "GET") {
            return Http::withHeaders($headers)->get($url)->json();
        }

        if (sizeof($files) > 0) {
            $client = Http::asMultipart()->withHeaders($headers);

            foreach ($files as $key=> $file) {
                $path = $file->getPathname();
                $name = $file->getClientOriginalName();
                // attach file
                $client->attach($key, file_get_contents($path), $name);
            }
            // fetch api
            return $client->post($url, $body);
        }

        // fetch post
        return Http::withHeaders($headers)->post($url, $body)->json();
    }
}
