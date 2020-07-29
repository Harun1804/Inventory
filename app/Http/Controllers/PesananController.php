<?php

namespace App\Http\Controllers;

use App\Model\BarangMasuk;
use App\Model\DetailTransaksi;
use App\Model\Transaksi;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $id = Auth()->User()->id;
        $transaksi = Transaksi::where('user_id', '=', $id)->orderBy('id', 'desc')->get();
        return view('barang.barang_pemesanan', compact('transaksi'));
    }

    public function detailPesanan($id)
    {
        $transaksi = DetailTransaksi::where('transaksi_id','=',$id)->get();
        return view('barang.detail_barang_keluar', compact('transaksi'));
    }

    public function approve(Request $request, $id)
    {
        $transaksi = Transaksi::where('id', '=', $id);
        $transaksi->update([
            'status_transaksi' => $request->approve,
            'alasan' => $request->alasan
        ]);
        return redirect(route('supplier.pesanan.index'))->with('status', 'Persetujuan Telah Di Kirim');
    }

    public function kirimBarang(Request $request)
    {
        BarangMasuk::create($request->all());
        return redirect()->back()->with('status', 'Barang Telah Dikirim');
    }
}
