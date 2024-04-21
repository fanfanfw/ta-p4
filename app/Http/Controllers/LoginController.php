<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
                'id' => 'required',
                'password' => 'required'
            ],
            [
                    'id.required' => 'NIM / NIDN Wajib Diisi',
                    'password.required' => 'Password Wajib Diisi'
            ]
        );

       // Coba autentikasi pada tabel user terlebih dahulu
       $role = $request->role;
        $id = $request->id;
        $password = $request->password;

        switch ($role) {
            case 'Admin':
                $user = User::where('username', $id)->first();
                $authSuccess = $user && Hash::check($password, $user->password);
                $redirectPath = '/main/admin';
                break;
            case 'Mahasiswa':
                $user = Mahasiswa::where('nim', $id)->first();
                $authSuccess = $user && Hash::check($password, $user->password);
                $redirectPath = '/main/mahasiswa';
                break;
            case 'Dosen':
                $user = Dosen::where('nidn', $id)->first();
                $authSuccess = $user && Hash::check($password, $user->password);
                $redirectPath = '/main/dosen';
                break;
            default:
                return back()->withErrors(['role' => 'Role tidak valid.']);
        }

        if ($authSuccess) {
            // Jika autentikasi berhasil, log user masuk dengan guard yang sesuai
            Auth::login($user);
            return redirect($redirectPath);
        } else {
            // Jika autentikasi gagal, kembalikan ke halaman login dengan error
            return back()->withErrors(['id' => 'ID atau password salah.']);
        }
    }

    public function logout()
        {
            Auth::logout();
            return redirect('');
        }
}
