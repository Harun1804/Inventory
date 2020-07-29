<?php

namespace App\Http\Controllers;

use App\Model\DetailTransaksi;
use App\Model\Produk;
use App\Model\Transaksi;
use App\User;
use Illuminate\Http\Request;

class PermintaanController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::orderBy('id', 'desc')->get();
        return view('barang.barang_request', compact('transaksi'));
    }

    public function detailPermintaan($id)
    {
        $transaksi = DetailTransaksi::where('transaksi_id','=',$id)->get();
        return view('barang.detail_barang_keluar', compact('transaksi'));
    }

    public function pemesanan()
    {
        $transaksi = Transaksi::orderBy('id', 'desc')->get();
        $user = User::all();
        return view('barang.barang_pemesanan', compact(['transaksi', 'user']));
    }

    public function buatpemesanan(Request $request)
    {
        Transaksi::create([
            'user_id' => $request->user_id,
            'jenis_transaksi' => 'pemesanan',
            'status_transaksi' => 'pemesanan',
        ]);
        return redirect(route('admin.pemesanan.index'))->with('status', 'Pemesanan Berhasil Dibuat');
    }

    public function produk($id,$user_id)
    {
        $transaksi = DetailTransaksi::where('transaksi_id', '=', $id)->get();
        $produk = Produk::where('user_id','=', $user_id)->get();
        return view('barang.permintaan_produk', compact(['transaksi', 'id', 'produk']));
    }

    public function tambahProduk(Request $request)
    {
        DetailTransaksi::create($request->all());
        return redirect()->back()->with('status', 'Produk Permintaan Ditambah');
    }

    public function hapuspemesanan($id)
    {
        DetailTransaksi::where('transaksi_id', '=', $id)->delete();
        Transaksi::destroy($id);
        return redirect(route('admin.pemesanan.index'))->with('status', 'Pemesanan Berhasil Dihapus');
    }
}
