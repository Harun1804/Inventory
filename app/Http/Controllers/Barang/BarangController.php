<?php

namespace App\Http\Controllers\Barang;

use App\Http\Controllers\Controller;
use App\Model\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function cekBarang()
    {
        $kategori = Kategori::all();
        return view('barang.cek', compact('kategori'));
    }
}
