<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Barang Masuk</title>
    <link rel="stylesheet" href="../resources/css/laporan.css">
</head>
<body>
    <H3 class="Heading">Laporan Barang Masuk</H3>
    <table class="table">
        <thead class="thead">
            <tr>
                <th>Batch Number</th>
                <th>Tanggal Masuk</th>
                <th>Nama Barang</th>
                <th>Jumlah Masuk</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody class="tbody">
            @foreach ($items as $item)    
            <tr>
                <td>{{$item->id_barang_masuk}}</td>
                <td>{{$item->tanggal_masuk}}</td>
                <td>{{$item->barang->nama_barang}}</td>
                <td>{{$item->jumlah_masuk}} {{$item->unit->name}}</td>
                <td>{{$item->keterangan}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>