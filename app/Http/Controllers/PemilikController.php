<?php

namespace App\Http\Controllers;

use App\Model\DetailTransaksi;
use App\Model\Transaksi;
use Illuminate\Http\Request;
use PDF;

class PemilikController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::orderBy('id','desc')->get();
        return view('pemilik.index',compact('transaksi'));
    }

    public function cetak($id)
    {
        $transaksi = Transaksi::where('id','=',$id)->get();
        $dtransaksi = DetailTransaksi::where('transaksi_id','=',$id)->get();
        $pdf = PDF::loadView('export/transaksi', ['transaksi' => $transaksi, 'dtransaksi' => $dtransaksi]);
        return $pdf->download('Laporan Transaksi.pdf');
    }
}
