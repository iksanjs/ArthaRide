<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SPPKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url = 'http://localhost:8003/api/sewa/sppks'; // Ganti dengan URL Lumen yang sesuai

        $response = Http::get($url);
        $sppks = $response->json();

        return view('SPPK.index', ['sppks' => $sppks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SPPK.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url = 'http://localhost:8003/api/sewa/sppks';

        $response = Http::post($url, $request->all());

        if ($response->successful()) {
            return redirect()->route('SPPK.index')->with('success', 'Data berhasil disimpan.');
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
    public function edit($id_sppk)
    {
        $url = "http://localhost:8003/api/sewa/sppks/$id_sppk";
        $response = Http::get($url);

        if ($response->successful()) {
            $sppk = $response->json();
            return view('SPPK.edit', compact('sppk'));
        } else {
            return back()->withErrors(['message' => 'Gagal mengambil data SPPK.']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_sppk)
    {
        $validatedData = $request->validate([
            'tgl_sppk' => 'required',
            'nama_pt' => 'required',
            'nama_cabang' => 'required',
            'alamat' => 'required',
            'kategori' => 'required',
            'merk' => 'required',
            'tipe' => 'required',
            'tahun' => 'required',
            'warna' => 'required',
            'nama' => 'required',
            'no_hp' => 'required',
            'jabatan' => 'required',
            'tgl_awal' => 'required',
            'tgl_akhir' => 'required',
            'biaya_sewa' => 'required',
        ]);
        $url = "http://localhost:8003/api/sewa/sppks/$id_sppk";
        try {
            $response = Http::put($url, [
                'json' => $validatedData
            ]);
            
            if ($response->getStatusCode() == 200) {
                // Respons sukses, tangani sesuai kebutuhan
                return redirect()->route('sppk.index');
            } else {
                // Tangani respons error
                $errorResponse = json_decode($response->getBody(), true);
                return back()->withErrors(['message' => 'Gagal menyimpan data. ' . $errorResponse['message']]);
            }
        } catch (\Exception $e) {
            // Tangani jika terjadi kesalahan
            return back()->withErrors(['message' => 'Terjadi kesalahan: ' . $e->getMessage()]);
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
