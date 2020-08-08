@extends('layouts/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">User Create</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        </div>
    </div>
    <div class="panel-body">
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama User</label>
                <input type="text" class="form-control mb-1" placeholder="Masukan Nama user" name="name"
                    id="name" value="{{ old('name') }}">
            </div>
            @error('name')
                <div class="alert alert-danger my-2">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="Masukan Email" name="email"
                    id="email" value="{{ old('email') }}">
            </div>
            @error('email')
                <div class="alert alert-danger my-2">{{ $message }}</div>
            @enderror
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Masukan Password" name="password"
                        id="password">
                    </div>
                    @error('password')
                        <div class="alert alert-danger my-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Ulangi Password" name="cpassword"
                        id="cpassword">
                    </div>
                    @error('cpassword')
                        <div class="alert alert-danger my-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role" name="role">
                    <option disabled selected>Pilih Role</option>
                    <option value="admin">Administrator</option>
                    <option value="pg">Petugas Gudang</option>
                    <option value="pemilik">Pemilik</option>
                    <option value="pc">Purchasing</option>
                </select>
            </div>
            @error('role')
                <div class="alert alert-danger my-2">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
