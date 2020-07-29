<?php

namespace App\Http\Controllers;

use App\Model\BarangMasuk;
use App\Model\Transaksi;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $bm = new BarangMasuk();
        $tr = new Transaksi();
        return view('user.user', compact(['bm', 'tr']));
    }
}
