<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Kategori;
use App\Models\Note;

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

    protected $casts = [
        'tanggal_lapor' => 'datetime',
        'tanggal_selesai' => 'datetime'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function teknisi() {
        return $this->belongsTo(User::class, 'teknisi_id');
    }

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function foto() {
        return $this->hasMany(Foto::class, 'tiket_id', 'tiket_id');
    } 

    public function note() {
        return $this->hasMany(Note::class, 'tiket_id', 'tiket_id');
    }
}
