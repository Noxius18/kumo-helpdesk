<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'kategori_id';
    protected $keyType = 'char';
    public $timestamps = false;
    protected $fillable = [
        'kategori_id',
        'kategori'
    ];

}
