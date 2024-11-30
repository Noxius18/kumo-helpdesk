<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spesialis extends Model
{
    protected $table = 'spesialisasi';
    protected $primaryKey = 'spesialis_id';
    protected $keyType = 'char';
    public $timestamps = false;
    protected $fillable = [
        'spesialis_id',
        'spesialis'
    ];

}
