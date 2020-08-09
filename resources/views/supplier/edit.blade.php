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
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                            </div>
                            <input class="form-control" placeholder="Password" type="password" name="password">
                        </div>
                    </div>
                    @error('password')
                        <div class="alert alert-danger my-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                            </div>
                            <input class="form-control" placeholder="Confirm Password" type="password" name="cpassword">
                        </div>
                    </div>
                    @error('cpassword')
                        <div class="alert alert-danger my-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
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
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
