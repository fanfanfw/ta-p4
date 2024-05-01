<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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
    $userJadwalKuliah = UserJadwalKuliah::where('user_id', $userid)->pluck('jadwal_kuliah_id')->toArray();

    // Ambil jadwal kuliah yang terkait dengan pengguna
    $jadwal = JadwalKuliah::whereIn('id', $userJadwalKuliah)->with(['matakuliah', 'ruangan', 'hari', 'kelas', 'jam'])->get();
    $hari = Hari::all();
    $jam = Jam::all();
    // Kemudian kirim data jadwal ke tampilan
    return view('mahasiswa.dashboard', [
        'jadwal' => $jadwal,
        'jam' => $jam,
        'hari' => $hari,
    'active' => $jadwal
    ]);
    }

    public function matakuliah(Request $request)
    {
        $userid = Auth::id();
        $semester = $request->input('semester');
    
        $userjadwalkuliah = UserJadwalKuliah::where('user_id', $userid)->with('jadwalkuliah.matakuliah')->get();
        $matakuliah = Matakuliah::all();
    
        // Jika yang dipilih adalah "Semua", tampilkan semua data
        if ($semester == 'Semua') {
            return view('mahasiswa.matakuliah', [
                'userjadwal' => $userjadwalkuliah,
                'active' => $userjadwalkuliah,
                'matakuliah' => $matakuliah
            ]);
        } else {
            // Jika tidak, saring data berdasarkan semester yang dipilih
            $userjadwalkuliah = $userjadwalkuliah->filter(function ($userjadwal) use ($semester) {
                return $userjadwal->jadwalkuliah->semester == $semester;
            });
    
            return view('mahasiswa.matakuliah', [
                'userjadwal' => $userjadwalkuliah,
                'active' => $userjadwalkuliah,
                'matakuliah' => $matakuliah
            ]);
        }
    }
    
}
