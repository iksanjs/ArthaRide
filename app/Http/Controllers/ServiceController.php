<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
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
        
        $url = env('LUMEN_API_URL_SERVICE') . '/api/service/services'; // Ganti dengan URL Lumen yang sesuai
        $response = Http::get($url);
        $hasil = $response->json();

        // Filter data berdasarkan status "Proses Approval"
        $prosesservices = array_filter($hasil, function ($service) {
            return $service['approval'] === 'Proses Approval';
        });

        // Filter data berdasarkan status "Approved"
        $services = array_filter($hasil, function ($service) {
            return $service['approval'] === 'Approved';
        });

        if ($userData['user']['role'] == 'Admin') {
            return view('Admin.Service.index', ['services' => $services]);
        } elseif ($userData['user']['role'] == 'Pengurus') {
            return view('Pengurus.Service.index', ['hasil' => $hasil, 'prosesservices' => $prosesservices]);
        } elseif ($userData['user']['role'] == 'Akuntan') {
            return view('Akuntan.Service.index', ['services' => $services]);
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
        $url = env('LUMEN_API_URL_KENDARAAN') . ('/api/kendaraan/kendaraans/approvedkendaraan');
        $response = Http::get($url);
        $kendaraans = $response->json();
        $url1 = env('LUMEN_API_URL_SERVICE') . ('/api/service/bengkels/approvedbengkel');
        $response1 = Http::get($url1);
        $bengkels = $response1->json();
        return view('Admin.Service.create', ['kendaraans' => $kendaraans], ['bengkels' => $bengkels]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url = env('LUMEN_API_URL_SERVICE') . '/api/service/services';

        $response = Http::post($url, $request->all());

        if ($response->successful()) {
            return redirect()->route('service.index')->with('success', 'Data berhasil dibuat. Menunggu Approval dari Pengurus');
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

    public function approved($id_service)
    {
        $url = env('LUMEN_API_URL_SERVICE') . "/api/service/services/$id_service/approve";
        $response = Http::put($url);

        if ($response->successful()) {
            return redirect()->route('service.index')->with('success', 'Data Service berhasil diapprove.');
        } else {
            return back()->withErrors(['message' => 'Gagal Approve data Service.']);
        }
    }
    public function rejected($id_service)
    {
        $url = env('LUMEN_API_URL_SERVICE') . "/api/service/services/$id_service/reject";
        $response = Http::put($url);

        if ($response->successful()) {
            return redirect()->route('service.index')->with('success', 'Data Service berhasil di Riject.');
        } else {
            return back()->withErrors(['message' => 'Gagal Reject data Service.']);
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
