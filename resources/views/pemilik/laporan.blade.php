@extends('layouts/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Berdasarkan Tanggal</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        </div>
    </div>
    <div class="panel-body">
        <form action="{{ route('pemilik.laporan.filter') }}" method="POST">
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
                    <button type="submit" class="btn btn-sm btn-primary">Lihat</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Seluruh Transaksi Berhasil</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
            <a href="{{ route('pemilik.laporan.cetak') }}"><i class="lnr lnr-printer"></i></a>
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
                @forelse ($transaksi as $tr)
                @if ($tr->status_transaksi == 'diterima')
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tr->jenis_transaksi }}</td>
                    <td>{{ $tr->user->name }}</td>
                    <td>{{ $tr->supplier->user->name }}</td>
                    <td>{{ $tr->created_at->format('d-m-Y') }}</td>
                </tr>
                @endif
                @empty
                <tr>
                    <td colspan="5" style="text-align: center">Belum Ada Data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md">{{ $transaksi->links() }}</div>
        </div>
    </div>
</div>
@endsection
