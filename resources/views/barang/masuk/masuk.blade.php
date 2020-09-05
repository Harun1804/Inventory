@extends('layouts/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Barang Masuk Belum Masuk Rak</h3>
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
                    <th>Jumlah Barang Masuk</th>
                    <th>Tanggal Barang Tiba</th>
                    <th>Tanggal Barang Dipesan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($detailtransaksi as $dt)
                @if ($dt->status_produk == 1)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $dt->produk->nama_produk }}</td>
                    <td style="text-align: left">{{ $dt->jumlah_dikirim }}</td>
                    <td>{{ $dt->updated_at->format('d-m-Y') }}</td>
                    <td>{{ $dt->created_at->format('d-m-Y') }}</td>
                    <td>
                        <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#returnBarang">Return Barang</a>
                        <div class="modal" tabindex="-1" id="returnBarang">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Halaman Pengembalian Barang</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/petugas/barang/masuk/'.$dt->id.'/kembali') }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <div class="input-group">
                                                <input class="form-control" type="text" placeholder="Kondisi Barang" name="kondisi_produk">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary" type="submit">Return Barang</button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/petugas/barang/masuk/'.$dt->id) }}" class="btn btn-sm btn-warning">Masukan Ke Rak</a>
                    </td>
                </tr>
                @endif
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
            <div class="col-md">{{ $detailtransaksi->links() }}</div>
        </div>
    </div>
</div>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Barang Masuk Sudah Masuk Rak</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
            <a href="{{ route('barang.masuk.invoice') }}"><i class="lnr lnr-printer"></i></a>
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Barang Masuk</th>
                    <th>Tanggal Barang Tiba</th>
                    <th>Tanggal Barang Dipesan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($detailtransaksi as $dt)
                @if ($dt->rak != null)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $dt->produk->nama_produk }}</td>
                    <td style="text-align: left">{{ $dt->jumlah_dikirim }}</td>
                    <td>{{ $dt->updated_at->format('d-m-Y') }}</td>
                    <td>{{ $dt->created_at->format('d-m-Y') }}</td>
                    <td></td>
                </tr>
                @endif
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
            <div class="col-md">{{ $detailtransaksi->links() }}</div>
        </div>
    </div>
</div>
@endsection
