<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    protected $table = 'departemen';
    protected $primaryKey = 'departemen_id';
    protected $keyType = 'char';
    public $timestamps = false;
    protected $fillable = [
        'departemen_id',
        'nama_departemen'
    ];
}
