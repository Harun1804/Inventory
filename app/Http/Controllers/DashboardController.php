<?php

namespace App\Http\Controllers;

use App\Model\Kategori;
use App\Model\Produk;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = New User;
        $kategori = new Kategori;
        $produk = new Produk;
        return view('alluser.dashboard',compact(['user','kategori','produk']));
    }
}
