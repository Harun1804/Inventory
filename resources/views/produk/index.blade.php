@extends('layouts/user/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Produk</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
            <button class="btn-toggle-minified" data-toggle="modal" data-target="#produk"><i
                    class="lnr lnr-plus-circle"></i></button>
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Barcode</th>
                    <th>Kategori</th>
                    <th>Nama Barang</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $pr)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="data:image/png;base64,{{DNS1D::getBarcodePNG($pr->id, 'C39')}}" alt="barcode" /></td>
                    <td>{{ $pr->kategori->nama_kategori }}</td>
                    <td>{{ $pr->nama_barang }}</td>

                    <td>{{ $pr->deskripsi }}</td>
                    <td>
                        <a href="{{ url('/supplier/produk/'.$pr->id.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ url('/supplier/produk/'.$pr->id.'/delete') }}"
                            class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
<div class="modal fade" id="produk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Menambahkan Supplier</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('supplier.produk.create') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control" id="kategori" name="kategori_id">
                            <option disabled selected>Pilih Kategori</option>
                            @foreach ($kategori as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control" placeholder="Nama Barang / Produk" name="nama_barang"
                            id="nama_barang">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Produk</label>
                        <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
