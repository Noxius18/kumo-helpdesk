<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'roles_id';
    protected $keyType = 'char';
    public $timestamps = false;
    protected $fillable = [
        'roles_id',
        'role'
    ];
}
