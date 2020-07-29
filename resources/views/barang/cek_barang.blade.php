@extends('layouts/user/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Pengecekan Barang Berdasarkan Kategori</h3>
    </div>
    <div class="panel-body">
        <form action="" method="get">
            @csrf
            <div class="form-group">
                <label for="kategori">Pilih Kategori</label>
                <select class="form-control" id="kategori" name="kategori" onchange="showKategori()">
                    <option disabled selected>Pilih Kategori</option>
                    @foreach ($kategori as $ktgr)
                        <option value="{{ $ktgr->id }}">{{ $ktgr->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>
</div>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Tabel Barang</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Rak</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $pr)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pr->nama_barang }}</td>
                        <td>pr->stok->jumlah_stok</td>
                        <td>pr->barangmasuk</td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md-6">{{ $produk->links() }}</div>
            <div class="col-md-6 text-right"></div>
        </div>
    </div>
</div>
@endsection
