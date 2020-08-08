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
        <form action="{{ url('/admin/user/'.$user->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Nama User</label>
                <input type="text" class="form-control mb-1" placeholder="Masukan Nama user" name="name"
                    id="name" value="{{ $user->name }}">
            </div>
            @error('name')
                <div class="alert alert-danger my-2">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="Masukan Email" name="email"
                    id="email" value="{{ $user->email }}">
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
                    <option value="admin" @if($user->role == 'admin') selected @endif>Administrator</option>
                    <option value="pg" @if($user->role == 'pg') selected @endif>Petugas Gudang</option>
                    <option value="pemilik" @if($user->role == 'pemilik') selected @endif>Pemilik</option>
                    <option value="pc" @if($user->role == 'pc') selected @endif>Purchasing</option>
                </select>
            </div>
            @error('role')
                <div class="alert alert-danger my-2">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Perbaharui</button>
        </form>
    </div>
</div>
@endsection
