@extends('layouts/user/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Edit Supplier</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
            <button class="btn-toggle-minified" data-toggle="modal" data-target="#supplier"><i
                    class="lnr lnr-plus-circle"></i></button>
        </div>
    </div>
    <div class="panel-body">
        <form role="form" action="{{ url('/admin/supplier/'.$data->user->id.'/update') }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <div class="input-group">
			        <input class="form-control" placeholder="Nama" type="text" name="name" value="{{ $data->user->name }}">
			    </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input class="form-control" placeholder="Email" type="email" name="email" value="{{ $data->user->email }}">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-pin-3"></i></span>
                    </div>
                    <input class="form-control" placeholder="Alamat" type="text" name="alamat"
                        value="{{ $data->alamat }}">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                    </div>
                    <input class="form-control" placeholder="Telepon" type="text" name="telepon"
                        value="{{ $data->telepon }}">
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary mt-4">Edit</button>
            </div>
        </form>
    </div>
</div>
@endsection
