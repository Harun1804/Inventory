<?php

namespace App\Http\Controllers\Barang;

use App\Http\Controllers\Controller;
use App\Model\DetailPermintaan;
use App\Model\Produk;
use App\Model\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::orderBy('id', 'desc')->paginate(10);
        return view('barang.request.index', compact('transaksi'));
    }

    public function create()
    {
        Transaksi::create([
            'user_id' => Auth()->User()->id,
            'jenis_transaksi' => 'permintaan',
            'status_transaksi' => 'menunggu'
        ]);
        return redirect(route('barang.index'))->with('status', 'Permintaan Telah dibuat');
    }

    public function show($id)
    {
        $detailtransaksi = DetailPermintaan::where('transaksi_id', $id)->get();
        $produk = Produk::all();
        return view('barang.request.detail', compact(['detailtransaksi', 'id', 'produk']));
    }

    public function createDetail(Request $request)
    {
        DetailPermintaan::create([
            'transaksi_id' => $request->transaksi_id,
            'produk_id' => $request->produk_id,
            'jumlah_permintaan' => $request->jumlah_permintaan,
            'status_produk' => 0
        ]);
        return redirect()->back()->with('status', 'Produk Pemintaan Telah Ditambahkan');
    }

    public function editDetail($id)
    {
        $detail = DetailPermintaan::where('id', $id)->first();
        $produk = Produk::all();
        return view('barang.request.editdetail', compact(['detail', 'produk']));
    }

    public function updateDetail(Request $request, $id)
    {
        DetailPermintaan::where('id', $id)->update([
            'produk_id' => $request->produk_id,
            'jumlah_permintaan' => $request->jumlah_permintaan
        ]);
        return redirect(route('barang.index'))->with('status', 'Produk Pemintaan Telah Diperbaharui');
    }

    public function deleteDetail($id)
    {
        DetailPermintaan::where('id', $id)->delete();
        return redirect()->back()->with('status', 'Produk Pemintaan Telah Dihapus');
    }

    public function destroy($id)
    {
        Transaksi::where('id', $id)->delete();
        return redirect(route('barang.index'))->with('status', 'Permintaan Telah dihapus');
    }
}
