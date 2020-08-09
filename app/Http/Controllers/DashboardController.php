<?php

namespace App\Http\Controllers;

use App\Model\Kategori;
use App\Model\Produk;
use App\Model\Supplier;
use App\Model\Transaksi;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = new User;
        $kategori = new Kategori;
        $produk = new Produk;
        $transaksi = new Transaksi;
        $supplier = new Supplier;
        return view('alluser.dashboard', compact(['user', 'kategori', 'produk', 'transaksi', 'supplier']));
    }
}
