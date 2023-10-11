<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Koleksi</title>
</head>
<body>
    <h1>Daftar Koleksi</h1>
    <ul>
        @foreach($collections as $collection)
            <li>{{ $collection->namaKoleksi }} - {{ $collection->jenisKoleksi }} - {{ $collection->createdAt }}</li>
        @endforeach
    </ul>
</body>
</html>
