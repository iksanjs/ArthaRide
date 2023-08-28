<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function dashboard()
    {
        $token = session('jwt_token'); // Ambil token dari session

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('http://localhost:8008/api/me');

        $userData = $response->json();

        if ($userData['user']['role'] == 'Admin') {
            return view('Admin.dashboard');
        } elseif ($userData['user']['role'] == 'Pengurus') {
            return view('Pengurus.dashboard');
        } elseif ($userData['user']['role'] == 'Akuntan') {
            return view('Akuntan.dashboard');
        } else {
            return view('auth.login');
        }
    }
}
