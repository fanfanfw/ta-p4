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
        'dosen_id',
        'program_studi_id',
        'sks',
        'semester',
        'kelas_id',
];


        public function namaDosen()
        {
            return $this->belongsTo(NamaDosen::class, 'dosen_id');
        }

        public function programStudi()
        {
            return $this->belongsTo(ProgramStudi::class, 'program_studi_id');
        }

        public function jadwalKuliahs()
        {
            return $this->hasMany(JadwalKuliah::class, 'matakuliah_id');
        }
        
        public function usermatakuliah()
        {
            return $this->hasMany(JadwalKuliah::class, 'matakuliah_id');
        }
       
        public function kelas()
        {
            return $this->belongsTo(Kelas::class, 'kelas_id');
        }
}
