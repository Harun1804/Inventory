@extends('layouts/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Kategori Update</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        </div>
    </div>
    <div class="panel-body">
        <form action="{{ url('/admin/kategori/'.$kategori->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="nama_kategori">Nama Kategori</label>
                <input type="text" class="form-control mb-1" placeholder="Masukan Nama Kategori" name="nama_kategori"
                    id="nama_kategori" value="{{ $kategori->nama_kategori }}">
            </div>
            @error('nama_kategori')
                <div class="alert alert-danger my-2">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Perbaharui</button>
        </form>
    </div>
</div>
@endsection
