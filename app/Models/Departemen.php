<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;

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

    public function user() {
        return $this->hasMany(User::class, 'departemen_id');
    }
}
