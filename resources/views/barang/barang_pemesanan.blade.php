@extends('layouts/user/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Permintaan Barang</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
            @if (Auth()->User()->role=='admin')
            <button class="btn-toggle-minified" data-toggle="modal" data-target="#pemesanan"><i
                    class="lnr lnr-plus-circle"></i></button>
            @endif
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    @if (Auth()->User()->role=='admin')
                    <th>Nama Supplier</th>
                    @endif
                    <th>Status Permintaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $tr)
                @if ($tr->jenis_transaksi == 'pemesanan' && $tr->status_transaksi=='pemesanan')
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    @if (Auth()->User()->role=='admin')
                    <td>{{ $tr->user->name }}</td>
                    @endif
                    <td><span class="label label-warning">{{ $tr->status_transaksi }}</span></td>
                    <td>
                        @if (Auth()->User()->role=='admin')
                        <a href="{{ url('/admin/pemesanan/produk/'.$tr->id.'/'.$tr->user_id) }}" class="btn btn-sm btn-info">Tambah
                            Pemesanan Produk</a>
                        <a href="{{ url('/admin/pemesanan/'.$tr->id.'/delete') }}" class="btn btn-sm btn-danger">Hapus
                            Pemesanan</a>
                        @endif
                        @if (Auth()->User()->role=='supplier')
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
                                            action="{{ url('/supplier/pesanan/'.$tr->id.'/persetujuan') }}" method="POST">
                                            @csrf
                                            @method('put')
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
                        <a href="{{ url('/supplier/pesanan/'.$tr->id) }}" class="btn btn-sm btn-info">Detail
                            Produk</a>
                        @endif
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@if (Auth()->User()->role=='admin')
<div class="modal fade" id="pemesanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Halaman Pemesanan</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.pemesanan.create') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <select class="form-control" id="supplier" name="user_id">
                            <option disabled selected>Pilih Supplier</option>
                            @foreach ($user as $u)
                            @if ($u->role == 'supplier')
                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endif
