@extends('layouts/user/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Detail Pemintaan Pembeli</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Jumlah Permintaan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $transaksi->produk->nama_barang }}</td>
                    <td>{{ $transaksi->jumlah_transaksi }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md-6"><span class="panel-note"></span></div>
            <div class="col-md-6 text-right"><a href="{{ route('pg.bk.index') }}" class="btn btn-primary">Back</a></div>
        </div>
    </div>
</div>
@endsection
