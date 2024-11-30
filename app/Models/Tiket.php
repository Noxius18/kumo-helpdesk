<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $table = 'tiket';
    protected $primaryKey = 'tiket_id';
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'tiket_id',
        'user_id',
        'kategori_id',
        'deskripsi',
        'tanggal_lapor',
        'prioritas',
        'status',
        'teknisi_id',
        'tanggal_selesai'
    ];
}
