<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Tiket;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'kategori_id';
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'kategori_id',
        'kategori'
    ];

    public function tiket() {
        return $this->hasMany(Tiket::class, 'kategori_id');
    }

}
