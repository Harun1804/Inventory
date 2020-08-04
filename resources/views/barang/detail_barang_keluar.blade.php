@extends('layouts/user/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Detail Pemintaan</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Jumlah Permintaan</th>
                    @if (Auth()->User()->role == 'supplier' || Auth()->User()->role == 'pembeli')
                    <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $tr)
                <tr>
                    <td>{{ $tr->produk->nama_barang }}</td>
                    <td>{{ $tr->jumlah_transaksi }}</td>
                    @if (Auth()->User()->role == 'supplier' || Auth()->User()->role == 'pembeli')
                    <td><button class="btn btn-sm btn-success" data-toggle="modal" data-target="#kirim">Kirim
                            Barang</button></td>
                    <!-- Modal -->
                    <div class="modal fade" id="kirim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Kirim Barang</h5>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('supplier.pesanan.kirim') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="produk_id" value="{{ $tr->produk->id }}">
                                        <div class="form-group">
                                            <label for="jproduk">Jumlah Produk</label>
                                            <input type="number" class="form-control" id="jproduk" placeholder="Masukan Jumlah Produk" name="jumlah_masuk">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md-6"><span class="panel-note"></span></div>
            @if (Auth()->User()->role == 'pg')
            <div class="col-md-6 text-right"><a href="{{ route('pg.bk.index') }}" class="btn btn-primary">Back</a></div>
            @elseif(Auth()->User()->role == 'admin')
            <div class="col-md-6 text-right"><a href="{{ route('admin.br.index') }}" class="btn btn-primary">Back</a>
            </div>
            @elseif(Auth()->User()->role == 'supplier')
            <div class="col-md-6 text-right"><a href="{{ route('supplier.pesanan.index') }}"
                    class="btn btn-primary">Back</a></div>
                    @elseif(Auth()->User()->role == 'pembeli')
            <div class="col-md-6 text-right"><a href="{{ route('pembelian.pesanan.index') }}"
                    class="btn btn-primary">Back</a></div>
            @endif
        </div>
    </div>
</div>
@endsection
