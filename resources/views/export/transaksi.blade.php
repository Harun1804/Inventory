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

        .table1,
        th,
        td {
            border: 1px solid black;
        }

    </style>
</head>

<body>
    <div class="row">
        <div class="col-12">
            <h3 style="text-align: center">Laporan Transaksi</h3>
        </div>
    </div>
    <table class="table1">
        <thead>
            <tr>
                <td>Nama Supplier</td>
                <td>Nama Produk</td>
                <td>Jumlah Produk</td>
                <td>Tanggal Pesan</td>
                <td>Tanggal Diterima</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($jumlah::where('status_produk', '=', 2)->get() as $dt)
            <tr>
                <td>{{ $dt->transaksi->supplier->user->name }}</td>
                <td>{{ $dt->produk->nama_produk }}</td>
                <td>{{ $dt->jumlah_dikirim }}</td>
                <td>{{ $dt->created_at->format('d-m-Y') }}</td>
                <td>{{ $dt->updated_at->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                    <td colspan="2" style="text-align: right">Total Barang</td>
                    <td colspan="3">{{ $jumlah::where('status_produk', '=', 2)->sum('jumlah_dikirim') }}</td>
            </tr>
        </tfoot>
    </table>

</body>

</html>
