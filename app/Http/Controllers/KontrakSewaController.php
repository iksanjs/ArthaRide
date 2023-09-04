<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class KontrakSewaController extends Controller
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
        
        $url = env('LUMEN_API_URL_SEWA') . '/api/sewa/kontraksewas'; // Ganti dengan URL Lumen yang sesuai
        $response = Http::get($url);
        $kontraksewas = $response->json();

        $url2 = env('LUMEN_API_URL_SEWA') . '/api/sewa/sppks/antriansppks';
        $response2 = Http::get($url2);
        $antrian_sppks = $response2->json();

        $url3 = env('LUMEN_API_URL_SEWA') . '/api/sewa/kontraksewas/proseskontraksewa';
        $response3 = Http::get($url3);
        $proses_kontraksewas = $response3->json();

        if ($userData['user']['role'] == 'Admin') {
            return view('Admin.KontrakSewa.index', ['kontraksewas' => $kontraksewas, 'antrian_sppks' => $antrian_sppks]);
        } elseif ($userData['user']['role'] == 'Pengurus') {
            return view('Pengurus.KontrakSewa.index', ['kontraksewas' => $kontraksewas, 'proses_kontraksewas' => $proses_kontraksewas]);
        } elseif ($userData['user']['role'] == 'Akuntan') {
            return view('Akuntan.KontrakSewa.index', ['kontraksewas' => $kontraksewas, 'antrian_sppks' => $antrian_sppks]);
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
        $id_sppk = request()->query('id_sppk');
        $token = session('jwt_token'); // Ambil token dari session

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get(env('LUMEN_API_URL_AUTH') . '/api/me');

        $userData = $response->json();

        $url = env("LUMEN_API_URL_SEWA") . "/api/sewa/sppks/$id_sppk"; // Ganti dengan URL Lumen yang sesuai
        $response = Http::get($url);
        $sppk = $response->json();

        $url2 = env('LUMEN_API_URL_KENDARAAN') . '/api/kendaraan/kendaraans/getstock';
        $response2 = Http::get($url2);
        $kendaraans = $response2->json();

        if ($userData) {
            return view('Admin.KontrakSewa.create', ['sppk' => $sppk, 'kendaraans' => $kendaraans]);
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
        $url = env('LUMEN_API_URL_SEWA') . '/api/sewa/kontraksewas';

        $response = Http::post($url, $request->all());

        if ($response->successful()) {
            return redirect()->route('kontraksewa.index')->with('success', 'Data berhasil disimpan.');
        } else {
            return back()->withInput()->withErrors(['message' => 'Gagal menyimpan data.']);
        }
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

    public function approved($id_kontraksewa)
    {
        $url = env('LUMEN_API_URL_SEWA') . "/api/sewa/kontraksewas/$id_kontraksewa/approve";
        $response = Http::put($url);

        if ($response->successful()) {
            return redirect()->route('kontraksewa.index')->with('success', 'Data Kontrak Sewa berhasil diapprove.');
        } else {
            return back()->withErrors(['message' => 'Gagal Approve data Kontrak Sewa.']);
        }
    }
    public function rejected($id_kontraksewa)
    {
        $url = env('LUMEN_API_URL_SEWA') . "/api/sewa/kontraksewas/$id_kontraksewa/reject";
        $response = Http::put($url);

        if ($response->successful()) {
            return redirect()->route('kontraksewa.index')->with('success', 'Data Kontrak Sewa berhasil di Riject.');
        } else {
            return back()->withErrors(['message' => 'Gagal Reject data Kontrak Sewa.']);
        }
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
