<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    use HasFactory;

    public function mataKuliahs()
    {
        return $this->hasMany(MataKuliah::class, 'program_studi_id');
    }

}
