@extends('layouts/user/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Berdasarkan Tanggal</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        </div>
    </div>
    <div class="panel-body">
        <form action="{{ route('pemilik.laporan.cetak.tanggal') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="tanggal_mulai">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tanggal_mulai" aria-describedby="emailHelp"
                            placeholder="Masukan Tanggal Awal" name="mulai">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="tanggal_akhir">Tanggal Berakhir</label>
                        <input type="date" class="form-control" id="tanggal_akhir" aria-describedby="emailHelp"
                            placeholder="Masukan Tanggal Akhir" name="akhir">
                    </div>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-sm btn-primary">Cetak</button>
                </div>
            </div>
        </form>
    </div>
</div>
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
