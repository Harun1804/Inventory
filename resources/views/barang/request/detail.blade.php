@extends('layouts/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Detail Request Barang</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
            @if (Auth()->User()->role == 'pg' && $transaksi->status_transaksi == 'menunggu')
            <button class="btn-toggle-minified" data-toggle="modal" data-target="#produk"><i class="lnr lnr-plus-circle"></i></button>
            @elseif(Auth()->User()->role == 'pc' && $transaksi->status_transaksi == 'diterima')
            <button class="btn-toggle-minified cetak" id="{{ $id }}"><i class="lnr lnr-printer"></i></button>
            @endif
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Supplier</th>
                    <th>Nama Kategori</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Pesanan</th>
                    @if(Auth()->User()->role == 'pc' && $transaksi->status_transaksi == 'diterima')
                    <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse ($detailtransaksi as $dt)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    @if($dt->transaksi->supplier_id == null)
                    <td>Tidak mempunyai supplier</td>
                    @else
                    <td>{{ $dt->transaksi->supplier->user->name }}</td>
                    @endif
                    <td>{{ $dt->produk->kategori->nama_kategori }}</td>
                    <td>{{ $dt->produk->nama_produk }}</td>
                    <td style="text-align: left">{{ $dt->jumlah_permintaan }}</td>
                    <td>
                        @if (Auth()->User()->role == 'pg' && $dt->status_produk == 0)
                        <a href="{{ url('/petugas/permintaan/detail/'.$dt->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a class="btn btn-sm btn-danger delete" id="{{ $dt->id }}">Delete</a>
                        @elseif(Auth()->User()->role == 'pc' && $dt->status_produk == 0 && $dt->transaksi->status_transaksi == 'diterima')
                        <a type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                            data-target="#kirim">Barang Masuk</a>
                        <div class="modal fade" id="kirim" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Kirim Barang</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-auth-small"
                                            action="{{ url('/pc/permintaan/'.$dt->id.'/kirim') }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="jumlah_dikirim" class="control-label sr-only">Jumlah Permintaan</label>
                                                        <input type="text" class="form-control" id="jumlah_dikirim"
                                                        placeholder="Masukan Jumlah Pengiriman" readonly value="{{ $dt->jumlah_permintaan }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="jumlah_dikirim" class="control-label sr-only">Jumlah Barang</label>
                                                        <input type="text" class="form-control" id="jumlah_dikirim"
                                                        placeholder="Masukan Jumlah Yang Akan Dikirm" required name="jumlah_dikirim">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="alasan" class="control-label sr-only">Alasan</label>
                                                <input type="text" class="form-control" id="alasan"
                                                placeholder="Masukan Alasan Jika Pengiriman Barang Tidak Sesuai Permintaan" name="alasan">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-info">Kirim Pesanan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                        @endif
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
            <div class="col-md-6">{{ $detailtransaksi->links() }}</div>
            @if (Auth()->User()->role == 'pg')
            <div class="col-md-6 text-right"><a href="{{ route('barang.index') }}" class="btn btn-primary">Back</a></div>
            @elseif(Auth()->User()->role == 'pc')
            <div class="col-md-6 text-right"><a href="{{ route('permintaan.index') }}" class="btn btn-primary">Back</a></div>
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
        $('.cetak').click(function(){
            var id = $(this).attr('id');
            window.location = "/pc/permintaan/"+id+"/cetak";
        })
    </script>
@endsection
@if (Auth()->User()->role == 'pg')
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
@endif
