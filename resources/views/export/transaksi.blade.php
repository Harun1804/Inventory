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
    @foreach ($transaksi as $tr)
    <tr>
        <td>Nama Supplier</td>
        <td> : </td>
        <td>{{ $tr->user->name }}</td>
    </tr>
    @endforeach
</table>

<table>
<thead>
    <tr>
        <td>Nama Produk</td>
        <td>Jumlah Produk</td>
    </tr>
</thead>
<tbody>
@foreach ($dtransaksi as $dt)
    <tr>
        <td>{{ $dt->produk->nama_barang }}</td>
        <td>{{ $dt->jumlah_transaksi }}</td>
    </tr>
@endforeach
</tbody>
</table>

</body>
</html>
