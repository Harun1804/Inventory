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

    public function updateBarang(Request $request, $id)
    {
        $getDetail = DetailPermintaan::where('id', $id);
        $cari = $getDetail->first();
        $produk = Produk::where('id', $cari->produk_id)->first();
        $masuk = $request->jumlah_kirim - $request->jumlah_kembali;
        $stok = $produk->stok;
        if($request->kondisi_produk == null && $request->jumlah_kembali == null){
            $getDetail->update([
                'jumlah_masuk'=> $masuk,
                'rak' => $request->rak,
                'status_produk' => 2,
                'rak' => $request->rak,
                'tgl_masuk_rak' => Carbon::now()
            ]);
        }else{
            $getDetail->update([
                'kondisi_produk'=> $request->kondisi_produk,
                'jumlah_kembali'=> $request->jumlah_kembali,
                'jumlah_masuk'=> $masuk,
                'rak' => $request->rak,
                'status_produk' => 3,
                'rak' => $request->rak,
                'tgl_masuk_rak' => Carbon::now()
            ]);
        }
        $coba = $produk->update([
            'stok' => $stok + $request->jumlah_masuk
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
