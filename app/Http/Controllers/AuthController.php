<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('alluser.login');
    }

    public function validasi(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth()->User()->role == 'supplier') {
                return redirect(route('login'))->with('status', 'Maaf Anda Tidak Memiliki Hak Akses');
            } else {
                return redirect(route('dashboard'));
            }
        } else {
            return redirect(route('login'))->with('error', 'Gagal Login! Cek Kembali Username dan Password Anda!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
