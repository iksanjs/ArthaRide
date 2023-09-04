<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PenggantianController extends Controller
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
        
        $url = env('LUMEN_API_URL_SEWA') . '/api/sewa/penggantians'; // Ganti dengan URL Lumen yang sesuai
        $response = Http::get($url);
        $penggantians = $response->json();

        if ($userData['user']['role'] == 'Admin') {
            return view('Admin.Penggantian.index', ['penggantians' => $penggantians]);
        } elseif ($userData['user']['role'] == 'Pengurus') {
            return view('Pengurus.Penggantian.index', ['penggantians' => $penggantians]);
        } elseif ($userData['user']['role'] == 'Akuntan') {
            return view('Akuntan.Penggantian.index', ['penggantians' => $penggantians]);
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
        //
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
