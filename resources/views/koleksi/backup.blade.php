<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Info Koleksi') }}
        </h2>
    </x-slot>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        p {
            font-size: 20px;
            color: white;
            margin-left: 15px;        
            padding: 15px;
        }

        form{
            font-size: 20px;
            color: white;
            margin-left: 15px;        
            padding: 20px;
        }
    </style>
</head>
<body>

<p>Nama Koleksi: {{ $collection->namaKoleksi }}</p>
<p>Jenis Koleksi: {{ $collection->jenisKoleksi }}</p>
<p>Jumlah Koleksi: {{ $collection->jumlahKoleksi }}</p>

<form action="POST" action="{{url('koleksiUpdate')}}">
@csrf
<div class="row form-group">
    <label class="form-label">ID Koleksi*</label>
    <input id="id" name="id" type="text" class="form-control" autocomplete="off" value="{{$collection->nama}}" readonly>    
</div>

<div class="row form-group">
    <label class="form-label">Jenis*</label>
    <select name="jenis" id="jenis" class="form-select" required>
        <option value="-1" @if(old('jenis', $collection->jenis) == -1) selected @endif>Pilih salah satu</option>
        <option value="1" @if(old('jenis', $collection->jenis) == 1) selected @endif>Buku</option>
        <option value="2" @if(old('jenis', $collection->jenis) == 2) selected @endif>Majalah</option>
        <option value="3" @if(old('jenis', $collection->jenis) == 3) selected @endif>Cakram Digital</option>
    </select>
</div>

<div class="row form-group">
    <label class= "form-label">Jumlah Awal </label>
        <input id="jumlahAwal" name="jumlahKoleksi" type="text" class="form-control"
         autocomplete="off" value="{{$collection->jumlahAwal}} " readonly>
</div>

<div class="row form-group">
    <label class= "form-label">Jumlah Sisa </label>
        <input id="jumlahSisa" name="jumlahSisa" type="text" class="form-control"
         autocomplete="off" value="{{old('namaKoleksi', $collection->jumlahSisa)}} " >
</div>

<div class="row form-group">
    <label class= "form-label">Jumlah Keluar </label>
        <input id="jumlahKeluar" name="jumlahKeluar" type="text" class="form-control"
        autocomplete="off" value="{{old('namaKoleksi', $collection->jumlahKeluar)}} " >
</div>

<div class="row form-group">
    <div class="col-md-8">
        <button class="btn btn-primary buttonConf" id="buttSubmit" type="submit">Ok</button>
        <button type="Reset" class="btn btn-danger buttonConf" >Reset</button>
    </div>
</div>

</form>    

</body>
</html>
</x-app-layout>
