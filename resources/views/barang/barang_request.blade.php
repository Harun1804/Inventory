@extends('layouts/user/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Barang Request</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
            @if (Auth()->User()->role=='pg')
            <a href="{{ route('pg.br.create') }}" class="btn-toggle-minified"><i class="lnr lnr-plus-circle"></i></a>
            @endif
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    @if (Auth()->User()->role=='pg' || Auth()->User()->role=='admin')
                    <th>Nama Pemesan</th>
                    @endif
                    <th>Status Permintaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $tr)
                @if ($tr->jenis_transaksi == 'permintaan' && $tr->status_transaksi=='pemesanan')
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tr->user->name }}</td>
                    <td><span class="label label-warning">{{ $tr->status_transaksi }}</span></td>
                    <td>
                        @if (Auth()->User()->role=='pg')
                        <a href="{{ url('/pg/barang_request/produk/'.$tr->id) }}" class="btn btn-sm btn-info">Tambah
                            Pemintaan Produk</a>
                        <a href="{{ url('/pg/barang_request/'.$tr->id.'/delete') }}" class="btn btn-sm btn-danger">Hapus
                            Permintaan</a>
                        @elseif(Auth()->User()->role=='admin')
                        <a href="{{ url('/admin/barang_request/'.$tr->id) }}" class="btn btn-sm btn-info">Detail
                            Produk</a>
                        @endif
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@if (Auth()->User()->role=='pg')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Barang Request Diterima</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Supplier</th>
                    <th>Status Permintaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $tr)
                @if ($tr->jenis_transaksi == 'pemesanan' && $tr->status_transaksi=='diterima')
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tr->user->name }}</td>
                    <td><span class="label label-success">{{ $tr->status_transaksi }}</span></td>
                    <td>
                        <a href="{{ url('/pg/barang_keluar/'.$tr->id) }}" class="btn btn-sm btn-info">Detail</a>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Barang Request Ditolak</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Supplier</th>
                    <th>Status Permintaan</th>
                    <th>Alasan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $tr)
                @if ($tr->jenis_transaksi == 'pemesanan' && $tr->status_transaksi=='ditolak')
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tr->user->name }}</td>
                    <td><span class="label label-danger">{{ $tr->status_transaksi }}</span></td>
                    <td><span class="label label-danger">{{ $tr->alasan }}</span></td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection
