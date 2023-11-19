<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    protected $fillable = [     
        'id',
        'userIdPetugas	',
        'userIdPeminjam	',
        'tanggalPinjam	',
        'tanggalSelesai	',
        'created_at	',
        'updated_at   ',
       ];
}
