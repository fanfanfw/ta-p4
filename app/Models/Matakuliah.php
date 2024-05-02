<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_matakuliah',
        'name',
        'nama_dosen_id',
        'program_studi_id',
        'sks',
        'semester'
];


        public function namaDosen()
        {
            return $this->belongsTo(NamaDosen::class, 'nama_dosen_id');
        }

        public function programStudi()
        {
            return $this->belongsTo(ProgramStudi::class, 'program_studi_id');
        }

        public function jadwalKuliahs()
        {
            return $this->hasMany(JadwalKuliah::class, 'matakuliah_id');
        }
       

}
