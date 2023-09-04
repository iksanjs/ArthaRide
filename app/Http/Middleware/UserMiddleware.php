<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View; // Tambahkan ini

class UserMiddleware
{
    public function handle($request, Closure $next)
    {
        $token = session('jwt_token'); // Ambil token dari session

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get(env('LUMEN_API_URL_AUTH') . '/api/me');

        $userData = $response->json();

        // Dapatkan nama pengguna dari respons
        $namaPengguna = $userData['user']['name'];
        
        View::share('namaPengguna', $namaPengguna); // Perbaiki ini

        return $next($request);
    }
}