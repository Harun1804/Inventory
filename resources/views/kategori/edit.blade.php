@extends('layouts/user/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Edit Kategori</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        </div>
    </div>
    <div class="panel-body">
        <form action="{{ url('/admin/kategori/'.$kategori->id.'/update') }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nama Kategori" name="nama_kategori" value="{{ $kategori->nama_kategori }}">
            </div>

            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
    </div>
</div>
@endsection
