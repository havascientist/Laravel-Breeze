<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Registrasi Pengguna</h1>
<!-- Formulir registrasi pengguna -->
<form method="POST" action="/userStore">
   @csrf
   <input type="text" name="name" placeholder="Nama Pengguna">
   <input type="email" name="email" placeholder="Email">
   <!-- Tambahkan kolom-kolom lain yang diperlukan -->
   <button type="submit">Daftar</button>
</form>


<h1>Tambah Data Koleksi</h1>
<!-- Formulir tambah data koleksi -->
<form method="POST" action="/koleksiStore">
   @csrf
   <input type="text" name="nama_koleksi" placeholder="Nama Koleksi">
   <input type="text" name="jenis_koleksi" placeholder="Jenis Koleksi">
   <input type="number" name="jumlah_koleksi" placeholder="Jumlah Koleksi">
   <!-- Tambahkan kolom-kolom lain yang diperlukan -->
   <button type="submit">Simpan</button>
</form>
</body>
</html>
// -- Nama : Putri Rahel Patrisia
// -- Nim : 6706223161
