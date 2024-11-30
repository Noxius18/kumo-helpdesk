<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;

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

    public function user() {
        return $this->hasMany(User::class, 'spesialis_id');
    }

}
