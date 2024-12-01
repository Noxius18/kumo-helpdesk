<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Auth;

use App\Models\Role;
use App\Models\Departemen;
use App\Models\Spesialis;
use App\Models\Tiket;
use App\Models\Note;
class User extends Auth
{
    use Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'nama',
        'email',
        'password',
        'spesialis_id',
        'role_id',
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

    public function spesialis() {
        return $this->belongsTo(Spesialis::class, 'spesialis_id');
    }

    public function role() {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function departemen() {
        return $this->belongsTo(Departemen::class, 'departemen_id');
    }

    public function tiket() {
        return $this->hasMany(Tiket::class, 'tiket_id');
    }

    public function note() {
        return $this->hasMany(Note::class, 'note_id');
    }

}
