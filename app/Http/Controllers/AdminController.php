<?php

namespace App\Http\Controllers;

use App\Models\JadwalKuliah;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use App\Models\Matakuliah;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    public function index(){
        $dosen = User::all();

        return view('pages.admin.dashboard', ['dosen' => $dosen]);
    }
    public function dosen(){
        $user = User::all();

        return view('pages.admin.dosen', ['user' => $user]);
    }
    public function createdosen(Request $request){
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3' , 'max:255', 'unique:users'],
            'password' => ['required', 'min:5', 'max:255'],
            'role'=>'required'
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);
        return redirect('/pages/admin/dosen')->with('success', 'Data Berhasil Disimpan');
    }
    public function editdosen($id)
{
    $user = User::find($id);

    // Lakukan validasi data yang diubah
    $validateData = request()->validate([
        'name' => 'required|max:255',
        'username' => ['required', 'min:3', 'max:255', Rule::unique('users')->ignore($id)],
        'password' => ['required', 'min:5', 'max:255'],
        'role' => 'required'
    ]);

    // Update data user
    $user->update([
        'name' => $validateData['name'],
        'username' => $validateData['username'],
        'password' => Hash::make($validateData['password']),
        'role' => $validateData['role']
    ]);

    return redirect('/pages/admin/dosen')->with('success', 'Data Berhasil Diubah');
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
