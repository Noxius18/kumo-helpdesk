<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Role extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'role_id';
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'role_id',
        'role'
    ];

    public function user() {
        return $this->hasMany(User::class, 'role_id');
    }
}
