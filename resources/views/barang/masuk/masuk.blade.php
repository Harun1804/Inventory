@extends('layouts/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Barang Masuk Belum Masuk Rak</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Permintaan</th>
                    <th>Tanggal Barang Tiba</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($detailtransaksi as $dt)
                @if ($dt->rak == null)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $dt->produk->nama_produk }}</td>
                    <td>{{ $dt->jumlah_permintaan }}</td>
                    <td>{{ $dt->updated_at->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ url('/petugas/barang/masuk/'.$dt->id) }}" class="btn btn-sm btn-warning">Masukan Ke Rak</a>
                    </td>
                </tr>
                @endif
                @empty
                <tr>
                    <td colspan="4" style="text-align: center">Belum Ada Data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Barang Masuk Sudah Masuk Rak</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
            <a href="{{ route('barang.masuk.invoice') }}"><i class="lnr lnr-printer"></i></a>
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Tanggal Barang Tiba</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($detailtransaksi as $dt)
                @if ($dt->rak != null)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $dt->produk->nama_produk }}</td>
                    <td>{{ $dt->jumlah_dikirim }}</td>
                    <td>{{ $dt->updated_at->format('d-m-Y') }}</td>
                    <td></td>
                </tr>
                @endif
                @empty
                <tr>
                    <td colspan="4" style="text-align: center">Belum Ada Data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
