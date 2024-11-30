<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Tiket;
use App\Models\User;

class Note extends Model
{
    protected $table = 'tiket_note';
    protected $primaryKey = 'note_id';
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'note_id',
        'teknisi_id',
        'tiket_id',
        'note',
        'tanggal'
    ];

    public function tiket() {
        return $this->belongsTo(Tiket::class, 'tiket_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'teknisi_id');
    }
}
