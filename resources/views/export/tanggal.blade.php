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
        <p>Dari Tanggal {{ $mulai }} Sampai {{ $akhir }}</p>
    </div>
</div>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Supplier</th>
            <th>Nama Produk</th>
            <th>Jumlah Produk</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($dtransaksi as $dt)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dt->transaksi->supplier->user->name }}</td>
                <td>{{ $dt->produk->nama_produk}}</td>
                <td>{{ $dt->jumlah_dikirim}}</td>
            </tr>
        @empty
        <tr>
            <td colspan="4" style="text-align: center">Belum Ada Transaksi</td>
        </tr>
        @endforelse
    </tbody>
</table>

</body>
</html>
