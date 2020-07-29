@extends('layouts/user/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Edit Produk</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
            <button class="btn-toggle-minified" data-toggle="modal" data-target="#produk"><i
                    class="lnr lnr-plus-circle"></i></button>
        </div>
    </div>
    <div class="panel-body">
        @foreach ($produk as $pr)
        <form action="{{ url('/supplier/produk/'.$pr->id.'/update') }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" placeholder="Nama Barang / Produk" name="nama_barang"
                    id="nama_barang" value="{{ $pr->nama_barang }}">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi Produk</label>
                <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi">{{ $pr->deskripsi }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
        @endforeach
    </div>
</div>
@endsection
