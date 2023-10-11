<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaKoleksi',
        'jenisKoleksi',
        'createdAt',
        'jumlahKoleksi',
    ];
}

// -- Nama : Putri Rahel Patrisia
// -- Nim : 6706223161
