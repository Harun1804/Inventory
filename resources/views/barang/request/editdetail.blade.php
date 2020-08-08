@extends('layouts/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Edit Detail Request Barang</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        </div>
    </div>
    <div class="panel-body">
        <form action="{{ url('/petugas/permintaan/detail/'.$detail->id.'/update') }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <select class="form-control" name="produk_id">
                    <option disabled selected>Pilih Produk</option>
                    @foreach ($produk as $p)
                    <option value="{{ $p->id }}" @if ($p->id == $detail->produk_id) selected @endif>{{ $p->nama_produk }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="jproduk" placeholder="Jumlah Produk"
                    name="jumlah_permintaan" value="{{ $detail->jumlah_permintaan }}">
            </div>
            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
    </div>
</div>
@endsection
