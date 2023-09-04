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
        ])->get(env('LUMEN_API_URL_AUTH') . '/api/me');

        $userData = $response->json();

        // Dapatkan nama pengguna dari respons
        $namaPengguna  = $userData['user']['name'];

        $jumlahStok = $this->hitungStokKendaraan();
        $jumlahDisewa = $this->hitungKendaraanDisewa();
        $totalBiayaSewa = $this->hitungTotalBiayaSewa();
        $totalHargaService = $this->hitungTotalHargaService();

        if ($userData['user']['role'] == 'Admin') {
            return view('Admin.dashboard', compact('jumlahStok', 'jumlahDisewa', 'totalBiayaSewa', 'totalHargaService', 'namaPengguna'));
        } elseif ($userData['user']['role'] == 'Pengurus') {
            return view('Pengurus.dashboard', compact('jumlahStok', 'jumlahDisewa', 'totalBiayaSewa', 'totalHargaService', 'namaPengguna'));
        } elseif ($userData['user']['role'] == 'Akuntan') {
            return view('Akuntan.dashboard', compact('jumlahStok', 'jumlahDisewa', 'totalBiayaSewa', 'totalHargaService', 'namaPengguna'));
        } else {
            return view('auth.login');
        }
    }

    private function hitungStokKendaraan()
    {
        $response = Http::get(env('LUMEN_API_URL_KENDARAAN') . '/api/kendaraan/kendaraans');
        $dataKendaraan = $response->json();

        // Menghitung jumlah stok kendaraan dengan status "Stock"
        $jumlahStok = 0;

        foreach ($dataKendaraan as $kendaraanArray) {
            foreach ($kendaraanArray as $kendaraan) {
                if (isset($kendaraan['status']) && $kendaraan['status'] === 'Stock') {
                    $jumlahStok++;
                }
            }
        }

        // Mengembalikan jumlah stok kendaraan
        return $jumlahStok;
    }
    private function hitungKendaraanDisewa()
    {
        $response = Http::get(env('LUMEN_API_URL_KENDARAAN') . '/api/kendaraan/kendaraans');
        $dataKendaraan = $response->json();
    
        // Menghitung jumlah kendaraan dengan status "Disewa"
        $jumlahDisewa = 0;
    
        foreach ($dataKendaraan as $kendaraanArray) {
            foreach ($kendaraanArray as $kendaraan) {
                if (isset($kendaraan['status']) && $kendaraan['status'] === 'Disewa') {
                    $jumlahDisewa++;
                }
            }
        }
    
        // Mengembalikan jumlah kendaraan dengan status "Disewa"
        return $jumlahDisewa;
    }

    private function hitungTotalBiayaSewa()
    {
        $response = Http::get(env('LUMEN_API_URL_SEWA') . '/api/sewa/kontraksewas'); // Gantilah URL_API_SEWA dengan URL yang sesuai
        $dataSewa = $response->json();

        // Menghitung total biaya sewa
        $totalBiayaSewa = 0;

        foreach ($dataSewa as $sewa) {
            if (isset($sewa['biaya_sewa'])) {
                // Pastikan biaya_sewa adalah angka (integer atau float)
                if (is_numeric($sewa['biaya_sewa'])) {
                    $totalBiayaSewa += $sewa['biaya_sewa'];
                }
            }
        }

        // Mengubah total biaya sewa menjadi format rupiah
        $totalBiayaSewaFormatted = number_format($totalBiayaSewa, 0, ',', '.');

        // Mengembalikan total biaya sewa yang sudah diformat
        return $totalBiayaSewaFormatted;
    }

    private function hitungTotalHargaService()
    {
        $response = Http::get(env('LUMEN_API_URL_SERVICE') . '/api/service/services'); // Gantilah URL_API_SERVICE dengan URL yang sesuai
        $dataService = $response->json();

        // Menghitung total harga service
        $totalHargaService = 0;

        foreach ($dataService as $service) {
            if (isset($service['total_harga_service'])) {
                // Pastikan total_harga_service adalah angka (integer atau float)
                if (is_numeric($service['total_harga_service'])) {
                    $totalHargaService += $service['total_harga_service'];
                }
            }
        }

        // Mengubah total harga service menjadi format rupiah
        $totalHargaServiceFormatted = number_format($totalHargaService, 0, ',', '.');

        // Mengembalikan total harga service yang sudah diformat
        return $totalHargaServiceFormatted;
    }
}