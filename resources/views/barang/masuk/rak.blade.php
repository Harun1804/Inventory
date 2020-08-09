@extends('layouts/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Rak</h3>
    </div>
    <div class="panel-body">
        <form action="{{ url('/petugas/barang/masuk/'.$detail->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="input-group">
			    <input class="form-control" type="text" placeholder="Rak" name="rak">
			    <span class="input-group-btn"><button class="btn btn-primary" type="submit">Tambahkan</button></span>
			</div>
        </form>
    </div>
</div>
@endsection
