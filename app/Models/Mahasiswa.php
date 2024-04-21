<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Mahasiswa extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable; // Gunakan trait Authenticatable

    protected $guarded = ['id'];
    protected $table = 'mahasiswa'; // Menentukan nama tabel secara eksplisit

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Pastikan ini sesuai dengan kebutuhan Anda
    ];
}