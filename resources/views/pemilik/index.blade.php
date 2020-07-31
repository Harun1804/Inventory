@extends('layouts/user/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Laporan Transaksi</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Jenis Transaksi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $tr)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tr->jenis_transaksi }}</td>
                    <td>
                        <a href="{{ url('/pemilik/laporan/'.$tr->id.'/cetak') }}" class="btn btn-sm btn-info">Cetak</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
