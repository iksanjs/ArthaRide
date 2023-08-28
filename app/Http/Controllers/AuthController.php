<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function postregister(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
            'name' => 'required',
            'role' => 'required',
        ]);
        $response = Http::post('http://localhost:8008/api/register', [
            'username' => $request->username,
            'password' => $request->password,
            'password_confirmation' =>$request->password_confirmation,
            'name' => $request->name,
            'role' => $request->role,
            // tambahkan data lain yang diperlukan untuk registrasi
        ]);

        $responseData = $response->json();

        return redirect()->route('register');
    }

    public function postlogin(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $response = Http::post('http://localhost:8008/api/login', [
            'username' => $request->username,
            'password' => $request->password,
        ]);
        $responseData = $response->json();
        if (isset($responseData['token'])) {
            $token = $responseData['token'];
        
            // Simpan token di session
            session(['jwt_token' => $token]);
        
            if ($response->successful()) {
                // Jika autentikasi berhasil, arahkan pengguna ke dashboard
                return redirect()->route('dashboard');
            } else {
                // Jika autentikasi gagal, arahkan pengguna kembali ke halaman login dengan pesan kesalahan
                return redirect()->route('login')->with('error', 'Invalid credentials');
            }
        } else {
            // Tangani kasus jika tidak ada kunci 'token' dalam respons
            return redirect()->route('login')->with('error', 'Token not found in response');
        }
    }

    public function logout()
    {
        $token = session('jwt_token'); // Ambil token dari session
        
        // Hapus token dari session
        session()->forget('jwt_token');

        // Lakukan request ke API untuk melakukan logout
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post('http://localhost:8008/api/logout');

        if ($response->successful()) {
            // Jika logout berhasil, arahkan pengguna ke halaman login
            return redirect()->route('login')->with('success', 'Logged out successfully');
        } else {
            // Jika logout gagal, arahkan pengguna ke halaman yang sesuai
            // atau tampilkan pesan kesalahan
            return redirect()->back()->with('error', 'Failed to logout');
        }
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
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('Auth.register');
    }
}