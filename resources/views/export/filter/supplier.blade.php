<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Transaksi</title>
    <style>
        .table1 {
            font-family: sans-serif;
            color: #232323;
            border-collapse: collapse;
        }
        .table1, th, td{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <div class="row">
    <div class="col-12">
        <h3 style="text-align: center">Laporan Transaksi</h3>
        <p>Supplier {{ $supplier->user->name }}</p>
    </div>
</div>

<table class="table1">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Produk</th>
            <th>Jumlah Produk</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($transaksi as $dt)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dt->detailtransaksi->produk->nama_produk}}</td>
                <td>{{ $dt->detailtransaksi->jumlah_dikirim}}</td>
                <td>{{ $dt->status_transaksi}}</td>
            </tr>
        @empty
        <tr>
            <td colspan="4" style="text-align: center">Belum Ada Transaksi</td>
        </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2" style="text-align: right">Total Barang</td>
            <td colspan="2">{{ $total }}</td>
        </tr>
    </tfoot>
</table>

</body>
</html>
