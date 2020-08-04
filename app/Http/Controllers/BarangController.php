<?php

namespace App\Http\Controllers;

use App\Model\BarangMasuk;
use App\Model\DetailTransaksi;
use App\Model\Kategori;
use App\Model\Produk;
use App\Model\Transaksi;
use Illuminate\Http\Request;
use PDF;

class BarangController extends Controller
{
    public function cekBarang()
    {
        $kategori = Kategori::all();
        $produk = Produk::orderBy('kategori_id', 'desc')->paginate(10);
        return view('barang.cek_barang', compact(['kategori', 'produk']));
    }

    public function barangMasuk()
    {
        $barangMasuk = BarangMasuk::orderBy('id', 'desc')->get();
        return view('barang.barang_masuk', compact('barangMasuk'));
    }

    public function rak($id)
    {
        $barangMasuk = BarangMasuk::find($id);
        return view('barang.rak', compact('barangMasuk'));
    }

    public function inputRak(Request $request, $id)
    {
        BarangMasuk::where('id', '=', $id)->update([
            'rak' => $request->rak
        ]);
        return $this->cetakinvoice($id);
        //return redirect(route('pg.bm.index'))->with('status', 'Barang Sudah Disimpan ke Rak');
    }

    public function cetakinvoice($id)
    {
        $transaksi = Transaksi::where('id', '=', $id)->get();
        $dtransaksi = DetailTransaksi::where('transaksi_id', '=', $id)->get();
        $pdf = PDF::loadView('export/invoice', ['dtransaksi' => $dtransaksi]);
        return $pdf->download('Invoice.pdf');
    }

    public function barangKeluar()
    {
        $transaksi = Transaksi::orderBy('id', 'desc')->get();
        return view('barang.barang_keluar', compact('transaksi'));
    }

    public function detailBarangKeluar($id)
    {
        $transaksi = DetailTransaksi::find($id);
        return view('barang.detail_barang_keluar', compact('transaksi'));
    }

    public function kirim($id)
    {
        Transaksi::where('id', '=', $id)->update([
            'status_transaksi' => 'selesai'
        ]);
        return redirect(route('pg.bk.index'))->with('status', 'Barang Terkirim');
    }

    public function barangRequest()
    {
        $transaksi = Transaksi::orderBy('id', 'desc')->get();
        return view('barang.barang_request', compact('transaksi'));
    }

    public function membuatRequest()
    {
        Transaksi::create([
            'user_id' => Auth()->User()->id,
            'jenis_transaksi' => 'pemesanan',
            'status_transaksi' => 'pemesanan',
        ]);
        return redirect(route('pg.br.index'))->with('status', 'Pembelian Telah Dibuat');
    }

    public function hapusRequest($id)
    {
        Transaksi::destroy($id);
        return redirect(route('pg.br.index'))->with('status', 'Permintaan Telah Dihapus');
    }

    public function tambahProduk($id)
    {
        $transaksi = DetailTransaksi::where('transaksi_id', '=', $id)->get();
        $produk = Produk::all();
        return view('barang.permintaan_produk', compact(['transaksi', 'id', 'produk']));
    }

    public function tambahProdukBaru(Request $request)
    {
        DetailTransaksi::create($request->all());
        return redirect()->back()->with('status', 'Produk Permintaan Ditambah');
    }

    public function hapusProdukBaru($id)
    {
        dd($id);
        DetailTransaksi::destroy($id);
        return redirect()->back()->with('status', 'Produk Permintaan Dihapus');
    }
}
