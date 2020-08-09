<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Transaksi</title>
</head>
<body>
    <div class="row">
    <div class="col-12">
        <h3 style="text-align: center">Laporan Transaksi</h3>
    </div>
</div>
<table>
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
@foreach ($dtransaksi as $dt)
    <tr>
        <td>{{ $dt->transaksi->supplier->user->name }}</td>
        <td>{{ $dt->produk->nama_produk }}</td>
        <td>{{ $dt->jumlah_dikirim }}</td>
        <td>{{ $dt->created_at->format('d-m-Y') }}</td>
        <td>{{ $dt->updated_at->format('d-m-Y') }}</td>
    </tr>
@endforeach
</tbody>
</table>

</body>
</html>
