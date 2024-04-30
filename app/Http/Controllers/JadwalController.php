<?php

namespace App\Http\Controllers;

use App\Models\JadwalKuliah;
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
        return view('matakuliah.index', [
            'jadwal' => JadwalKuliah::latest()->get(),
            'namadosen' => $namadosen,
            'program' => $program,
            'ruangan' => $ruangan
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
