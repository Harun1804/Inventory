<?php

namespace App\Http\Controllers;

use App\Model\DetailPermintaan;
use App\Model\Supplier;
use App\Model\Transaksi;
use Illuminate\Http\Request;
use PDF;

class PemilikController extends Controller
{
    public function index()
    {
        $supplier  = Supplier::all();
        return view('pemilik.laporan', compact(['supplier']));
    }

    public function semua()
    {
        $transaksi = Transaksi::orderBy('id', 'desc')->paginate(10);
        return view('pemilik.semua',compact('transaksi'));
    }

    public function filter(Request $request)
    {
        if($request->status_transaksi != null && $request->supplier_id != null && $request->mulai != null && $request->akhir != null){
            $keterangan = $request->status_transaksi ;
            $supplier = $request->supplier_id ;
            $mulai = $request->mulai;
            $akhir = $request->akhir;
            $transaksi = Transaksi::where([
                ['status_transaksi','=',$request->status_transaksi],
                ['supplier_id','=',$request->supplier_id]
                ])->whereBetween('created_at', [$request->mulai, $request->akhir])->paginate(10);
            return view('pemilik.filter.allFilter',compact(['keterangan','mulai','akhir','supplier','transaksi']));
        }

        if($request->mulai && $request->akhir){
            $transaksi = Transaksi::whereBetween('created_at', [$request->mulai, $request->akhir])->paginate(10);
            $mulai = $request->mulai;
            $akhir = $request->akhir;
            return view('pemilik.filter.tanggal', compact(['transaksi', 'mulai', 'akhir']));
        }

        if($request->supplier_id){
            $transaksi = Transaksi::where('supplier_id',$request->supplier_id)->paginate(10);
            $supplier = Supplier::where('id',$request->supplier_id)->first();
            return view('pemilik.filter.supplier',compact(['transaksi','supplier']));
        }

        if($request->status_transaksi){
            $transaksi = Transaksi::where('status_transaksi',$request->status_transaksi)->paginate(10);
            $keterangan = $request->status_transaksi;
            return view('pemilik.filter.keterangan',compact(['transaksi','keterangan']));
        }
    }

    public function cetakSemua()
    {
        $jumlah = new DetailPermintaan;
        $pdf = PDF::loadView('export/transaksi', ['jumlah' => $jumlah]);
        return $pdf->download('Laporan Transaksi.pdf');
    }

    public function cetakFilterTanggal($start, $end)
    {
        $dtransaksi = new DetailPermintaan;
        $pdf = PDF::loadView('export/filter/tanggal', ['dtransaksi' => $dtransaksi, 'mulai' => $start, 'akhir' => $end]);
        return $pdf->download('Laporan Filter Tanggal Transaksi.pdf');
    }

    public function cetakFilterSupplier($supplier)
    {
        $dtransaksi = Transaksi::where('supplier_id',$supplier)->get();
        foreach($dtransaksi as $dt){
            $total = $dt->detailTransaksi->sum('jumlah_dikirim');
        }
        $s = Supplier::where('id',$supplier)->first();
        $pdf = PDF::loadView('export/filter/supplier', ['transaksi' => $dtransaksi, 'supplier' => $s,'total'=>$total]);
        return $pdf->download('Laporan Filter Supplier Transaksi.pdf');
    }

    public function cetakFilterKeterangan($keterangan)
    {
        $transaksi = Transaksi::where('status_transaksi',$keterangan)->get();
        foreach($transaksi as $dt){
            $total = $dt->detailTransaksi->sum('jumlah_dikirim');
        }
        $pdf = PDF::loadView('export/filter/keterangan', ['transaksi' => $transaksi, 'keterangan' => $keterangan,'total'=>$total]);
        return $pdf->download('Laporan Filter Keterangan Transaksi.pdf');
    }
}
