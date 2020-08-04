<?php

namespace App\Http\Controllers;

use App\Model\BarangMasuk;
use App\Model\DetailTransaksi;
use App\Model\Transaksi;
use Illuminate\Http\Request;
use PDF;

class PesananController extends Controller
{
    public function index()
    {
        if(Auth()->User()->role == 'supplier'){
            $id = Auth()->User()->id;
            $transaksi = Transaksi::where('user_id', '=', $id)->orderBy('id', 'desc')->get();
        }else{
            $transaksi = Transaksi::orderBy('id', 'desc')->get();
        }
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
        if(Auth()->User()->role == 'supplier'){
            return redirect(route('supplier.pesanan.index'))->with('status', 'Persetujuan Telah Di Kirim');
        }else{
            return $this->cetakfaktur($id);
        }
    }

    public function kirimBarang(Request $request)
    {
        BarangMasuk::create($request->all());
        return redirect()->back()->with('status', 'Barang Telah Dikirim');
    }

    public function cetakfaktur($id)
    {
        $transaksi = Transaksi::where('id', '=', $id)->get();
        $dtransaksi = DetailTransaksi::where('transaksi_id', '=', $id)->get();
        $pdf = PDF::loadView('export/faktur', ['dtransaksi' => $dtransaksi]);
        redirect(route('pembelian.pesanan.index'))->with('status', 'Persetujuan Telah Di Kirim');
        return $pdf->download('Faktur.pdf');
    }
}
