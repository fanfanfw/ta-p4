<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;
    

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
        public function userMatakuliah()
    {
        return $this->hasMany(UserMatakuliah::class, 'matakuliah_id');
    }

}
