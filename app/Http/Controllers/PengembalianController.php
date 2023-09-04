<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $token = session('jwt_token'); // Ambil token dari session

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get(env('LUMEN_API_URL_AUTH') . '/api/me');

        $userData = $response->json();
        
        $url = env('LUMEN_API_URL_SEWA') . '/api/sewa/pengembalians'; // Ganti dengan URL Lumen yang sesuai
        $response = Http::get($url);
        $pengembalians = $response->json();

        if ($userData['user']['role'] == 'Admin') {
            return view('Admin.Pengembalian.index', ['pengembalians' => $pengembalians]);
        } elseif ($userData['user']['role'] == 'Pengurus') {
            return view('Pengurus.Pengembalian.index', ['pengembalians' => $pengembalians]);
        } elseif ($userData['user']['role'] == 'Akuntan') {
            return view('Akuntan.Pengembalian.index', ['pengembalians' => $pengembalians]);
        } else {
            return view('auth.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $token = session('jwt_token'); // Ambil token dari session

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get(env('LUMEN_API_URL_AUTH') . '/api/me');

        $userData = $response->json();

        $url = env("LUMEN_API_URL_SEWA") . "/api/sewa/kontraksewas/sewaberjalan"; // Ganti dengan URL Lumen yang sesuai
        $response = Http::get($url);
        $kontraksewas = $response->json();

        // $url1 = env("LUMEN_API_URL_SEWA") . "/api/sewa/penyewas/{$kontraksewa['id_penyewa']}";
        // $response1 = Http::get($url1);
        // $penyewa = $response1->json();
        // $url2 = env("LUMEN_API_URL_KENDARAAN") . "/api/kendaraan/kendaraans/{$kontraksewa['no_polisi']}";
        // $response2 = Http::get($url2);
        // $kendaran = $response2->json();

        if ($userData) {
            return view('Admin.Pengembalian.create', ['kontraksewas' => $kontraksewas]);
        }  else {
            return view('auth.login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
