@extends('layouts/master')
@section('content')
@if (Auth()->User()->role == 'pc')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Request Barang</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Pemesan</th>
                    <th>Status Permintaan</th>
                    <th>Tanggal Permintaan Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $tr)
                @if ($tr->jenis_transaksi == 'permintaan' && $tr->status_transaksi=='menunggu')
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tr->user->name }}</td>
                    <td><span class="label label-warning">{{ $tr->status_transaksi }}</span></td>
                    <td>{{ $tr->created_at }}</td>
                    <td>
                        <a href="{{ route('halaman.persetujuan',$tr->id) }}" class="btn btn-sm btn-primary">Persetujuan</a>
                        <a href="{{ url('/permintaan/'.$tr->id) }}" class="btn btn-sm btn-info">Detail</a>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md">{{ $transaksi->links() }}</div>
        </div>
    </div>
</div>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Pengiriman Barang</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Pemesan</th>
                    <th>Status Permintaan</th>
                    <th>Tanggal Permintaan Dibuat</th>
                    <th>Jumlah Barang Belum Dikirm</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $tr)
                @if ($tr->jenis_transaksi == 'permintaan' && $tr->status_transaksi=='diterima')
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tr->user->name }}</td>
                    <td><span class="label label-success">{{ $tr->status_transaksi }}</span></td>
                    <td>{{ $tr->created_at }}</td>
                    <td>{{ $detail::where('status_produk',0)->where('transaksi_id',$tr->id)->count() }}</td>
                    <td>
                        <a href="{{ url('/permintaan/'.$tr->id) }}" class="btn btn-sm btn-info">Detail</a>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
        <div class="panel-footer">
        <div class="row">
            <div class="col-md">{{ $transaksi->links() }}</div>
        </div>
    </div>
</div>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Barang Ditolak</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Pemesan</th>
                    <th>Status Permintaan</th>
                    <th>Tanggal Permintaan Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $tr)
                @if ($tr->jenis_transaksi == 'permintaan' && $tr->status_transaksi=='ditolak')
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tr->user->name }}</td>
                    <td><span class="label label-danger">{{ $tr->status_transaksi }}</span></td>
                    <td>{{ $tr->created_at }}</td>
                    <td>
                        <a href="{{ url('/permintaan/'.$tr->id) }}" class="btn btn-sm btn-info">Detail</a>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
        <div class="panel-footer">
        <div class="row">
            <div class="col-md">{{ $transaksi->links() }}</div>
        </div>
    </div>
</div>
@endif
@if (Auth()->User()->role=='pg')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Request Barang</h3>
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
                    <th>Nama Kategori</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Permintaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail->get() as $td)
                @if ($td->transaksi->jenis_transaksi == 'permintaan' && $td->transaksi->status_transaksi=='menunggu')
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $td->produk->kategori->nama_kategori }}</td>
                        <td>{{ $td->produk->nama_produk }}</td>
                        <td style="text-align: left">{{ $td->jumlah_permintaan }}</td>
                        <td>
                            <a href="{{ url('/petugas/permintaan/detail/'.$td->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <a class="btn btn-sm btn-danger delete" id="{{ $td->id }}">Delete</a>
                        </td>
                    </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md">{{ $transaksi->links() }}</div>
        </div>
    </div>
</div>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Barang Request Diterima</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Status Permintaan</th>
                    <th>Tanggal Permintaan Diterima</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $tr)
                @if ($tr->jenis_transaksi == 'permintaan' && $tr->status_transaksi=='diterima')
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><span class="label label-success">{{ $tr->status_transaksi }}</span></td>
                    <td>{{ $tr->updated_at }}</td>
                    <td>
                        <a href="{{ url('/petugas/permintaan/'.$tr->id) }}" class="btn btn-sm btn-info">Detail</a>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md">{{ $transaksi->links() }}</div>
        </div>
    </div>
</div>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Barang Request Ditolak</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Status Permintaan</th>
                    <th>Tanggal Permintaan Ditolak</th>
                    <th>Alasan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $tr)
                @if ($tr->jenis_transaksi == 'permintaan' && $tr->status_transaksi=='ditolak')
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><span class="label label-danger">{{ $tr->status_transaksi }}</span></td>
                    <td>{{ $tr->updated_at }}</td>
                    <td><span class="label label-danger">{{ $tr->alasan }}</span></td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md">{{ $transaksi->links() }}</div>
        </div>
    </div>
</div>
<div class="modal fade" id="produk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Menambahkan Produk</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('barang.detail.create') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <select class="form-control" name="kategori_id" id="kategori_id">
                            <option disabled selected>Pilih Kategori</option>
                            @foreach ($kategori as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="produk_id" id="produk_id">
                            <option disabled selected>NA</option>
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
@endif
@endsection
@section('footer')
<script>
$(document).ready(function(){
    $('#kategori_id').on('change',function(e){
        var kategori_id = e.target.value
        $.get('/petugas/permintaan/produk?kategori_id='+kategori_id,function(data){
            $('#produk_id').empty();
            $('#produk_id').append('<option disable="true" selected="true">Pilih Produk</option>');
            $.each(data, function(index, produk){
                $('#produk_id').append('<option value="'+ produk.id +'">'+ produk.nama_produk +'</option>');
            });
        });
    });

    $('.delete').click(function () {
        var id = $(this).attr('id');
        swal({
                title: "Yakin ?",
                text: "Mau Menghapus Data Ini",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/petugas/permintaan/" + id + "/delete";
                }
            });
    });

});
</script>
@endsection
