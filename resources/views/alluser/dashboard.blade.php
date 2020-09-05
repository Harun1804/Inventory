@extends('layouts/master')
@section('content')
<div class="panel panel-headline">
    <div class="panel-heading">
        <h3 class="panel-title">Gambaran</h3>
        <p class="panel-subtitle"></p>
    </div>
    <div class="panel-body">
        @if (Auth()->User()->role == 'admin')
        <div class="row">
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="lnr lnr-users"></i></span>
                    <p>
                        <span class="number">{{ $user->count() }}</span>
                        <span class="title">User</span>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="lnr lnr-list"></i></span>
                    <p>
                        <span class="number">{{ $kategori->count() }}</span>
                        <span class="title">Kategori</span>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="lnr lnr-dice"></i></span>
                    <p>
                        <span class="number">{{ $produk->count() }}</span>
                        <span class="title">Produk</span>
                    </p>
                </div>
            </div>
        </div>
        @elseif (Auth()->User()->role == 'pg')
        <div class="row">
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="lnr lnr-arrow-left"></i></span>
                    <p>
                        <span class="number">{{ $transaksi::where('jenis_transaksi','=','permintaan')->where('status_transaksi','=','menunggu')->count() }}</span>
                        <span class="title">Permintaan</span>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="lnr lnr-arrow-right"></i></span>
                    <p>
                        <span class="number">{{ $detail::where('jumlah_dikirim','!=',null)->where('rak','=',null)->count() }}</span>
                        <span class="title">Barang Masuk</span>
                    </p>
                </div>
            </div>
        </div>
        @elseif (Auth()->User()->role == 'pc')
        <div class="row">
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="lnr lnr-arrow-right"></i></span>
                    <p>
                        <span class="number">{{ $transaksi::where('jenis_transaksi','=','permintaan')->where('status_transaksi','=','menunggu')->count() }}</span>
                        <span class="title">Permintaan</span>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="lnr lnr-user"></i></span>
                    <p>
                        <span class="number">{{ $supplier->count() }}</span>
                        <span class="title">Supplier</span>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="lnr lnr-undo"></i></span>
                    <p>
                        <span class="number">{{ $detail::where('status_produk',3)->count() }}</span>
                        <span class="title">Pengembalian</span>
                    </p>
                </div>
            </div>
        </div>
        @elseif(Auth()->User()->role == 'pemilik')
        <div class="row">
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="lnr lnr-sync"></i></span>
                    <p>
                        <span class="number">{{ $transaksi::where('jenis_transaksi','=','permintaan')->count() }}</span>
                        <span class="title">Seluruh Permintaan</span>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="lnr lnr-cart"></i></span>
                    <p>
                        <span class="number">{{ $transaksi::where('jenis_transaksi','=','permintaan')->where('status_transaksi','=','menunggu')->count() }}</span>
                        <span class="title">Permintaan Berjalan</span>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="lnr lnr-paw"></i></span>
                    <p>
                        <span class="number">{{ $transaksi::where('jenis_transaksi','=','permintaan')->where('status_transaksi','=','diterima')->count() }}</span>
                        <span class="title">Permintaan Diterima</span>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="lnr lnr-cross"></i></span>
                    <p>
                        <span class="number">{{ $transaksi::where('jenis_transaksi','=','permintaan')->where('status_transaksi','=','ditolak')->count() }}</span>
                        <span class="title">Permintaan Ditolak</span>
                    </p>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
