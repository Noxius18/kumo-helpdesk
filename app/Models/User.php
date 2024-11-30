<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'nama_depan',
        'nama_belakang',
        'email',
        'password',
        'spesialis_id',
        'roles_id',
        'departemen_id'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

}
