@extends('layouts/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Supplier Update</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        </div>
    </div>
    <div class="panel-body">
        <form action="{{ url('/pc/supplier/'.$supplier->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nama Supplier" name="name" value="{{ $supplier->user->name }}">
            </div>
            @error('name')
            <div class="alert alert-danger my-2">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ $supplier->user->email }}">
            </div>
            @error('email')
            <div class="alert alert-danger my-2">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="{{ $supplier->alamat }}">
            </div>
            @error('alamat')
                <div class="alert alert-danger my-2">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Telepon" name="telepon" value="{{ $supplier->telepon }}">
            </div>
            @error('telepon')
                <div class="alert alert-danger my-2">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="kategori_id">Kategori Supplier</label>
                <select class="form-control" id="kategori_id" name="kategori_id">
                    <option disabled selected>Pilih Kategori</option>
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id }}" @if($k->id == $supplier->kategori_id) selected @endif>{{ $k->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            @error('kategori_id')
                <div class="alert alert-danger my-2">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
