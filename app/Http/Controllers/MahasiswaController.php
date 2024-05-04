<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\UserMatakuliah;
use App\Models\UserJadwalKuliah;
use App\Models\Matakuliah;
use App\Models\Jadwalkuliah;
use App\Models\Hari;
use App\Models\Jam;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
{
    $userid = Auth::id();
    $userMatakuliahIds = UserMatakuliah::where('user_id', $userid)->pluck('matakuliah_id');
    $usermatakuliah = Matakuliah::whereIn('id', $userMatakuliahIds)->get();
    // Ambil jadwal kuliah yang terkait dengan matakuliah yang diambil oleh pengguna
    $jadwal = JadwalKuliah::whereIn('matakuliah_id', $userMatakuliahIds)
        ->with(['matakuliah', 'matakuliah.namaDosen', 'matakuliah.programStudi'])
        ->get();

    $hari = Hari::all();
    $jam = Jam::all();

    return view('mahasiswa.dashboard', [
        'jadwal' => $jadwal,
        'jam' => $jam,
        'hari' => $hari,
        'active' => 'dashboard',
        'title' => 'Dashboard',
        'userMatakuliah' => $usermatakuliah
    ]);
}

public function matakuliah(Request $request)
{
    $userid = Auth::id();
    $semester = $request->input('semester');

    // Ambil matakuliah yang diambil oleh pengguna
    $userMatakuliah = UserMatakuliah::where('user_id', $userid)
    ->with('matakuliah.jadwalKuliahs') // ini benar
    ->get();

    $matakuliah = Matakuliah::all();

    // Filter berdasarkan semester jika bukan "Semua"
    if ($semester != 'Semua') {
        $userMatakuliah = $userMatakuliah->filter(function ($um) use ($semester) {
            return $um->matakuliah->jadwalKuliahs->first()->semester == $semester;
        });
    }

    return view('mahasiswa.matakuliah', [
        'userMatakuliah' => $userMatakuliah,
        'matakuliah' => $matakuliah,
        'title' => 'Matakuliah',
        'active' => 'matakuliahmhs',
    ]);
}
    
}
