<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'collections';
    protected $fillable = [
        'namaKoleksi',
        'jenisKoleksi',
        'createdAt',
        'jumlahKoleksi',
    ];
    
    

    protected $createdAt = 'createdAt'; \
}


// -- Nama : Putri Rahel Patrisia
// -- Nim : 6706223161
