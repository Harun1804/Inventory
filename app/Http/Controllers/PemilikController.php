<?php

namespace App\Http\Controllers;

use App\Model\DetailPermintaan;
use App\Model\Transaksi;
use Illuminate\Http\Request;
use PDF;

class PemilikController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::orderBy('id', 'desc')->paginate(10);
        return view('pemilik.laporan', compact(['transaksi']));
    }

    public function cetakDiterima()
    {
        $jumlah = new DetailPermintaan;
        $pdf = PDF::loadView('export/transaksi', ['jumlah' => $jumlah]);
        return $pdf->download('Laporan Transaksi.pdf');
    }

    public function filter(Request $request)
    {
        $transaksi = Transaksi::whereBetween('created_at', [$request->mulai, $request->akhir])->paginate(10);
        $mulai = $request->mulai;
        $akhir = $request->akhir;
        return view('pemilik.filter', compact(['transaksi', 'mulai', 'akhir']));
    }

    public function cetakFilter($start, $end)
    {
        $dtransaksi = new DetailPermintaan;
        $pdf = PDF::loadView('export/tanggal', ['dtransaksi' => $dtransaksi, 'mulai' => $start, 'akhir' => $end]);
        return $pdf->download('Laporan Filter Transaksi.pdf');
    }
}
