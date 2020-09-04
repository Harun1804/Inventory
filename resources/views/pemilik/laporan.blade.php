@extends('layouts/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Opsi Filter</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        </div>
    </div>
    <div class="panel-body">
        <form action="{{ route('pemilik.laporan.filter') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="tanggal_mulai">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tanggal_mulai" aria-describedby="emailHelp"
                            placeholder="Masukan Tanggal Awal" name="mulai">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="tanggal_akhir">Tanggal Berakhir</label>
                        <input type="date" class="form-control" id="tanggal_akhir" aria-describedby="emailHelp"
                            placeholder="Masukan Tanggal Akhir" name="akhir">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="supplier_id">Supplier</label>
                        <select class="form-control" id="supplier_id" name="supplier_id">
                            <option disabled selected>Pilih Supplier</option>
                            @foreach ($supplier as $s)
                                <option value="{{ $s->id }}">{{ $s->user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="status_transaksi">Status Transaksi</label>
                        <select class="form-control" id="status_transaksi" name="status_transaksi">
                            <option disabled selected>Pilih Keterangan</option>
                            <option value="diterima">Berhasil</option>
                            <option value="ditolak">Gagal</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-sm btn-primary">Filter</button>
                    <a href="{{ route('pemilik.laporan.semua') }}" class="btn btn-info btn-sm">Semua</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
