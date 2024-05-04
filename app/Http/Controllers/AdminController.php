<?php

namespace App\Http\Controllers;

use App\Models\Hari;
use App\Models\JadwalKuliah;
use App\Models\Matakuliah;
use App\Models\NamaDosen;
use App\Models\ProgramStudi;
use App\Models\Ruangan;
use App\Models\Kelas;
use App\Models\User;


class AdminController extends Controller
{
    public function index(){
        $jadwalkuliah = JadwalKuliah::all();
        $hari = Hari::all();
        $totalDosen = User::where('role', 'dosen')->count();
        $totalMatakuliah = Matakuliah::count();
        $totalMahasiswa = User::where('role', 'mahasiswa')->count();
        $totalProgramStudi = ProgramStudi::count();
        $totalRuang = Ruangan::count();
        $totalKelas = Kelas::count();

        return view('dashboard', [
            'jadwal' => $jadwalkuliah,
            'hari' => $hari,
            'active' => 'dashboard',
            'totalDosen' => $totalDosen,
            'totalMatakuliah' => $totalMatakuliah,
            'totalMahasiswa' => $totalMahasiswa,
            'totalProgramStudi' => $totalProgramStudi,
            'totalRuang' => $totalRuang,
            'totalKelas' => $totalKelas,
            'title' => 'Dashboard'
        ]);
    }

}
