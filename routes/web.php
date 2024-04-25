<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserAkses;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware(['guest'])->group(function(){
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'login']);
});

Route::get('/home', function(){
    if (auth()->check()) {
        if (auth()->user()->role === 'admin') {
            return redirect('/pages/admin/dashboard');
        } elseif (auth()->user()->role === 'mahasiswa') {
            return redirect('/pages/mahasiswa/dashboard');
        } elseif (auth()->user()->role === 'dosen') {
            return redirect('/pages/dosen/dashboard');
        }
    }
    return redirect('/login');
});

Route::middleware(['auth'])->group(function(){
// Route::get('/main', [SessionController::class, 'index']);
Route::get('/pages/admin/dashboard', [AdminController::class, 'index'])->middleware('userAkses:admin');
Route::get('/pages/admin/dosen', [AdminController::class, 'dosen'])->middleware('userAkses:admin');
Route::get('/pages/admin/program', [AdminController::class, 'program'])->name('admin.program')->middleware('userAkses:admin');
Route::post('/pages/admin/program', [AdminController::class, 'programstore'])->name('program.create')->middleware('userAkses:admin');
Route::post('/pages/admin/program/{id}', [AdminController::class, 'programedit'])->name('program.edit')->middleware('userAkses:admin');

Route::get('/pages/admin/matakuliah', [AdminController::class, 'matakuliah'])->name('admin.matakuliah')->middleware('userAkses:admin');

Route::get('/pages/admin/jadwal', [AdminController::class, 'jadwalkuliah'])->name('admin.jadwalkuliah')->middleware('userAkses:admin');


Route::get('/pages/mahasiswa/dashboard', [MahasiswaController::class, 'index'])->middleware('userAkses:mahasiswa');
Route::get('/pages/mahasiswa/matakuliah', [MahasiswaController::class, 'matakuliah'])->middleware('userAkses:mahasiswa');


Route::get('/pages/dosen/dashboard', [DosenController::class, 'index'])->middleware('userAkses:dosen');
Route::get('/pages/dosen/matakuliah', [DosenController::class, 'matakuliah'])->middleware('userAkses:dosen');
Route::get('/logout', [LoginController::class, 'logout']);


});
