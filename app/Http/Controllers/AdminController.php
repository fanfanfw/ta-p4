<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('pages.admin.dashboard');
    }
    public function dosen(){
        return view ('pages.admin.dosen');
    }
    public function program(){
        return view ('pages.admin.program');
    }
}
