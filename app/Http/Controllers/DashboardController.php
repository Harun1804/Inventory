<?php

namespace App\Http\Controllers;

use App\Model\Kategori;
use App\Model\Produk;
use App\Model\Transaksi;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = New User;
        $kategori = new Kategori;
        $produk = new Produk;
        $transaksi = new Transaksi;
        return view('alluser.dashboard',compact(['user','kategori','produk','transaksi']));
    }
}
