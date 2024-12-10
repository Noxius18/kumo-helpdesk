<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Tiket;

class Foto extends Model
{
    protected $table = 'fotos';
    protected $fillable = [
        'tiket_id',
        'nama_file',
        'nama_path'
    ];

    public function tiket() {
        return $this->belongsTo(Tiket::class, 'tiket_id');
    }
}
