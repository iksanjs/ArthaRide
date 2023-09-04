<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class STWahanatoCabangController extends Controller
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
        
        $url = env('LUMEN_API_URL_SEWA') . '/api/sewa/stwahanatocabangs'; // Ganti dengan URL Lumen yang sesuai
        $response = Http::get($url);
        $stwahanatocabangs = $response->json();

        $url2 = env('LUMEN_API_URL_SEWA') . '/api/sewa/kontraksewas/antriankontraksewas';
        $response2 = Http::get($url2);
        $antrian_kontraksewas = $response2->json();

        $url3 = env('LUMEN_API_URL_SEWA') . '/api/sewa/stwahanatocabangs/prosesserahterima';
        $response3 = Http::get($url3);
        $proses_serahterimas = $response3->json();

        if ($userData['user']['role'] == 'Admin') {
            return view('Admin.STWahanatoCabang.index', ['stwahanatocabangs' => $stwahanatocabangs, 'antrian_kontraksewas' => $antrian_kontraksewas]);
        } elseif ($userData['user']['role'] == 'Pengurus') {
            return view('Pengurus.STWahanatoCabang.index', ['stwahanatocabangs' => $stwahanatocabangs, 'proses_serahterimas' => $proses_serahterimas]);
        } elseif ($userData['user']['role'] == 'Akuntan') {
            return view('Akuntan.STWahanatoCabang.index', ['stwahanatocabangs' => $stwahanatocabangs]);
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
        $id_kontraksewa = request()->query('id_kontraksewa');
        $token = session('jwt_token'); // Ambil token dari session

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get(env('LUMEN_API_URL_AUTH') . '/api/me');

        $userData = $response->json();

        $url = env("LUMEN_API_URL_SEWA") . "/api/sewa/kontraksewas/$id_kontraksewa"; // Ganti dengan URL Lumen yang sesuai
        $response = Http::get($url);
        $kontraksewa = $response->json();
        $url2 = env("LUMEN_API_URL_SEWA") . "/api/sewa/penyewas/{$kontraksewa['id_penyewa']}";
        $response2 = Http::get($url2);
        $penyewa = $response2->json();
        $url3 = env("LUMEN_API_URL_SEWA") . "/api/sewa/pemakais/{$kontraksewa['id_pemakai']}";
        $response3 = Http::get($url3);
        $pemakai = $response3->json();
        $url4 = env("LUMEN_API_URL_KENDARAAN") . "/api/kendaraan/kendaraans/{$kontraksewa['no_polisi']}";
        $response4 = Http::get($url4);
        $kendaraan = $response4->json();

        if ($userData) {
            return view('Admin.stwahanatocabang.create', ['kontraksewa' => $kontraksewa, 'penyewa' => $penyewa, 'pemakai' => $pemakai, 'kendaraan' => $kendaraan]);
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
        $url = env('LUMEN_API_URL_SEWA') . '/api/sewa/stwahanatocabangs';

        $response = Http::post($url, $request->all());

        if ($response->successful()) {
            return redirect()->route('stwahanatocabang.index')->with('success', 'Data berhasil disimpan.');
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

    public function approved($id_stwahanatocabang)
    {
        $url = env('LUMEN_API_URL_SEWA') . "/api/sewa/stwahanatocabangs/$id_stwahanatocabang/approve";
        $response = Http::put($url);

        if ($response->successful()) {
            return redirect()->route('stwahanatocabang.index')->with('success', 'Data BASTK berhasil diapprove.');
        } else {
            return back()->withErrors(['message' => 'Gagal Approve data BASTK.']);
        }
    }
    public function rejected($id_stwahanatocabang)
    {
        $url = env('LUMEN_API_URL_SEWA') . "/api/sewa/stwahanatocabangs/$id_stwahanatocabang/reject";
        $response = Http::put($url);

        if ($response->successful()) {
            return redirect()->route('stwahanatocabang.index')->with('success', 'Data BASTK berhasil di Riject.');
        } else {
            return back()->withErrors(['message' => 'Gagal Reject data BASTK.']);
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
