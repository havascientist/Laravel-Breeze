<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    public $timestamps = false; // Menyatakan bahwa tabel tidak memiliki kolom waktu standar

    protected $fillable = [
        'namaKoleksi',
        'jenisKoleksi',
        'createdAt',
        'jumlahKoleksi',
    ];
    
    

    protected $createdAt = 'createdAt'; // Menyatakan bahwa 'createdAt' adalah kolom waktu khusus
}


// -- Nama : Putri Rahel Patrisia
// -- Nim : 6706223161
