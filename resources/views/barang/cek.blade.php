@extends('layouts/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Tabel Barang</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Kategori</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Rak</th>
                    <th>Tanggal Masuk Rak</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produk as $pr)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pr->kategori->nama_kategori }}</td>
                    <td>{{ $pr->nama_produk }}</td>
                    <td style="text-align:left">{{ $pr->stok }}</td>
                    @if ($pr->stok != 0)
                    <td>{{ $pr->rak }}</td>
                    <td>{{ $pr->tgl_masuk_rak }}</td>
                    @endif
                </tr>
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
            <div class="col-md">{{ $produk->links() }}</div>
        </div>
    </div>
</div>
@endsection
