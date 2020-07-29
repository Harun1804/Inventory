@extends('layouts/user/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Pemintaan Pembeli</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Pembeli</th>
                    <th>Status Pembelian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $tr)
                @if ($tr->jenis_transaksi == 'pembelian' && $tr->status_transaksi=='pemesanan')
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tr->user->name }}</td>
                    <td><span class="label label-warning">{{ $tr->status_transaksi }}</span></td>
                    <td>
                        <a href="{{ url('/pg/barang_keluar/'.$tr->id) }}" class="btn btn-sm btn-info">Detail</a>
                        <a href="{{ url('/pg/barang_keluar/'.$tr->id.'/kirim') }}" class="btn btn-sm btn-success">Kirim</a>
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
        <h3 class="panel-title">Pembelian Selesai</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Pembeli</th>
                    <th>Status Pembelian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $tr)
                @if ($tr->jenis_transaksi == 'pembelian' && $tr->status_transaksi=='selesai')
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
@endsection
