<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jam extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    public function jadwal_kuliahs()
    {
        return $this->hasMany(JadwalKuliah::class, 'jam_id');
    }
}
