@extends('layouts/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">User Update</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        </div>
    </div>
    <div class="panel-body">
        <form action="{{ url('/admin/produk/'.$produk->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="kategori_id">Kategori</label>
                <select class="form-control" id="kategori_id" name="kategori_id">
                    <option disabled selected>Pilih Kategori</option>
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id }}" @if ($produk->kategori_id == $k->id) selected @endif>{{ $k->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            @error('kategori_id')
                <div class="alert alert-danger my-2">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" class="form-control mb-1" placeholder="Masukan Nama Produk" name="nama_produk"
                    id="nama_produk" value="{{ $produk->nama_produk }}">
            </div>
            @error('nama_produk')
                <div class="alert alert-danger my-2">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="deskripsi">Deskripsi Produk</label>
                <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi" placeholder="Deskripsi">{{ $produk->deskripsi }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Perbaharui</button>
        </form>
    </div>
</div>
@endsection
