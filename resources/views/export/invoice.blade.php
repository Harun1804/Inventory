<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
</head>
<body>
    <div class="row">
        <div class="col-12">
            <h3 style="text-align: center">Invoice Pembelian Barang</h3>
        </div>
    </div>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Produk</th>
            <th>Jumlah Produk</th>
            <th>Rak</th>
            <th>Tanggal Menerima</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dtransaksi as $dt)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dt->produk->nama_produk}}</td>
                <td>{{ $dt->jumlah_dikirim}}</td>
                <td>{{ $dt->rak}}</td>
                <td>{{ $dt->updated_at->format('d-m-Y')}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
