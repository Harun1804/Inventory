@extends('layouts/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Detail Request Barang</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
            <button class="btn-toggle-minified" data-toggle="modal" data-target="#produk"><i class="lnr lnr-plus-circle"></i></button>
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Permintaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($detailtransaksi as $dt)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $dt->produk->nama_produk }}</td>
                    <td>{{ $dt->jumlah_permintaan }}</td>
                    <td>
                        <a href="{{ url('/petugas/permintaan/detail/'.$dt->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a class="btn btn-sm btn-danger delete" id="{{ $dt->id }}">Delete</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align: center">Belum Ada Data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md-6"><span class="panel-note"></span></div>
            @if (Auth()->User()->role == 'pg')
            <div class="col-md-6 text-right"><a href="{{ route('barang.index') }}" class="btn btn-primary">Back</a></div>
            @endif
        </div>
    </div>
</div>
@endsection
@section('footer')
    <script>
        $('.delete').click(function(){
        var id = $(this).attr('id');
        swal({
            title: "Yakin ?",
            text: "Mau Menghapus Data Ini",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
                if(willDelete){
                    window.location = "/petugas/permintaan/detail/"+id+"/delete";
                }
            });
        });
    </script>
@endsection
<div class="modal fade" id="produk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Menambahkan Produk</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('barang.detail.create') }}" method="POST">
                    @csrf
                    <input type="hidden" name="transaksi_id" value="{{ $id }}" class="form-control">
                    <div class="form-group">
                        <select class="form-control" name="produk_id">
                            <option disabled selected>Pilih Produk</option>
                            @foreach ($produk as $p)
                            <option value="{{ $p->id }}">{{ $p->nama_produk }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="jproduk" placeholder="Jumlah Produk" name="jumlah_permintaan">
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
