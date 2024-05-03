<?php

namespace App\Http\Controllers;

use App\Models\UserJadwalKuliah;
use App\Models\Kelas;
use App\Models\UserMatakuliah;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class InputJadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $usermatakuliah = UserMatakuliah::all();
    $kelas = Kelas::all();

    $userjadwal2 = UserJadwalKuliah::all(); // Menggunakan with('user') untuk memuat relasi user
    // $userjadwal = $userjadwal2->unique('hari_id'); // Menghindari duplikasi data berdasarkan user_id

    return view('input-jadwal.index', [
        'userjadwal' => $userjadwal2,
        'usermatakuliah' => $usermatakuliah,
        'kelas' => $kelas,
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
