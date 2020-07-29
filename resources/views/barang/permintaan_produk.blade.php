@extends('layouts/user/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Produk Request</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
            <button class="btn-toggle-minified" data-toggle="modal" data-target="#produk"><i
                    class="lnr lnr-plus-circle"></i></button>
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Jumlah Produk</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $tr)
                @if ($tr == null)
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                @else
                <tr>
                    <td>{{ $tr->produk->nama_barang }}</td>
                    <td>{{ $tr->jumlah_transaksi }}</td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@if (Auth()->User()->role == 'pg')
<div class="modal fade" id="produk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Menambahkan Produk</h5>
            </div>
            <div class="modal-body">
                <form action="{{ Route('pg.br.produk.create') }}" method="POST">
                    @csrf
                    <input type="hidden" name="transaksi_id" value="{{ $id }}" class="form-control">
                    <div class="form-group">
                        <select class="form-control" name="produk_id">
                            <option disabled selected>Pilih Produk</option>
                            @foreach ($produk as $p)
                            <option value="{{ $p->id }}">{{ $p->nama_barang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="jproduk" placeholder="Jumlah Produk" name="jumlah_transaksi">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@elseif(Auth()->User()->role == 'admin')
<div class="modal fade" id="produk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Menambahkan Produk</h5>
            </div>
            <div class="modal-body">
                <form action="{{ Route('admin.pemesanan.produk.create') }}" method="POST">
                    @csrf
                    <input type="hidden" name="transaksi_id" value="{{ $id }}" class="form-control">
                    <div class="form-group">
                        <select class="form-control" name="produk_id">
                            <option disabled selected>Pilih Produk</option>
                            @foreach ($produk as $p)
                            <option value="{{ $p->id }}">{{ $p->nama_barang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="jproduk" placeholder="Jumlah Produk" name="jumlah_transaksi">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endif
