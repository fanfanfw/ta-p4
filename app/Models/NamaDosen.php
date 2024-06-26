<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamaDosen extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    
    public function mataKuliahs()
    {
        return $this->hasMany(Matakuliah::class, 'dosen_id');
    }
}
