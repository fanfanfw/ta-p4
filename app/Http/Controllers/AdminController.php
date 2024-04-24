<?php

namespace App\Http\Controllers;

use App\Models\JadwalKuliah;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use App\Models\Matakuliah;

class AdminController extends Controller
{
    public function index(){
        return view('pages.admin.dashboard');
    }
    public function dosen(){
        return view ('pages.admin.dosen');
    }
    public function program(){
        $program = ProgramStudi::all();
        return view('pages.admin.program', ['program' => $program]);
    }
    public function programstore()
    {
        $studi = ProgramStudi::create(
            [
            'name' =>request()->get('name', ''),
            ]
        );
        return redirect()->route('admin.program');
    }
    public function programedit($id)
    {
        
    }

    public function matakuliah()
    {
        $matakuliah = MataKuliah::all();
        return view('pages.admin.matakuliah', ['matakuliah' => $matakuliah]);
    }

    public function jadwalkuliah()
    {
        
        $jadwalkuliah = JadwalKuliah::all();
        return view('pages.admin.jadwal', ['jadwalkuliah' => $jadwalkuliah]);
    }
}
