<?php

namespace App\Http\Controllers;

use App\Models\Hari;
use App\Models\JadwalKuliah;
use App\Models\Jam;
use App\Models\Kelas;
use App\Models\Matakuliah;
use App\Models\NamaDosen;
use App\Models\ProgramStudi;
use App\Models\Ruangan;
use App\Models\UserJadwalKuliah;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class InputJadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $namadosen = NamaDosen::all();
    $program = ProgramStudi::all();
    $ruangan = Ruangan::all();
    $matakuliah = Matakuliah::all();
    $hari = Hari::all();
    $kelas = Kelas::all();
    $jam = Jam::all();

    $userjadwal2 = UserJadwalKuliah::all(); // Menggunakan with('user') untuk memuat relasi user
    // $userjadwal = $userjadwal2->unique('hari_id'); // Menghindari duplikasi data berdasarkan user_id

    return view('input-jadwal.index', [
        'userjadwal' => $userjadwal2,
        'namadosen' => $namadosen,
        'program' => $program,
        'ruangan' => $ruangan,
        'matakuliah' => $matakuliah,
        'hari' => $hari,
        'kelas' => $kelas,
        'jam' => $jam,
        'active' => 'input-jadwal',
    ]);
}

  

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
