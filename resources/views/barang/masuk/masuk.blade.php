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
                        <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#returnBarang">Kelola Barang</a>
                        <div class="modal" tabindex="-1" id="returnBarang">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Halaman Kelola Barang</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/petugas/barang/masuk/'.$dt->id.'/kondisi') }}" method="POST">
                                            @csrf
                                            @method('put')

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="kondisi_produk" class="control-label sr-only">Kondisi Barang</label>
                                                        <input type="text" class="form-control" id="kondisi_produk"
                                                        placeholder="Masukan Alasan Jika Pengiriman Barang Tidak Sesuai Permintaan" name="kondisi_produk">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="jumlah_kembali" class="control-label sr-only">Jumlah Pengembalian</label>
                                                        <input type="number" class="form-control" id="jumlah_kembali"
                                                        placeholder="Jumlah Produk Yang Dikembalikan" name="jumlah_kembali">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="rak" class="control-label sr-only">Rak</label>
                                                        <input type="text" class="form-control" id="rak"
                                                        placeholder="Masukan Rak" name="rak">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="jumlha_masuk" class="control-label sr-only">Jumlah Pengembalian</label>
                                                        <input type="number" class="form-control" id="jumlha_masuk"
                                                        placeholder="Jumlah Produk Yang Disimpan" name="jumlah_masuk">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-sm btn-primary">Selesai</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <a href="{{ url('/petugas/barang/masuk/'.$dt->id) }}" class="btn btn-sm btn-warning">Masukan Ke Rak</a> --}}
                    </td>
                </tr>
                @endif
                @empty
                <tr>
                    <td colspan="6" style="text-align: center">Belum Ada Data</td>
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
                    <td colspan="5" style="text-align: center">Belum Ada Data</td>
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
