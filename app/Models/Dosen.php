<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
class Dosen extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;
    protected $guarded = ['id'];
    protected $table = 'dosen'; // Menentukan nama tabel secara eksplisit
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
