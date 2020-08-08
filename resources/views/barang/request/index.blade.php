@extends('layouts/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Request Barang</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
            <a href="{{ route('barang.create') }}" class="btn-toggle-minified"><i class="lnr lnr-plus-circle"></i></a>
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
                        @if (Auth()->User()->role=='pg')
                        <a href="{{ url('/petugas/permintaan/'.$tr->id) }}" class="btn btn-sm btn-info">Tambah
                            Pemintaan Produk</a>
                        <a class="btn btn-sm btn-danger delete" id="{{ $tr->id }}">Hapus Permintaan</a>
                        @endif
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@if (Auth()->User()->role=='pg')
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
                        <a href="{{ url('/petugas/barang'.$tr->id) }}" class="btn btn-sm btn-info">Detail</a>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
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
</div>
@endif
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
                    window.location = "/petugas/permintaan/"+id+"/delete";
                }
            });
        });
    </script>
@endsection
