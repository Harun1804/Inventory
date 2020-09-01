@extends('layouts/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Request Barang</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
            @if (Auth()->User()->role == 'pg')
            <a href="{{ route('barang.create') }}" class="btn-toggle-minified"><i class="lnr lnr-plus-circle"></i></a>
            @endif
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
                        @elseif(Auth()->User()->role=='pc')
                        <a type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                            data-target="#persetujuan">Persetujuan</a>
                        <div class="modal fade" id="persetujuan" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Persetujuan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-auth-small"
                                            action="{{ url('/pc/permintaan/'.$tr->id.'/persetujuan') }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <div class="form-group">
                                                <label for="supplier_id">Supplier</label>
                                                <select class="form-control" id="supplier_id" name="supplier_id">
                                                    <option disabled selected>Pilih Supplier</option>
                                                    @foreach ($supplier as $sp)
                                                    <option value="{{ $sp->id }}">{{ $sp->user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="alasan" class="control-label sr-only">Alasan</label>
                                                <input type="text" class="form-control" id="alasan"
                                                    placeholder="Masukan Alasan" required name="alasan">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-info" name="approve"
                                            value="diterima">Setuju</button>
                                        <button type="submit" class="btn btn-danger" name="approve"
                                            value="ditolak">Tolak</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/permintaan/'.$tr->id) }}" class="btn btn-sm btn-info">Detail</a>
                        @endif
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
@if (Auth()->User()->role == 'pc')
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
@endif
@endsection
@section('footer')
<script>
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

</script>
@endsection
