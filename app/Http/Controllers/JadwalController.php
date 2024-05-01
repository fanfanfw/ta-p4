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
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $namadosen = NamaDosen::all();
        $program = ProgramStudi::all();
        $ruangan = Ruangan::all();
        $matakuliah = Matakuliah::all();
        $hari = Hari::all();
        $kelas = Kelas::all();
        $jam = Jam::all();
        return view('jadwal.index', [
            'jadwal' => JadwalKuliah::latest()->get(),
            'namadosen' => $namadosen,
            'program' => $program,
            'ruangan' => $ruangan,
            'matakuliah' => $matakuliah,
            'hari' => $hari,
            'kelas' => $kelas,
            'jam' => $jam,
            'active' => 'jadwal',

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
