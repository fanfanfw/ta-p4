<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index()
    {
        return view('main');
    }
    public function admin()
    {
        return view('main');
    }
    public function mahasiswa()
    {
        return view('main');
    }
    public function dosen()
    {
        return view('main');
    }
}
