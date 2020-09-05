<?php

namespace App\Http\Controllers\Barang;

use App\Http\Controllers\Controller;
use App\Model\DetailPermintaan;
use App\Model\Kategori;
use App\Model\Produk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class BarangController extends Controller
{
    public function cekBarang()
    {
        $kategori = Kategori::all();
        $produk = Produk::orderBy('kategori_id', 'asc')->paginate(10);
        return view('barang.cek', compact(['kategori', 'produk']));
    }

    public function barangMasuk()
    {
        $detailtransaksi = DetailPermintaan::orderBy('id', 'desc')->where('jumlah_dikirim', '!=', null)->paginate(10);
        return view('barang.masuk.masuk', compact(['detailtransaksi']));
    }

    public function kembaliBarang()
    {
        $detailtransaksi = DetailPermintaan::where('status_produk',3)->paginate(10);
        return view('barang.returnBarang',compact('detailtransaksi'));
    }

    public function kembaliBarangSuppplier($id)
    {
        $detail = DetailPermintaan::find($id);
        $detail->update([
            'status_produk' => 4
        ]);
        return redirect(route('pengembalian.barang'))->with('status', 'Barang Telah Direturn ke Supplier');
    }

    public function updateKembaliBarang(Request $request,$id)
    {
        $detail = DetailPermintaan::find($id);
        $detail->update([
            'status_produk' => 3,
            'kondisi_produk'=> $request->kondisi_produk
        ]);
        return redirect(route('barang.masuk'))->with('status', 'Barang Telah Direturn ke Purchasing');
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
            'rak' => $request->rak,
            'tgl_masuk_rak' => Carbon::now()
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
