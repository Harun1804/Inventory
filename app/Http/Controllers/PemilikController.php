<?php

namespace App\Http\Controllers;

use App\Model\DetailTransaksi;
use App\Model\Kategori;
use App\Model\Produk;
use App\Model\Transaksi;
use Illuminate\Http\Request;
use PDF;

class PemilikController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::orderBy('id', 'desc')->get();
        $kategori = Kategori::orderBy('id', 'desc')->get();
        return view('pemilik.index', compact(['transaksi', 'kategori']));
    }

    public function cetak($id)
    {
        $transaksi = Transaksi::where('id', '=', $id)->get();
        $dtransaksi = DetailTransaksi::where('transaksi_id', '=', $id)->get();
        $pdf = PDF::loadView('export/transaksi', ['transaksi' => $transaksi, 'dtransaksi' => $dtransaksi]);
        return $pdf->download('Laporan Transaksi.pdf');
    }

    public function cetakTanggal(Request $request)
    {
        $transaksi = Transaksi::where('created_at','>=',$request->mulai)->where('created_at', '<=', $request->akhir)->get();
        foreach($transaksi as $tr){
            $id = $tr->id;
        }
        $dtransaksi = DetailTransaksi::where('transaksi_id', '=', $id)->get();
        $pdf = PDF::loadView('export/transaksi_tanggal', ['dtransaksi' => $dtransaksi,'mulai'=>$request->mulai,'akhir'=>$request->akhir]);
        return $pdf->download('Laporan Transaksi Tanggal.pdf');
    }
}
