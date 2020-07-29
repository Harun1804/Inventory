@extends('layouts/user/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Barang Masuk</h3>
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
                    <th>Jumlah Barang Masuk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangMasuk as $bm)
                @if ($bm->rak == null)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $bm->produk->nama_barang }}</td>
                    <td>{{ $bm->jumlah_masuk }}</td>
                    <td>
                        <a href="{{ url('/pg/barang_masuk/'.$bm->id) }}" class="btn btn-sm btn-warning">Masukan Ke Rak</a>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
