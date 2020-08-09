<?php

namespace App\Http\Controllers\Barang;

use App\Http\Controllers\Controller;
use App\Model\DetailPermintaan;
use App\Model\Kategori;
use Illuminate\Http\Request;
use PDF;

class BarangController extends Controller
{
    public function cekBarang()
    {
        $kategori = Kategori::all();
        return view('barang.cek', compact('kategori'));
    }

    public function barangMasuk()
    {
        $detailtransaksi = DetailPermintaan::orderBy('id', 'desc')->where('jumlah_dikirim', '!=', null)->get();
        return view('barang.masuk.masuk', compact(['detailtransaksi']));
    }

    public function rak($id)
    {
        $detail = DetailPermintaan::where('id', $id)->first();
        return view('barang.masuk.rak', compact('detail'));
    }

    public function updateRak(Request $request, $id)
    {
        DetailPermintaan::where('id', $id)->update([
            'status_produk' => 2,
            'rak' => $request->rak
        ]);
        return redirect(route('barang.masuk'))->with('status', 'Barang Telah Dimasukan Kedalam Rak');
    }

    public function cetakInvoice()
    {
        $dtransaksi = DetailPermintaan::where('status_produk', '=', 2)->get();
        $pdf = PDF::loadView('export/invoice', ['dtransaksi' => $dtransaksi]);
        return $pdf->download('Invoice.pdf');
    }
}
