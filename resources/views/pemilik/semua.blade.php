@extends('layouts/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Transaksi Berhasil</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
            <a href="{{ route('pemilik.laporan.cetak') }}" class="cetak"><i class="lnr lnr-printer"></i></a>
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Jenis Transaksi</th>
                    <th>Nama Pemesan</th>
                    <th>Nama Supplier</th>
                    <th>Tanggal Permintaan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $tr)
                @if ($tr->status_transaksi == 'diterima')
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tr->jenis_transaksi }}</td>
                    <td>{{ $tr->user->name }}</td>
                    <td>{{ $tr->supplier->user->name }}</td>
                    <td>{{ $tr->created_at->format('d-m-Y') }}</td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md-6">{{ $transaksi->links() }}</div>
            <div class="col-md-6 text-right"><a href="{{ route('pemilik.laporan') }}" class="btn btn-primary">Back</a></div>
        </div>
    </div>
</div>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Transaksi Transaksi Gagal</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
            <a href="{{ route('pemilik.laporan.cetak') }}" class="cetak"><i class="lnr lnr-printer"></i></a>
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Jenis Transaksi</th>
                    <th>Nama Pemesan</th>
                    <th>Nama Supplier</th>
                    <th>Tanggal Permintaan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $tr)
                @if ($tr->status_transaksi == 'ditolak')
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tr->jenis_transaksi }}</td>
                    <td>{{ $tr->user->name }}</td>
                    <td>{{ $tr->supplier->user->name }}</td>
                    <td>{{ $tr->created_at->format('d-m-Y') }}</td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md-6">{{ $transaksi->links() }}</div>
            <div class="col-md-6 text-right"><a href="{{ route('pemilik.laporan') }}" class="btn btn-primary">Back</a></div>
        </div>
    </div>
</div>
@endsection
