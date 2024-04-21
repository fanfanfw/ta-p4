<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
                'username' => 'required',
                'password' => 'required'
            ],
            [
                    'username.required' => 'NIM / NIDN Wajib Diisi',
                    'password.required' => 'Password Wajib Diisi'
            ]
        );

       // Coba autentikasi pada tabel user terlebih dahulu
        $infologin = [
            'username'=>$request->username,
            'password'=>$request->password
        ];

        if (Auth::attempt($infologin)) {
            if(Auth::user()->role == 'mahasiswa'){
                return redirect('/main/mahasiswa');
            }elseif(Auth::user()->role == 'dosen'){
                return redirect('/main/dosen');
            }elseif(Auth::user()->role == 'admin'){
                return redirect('/main/admin');
            }

        }else{
            return redirect('/')->withErrors('NIM / NIDN dan Password yang dimasukan SALAH')->withInput();
        }
    }

    public function logout()
        {
            Auth::logout();
            return redirect('');
        }
}
