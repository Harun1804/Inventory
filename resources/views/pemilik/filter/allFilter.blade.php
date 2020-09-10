@extends('layouts/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Filter Transaksi</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
            <a awal="{{ $mulai }}" akhir="{{ $akhir }}" keterangan="{{ $keterangan }}" supplier="{{ $supplier }}" class="cetak"><i class="lnr lnr-printer"></i></a>
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Jenis Transaksi</th>
                    <th>Nama Pemesan</th>
                    <th>Nama Supplier</th>
                    <th>Tanggal Permintaan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $tr)
                <tr>
                    <td>{{ $tr->jenis_transaksi }}</td>
                    <td>{{ $tr->user->name }}</td>
                    <td>{{ $tr->supplier->user->name }}</td>
                    <td>{{ $tr->created_at->format('d-m-Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md-6">{{ $transaksi->links() }}</div>
            <div class="col-md-6 text-right"><a href="{{ route('pemilik.laporan') }}" class="btn btn-primary">Back</a></div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<script>
    $('.cetak').click(function(){
        var masuk = $(this).attr('awal');
        var keluar = $(this).attr('akhir');
        window.location = "/pemilik/laporan/filter/"+masuk+"/"+keluar;
    })
</script>
@endsection
