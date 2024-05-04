<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMatakuliah extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'matakuliah_id',
];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'matakuliah_id');
    }
}
