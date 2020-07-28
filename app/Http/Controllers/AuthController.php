<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    public function validasi(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect(route('dashboard'));
        }else{
            return redirect()->back()->with('status','Gagal Login! Cek Kembali Username dan Password Anda!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
