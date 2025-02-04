<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Barang Keluar</title>
    <link rel="stylesheet" href="../resources/css/laporan.css">
</head>
<body>
    <H3 class="Heading">Laporan Barang Keluar</H3>
    <table class="table">
        <thead class="thead">
            <tr>
                <th>Batch Number</th>
                <th>Tanggal Keluar</th>
                <th>Nama Barang</th>
                <th>Jumlah Keluar</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody class="tbody">
            @foreach ($items as $item)    
            <tr>
                <td>{{$item->id_barang_keluar}}</td>
                <td>{{$item->tanggal_keluar}}</td>
                <td>{{$item->barang->nama_barang}}</td>
                <td>{{$item->jumlah_keluar}} {{$item->unit->name}}</td>
                <td>{{$item->keterangan}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>