<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'tiket_note';
    protected $primaryKey = 'note_id';
    protected $keyType = 'char';
    public $timestamps = false;
    protected $fillable = [
        'note_id',
        'teknisi_id',
        'tiket_id',
        'note',
        'tanggal'
    ];
}
