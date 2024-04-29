<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\UserJadwalKuliah;
use App\Models\UserMatakuliah;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $userid = Auth::id();

        $jadwalKuliahs = UserJadwalKuliah::where('user_id', $userid)->with('jadwalkuliah')->get();

                return view('pages.dosen.dashboard', ['jadwalkuliah' => $jadwalKuliahs]);
    }
    public function matakuliah()
    {
        $userid = Auth::id();

        $usermatakuliah = UserMatakuliah::where('user_id', $userid)->with('usermatakuliah')->get();

        return view('pages.dosen.matakuliah', ['usermatakuliah' => $usermatakuliah]);
    }
}