<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;
    protected $fillable = ['name','kapasitas'];


    public function jadwal_kuliahs()
    {
        return $this->hasMany(JadwalKuliah::class, 'ruangan_id');
    }

}
