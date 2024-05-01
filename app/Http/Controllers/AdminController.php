<?php

namespace App\Http\Controllers;

use App\Models\Hari;
use App\Models\JadwalKuliah;
use App\Models\Jam;
use Illuminate\Http\Request;
use App\Models\Matakuliah;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class AdminController extends Controller
{
    public function index(){
        $dosen = User::all();
        $jam = Jam::all();
        $jadwalkuliah = JadwalKuliah::all();
        $hari = Hari::all();


        return view('dashboard', [
            'dosen' => $dosen,
            'jam' => $jam,
            'jadwal' => $jadwalkuliah,
            'hari' => $hari,
            'active' => 'dashboard',
        ]);
    }

}
