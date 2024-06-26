<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKuliah extends Model
{
    use HasFactory;

    protected $fillable = [
        'matakuliah_id',
        'dosen_id',
        'ruangan_id',
        'hari_id',
        'jam_id',
    ];
    public function matakuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'matakuliah_id');
    }

    public function dosen()
    {
        return $this->belongsTo(NamaDosen::class, 'dosen_id');
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id');
    }

    public function hari()
    {
        return $this->belongsTo(Hari::class, 'hari_id');
    }
    
     public function jam()
     {
        return $this->belongsTo(Jam::class, 'jam_id');
     }

    // public function userJadwalKuliahs()
    // {
    //     return $this->hasMany(UserJadwalKuliah::class, 'jadwal_kuliah_id');
    // }

}
