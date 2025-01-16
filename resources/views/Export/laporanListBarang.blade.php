<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan List Barang</title>
    <link rel="stylesheet" href="../resources/css/laporanlistbarang.css">
</head>
<body>
    <H3 class="Heading">Laporan List Barang</H3>
    <table class="table">
        <thead class="thead">
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody class="tbody">
            @foreach ($items as $item)    
            <tr>
                <td>{{$item->kode_barang}}</td>
                <td>{{$item->nama_barang}}</td>
                <td>{{$item->category->kategori}}</td>
                <td>{{$item->stock}} {{$item->unit->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>