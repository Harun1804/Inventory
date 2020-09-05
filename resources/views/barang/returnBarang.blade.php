@extends('layouts/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Pengembalian Barang</h3>
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
                    <th>Kondisi Produk</th>
                    <th>Jumlah Permintaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($detailtransaksi as $dt)
                @if ($dt->status_produk == 3)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $dt->produk->kategori->nama_kategori }}</td>
                    <td>{{ $dt->produk->nama_produk }}</td>
                    <td>{{ $dt->kondisi_produk }}</td>
                    <td style="text-align: left">{{ $dt->jumlah_permintaan }}</td>
                    <td>
                        <a href="{{ route('pengembalian.barang.supplier',$dt->id) }}" class="btn btn-sm btn-primary">Kembalikan Ke Supplier</a>
                    </td>
                </tr>
                @endif
                @empty
                <tr>
                    <td colspan="6" style="text-align: center">Belum Ada Data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md-6">{{ $detailtransaksi->links() }}</div>
            <div class="col-md-6 text-right"><a href="{{ route('pengembalian.barang') }}" class="btn btn-primary">Back</a></div>
        </div>
    </div>
</div>
@endsection
