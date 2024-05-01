<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\InputJadwalController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\DatadosenController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JamController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\RuanganController;
use Illuminate\Support\Facades\Route;

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
// Route::get('/welcome', function () {
//     return view('welcome');
// });


Route::middleware(['guest'])->group(function(){
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'login']);
});

Route::get('/home', function(){
    if (auth()->check()) {
        if (auth()->user()->role === 'admin') {
            return redirect('/dashboard');
        } elseif (auth()->user()->role === 'mahasiswa') {
            return redirect('/mahasiswa/dashboard');
        } elseif (auth()->user()->role === 'dosen') {
            return redirect('/dosen/dashboard');
        }
    }
    return redirect('/login');
});

Route::middleware(['auth'])->group(function(){
// Route::get('/main', [SessionController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'index'])->middleware('userAkses:admin');


Route::resource('user', UserController::class)->only(['index', 'store', 'update', 'destroy'])->middleware('userAkses:admin');
Route::resource('program', ProgramController::class)->only(['index', 'store', 'update', 'destroy'])->middleware('userAkses:admin');
Route::resource('data-dosen', DatadosenController::class)->only(['index', 'store', 'update', 'destroy'])->middleware('userAkses:admin');
Route::resource('ruangan', RuanganController::class)->only(['index', 'store', 'update', 'destroy'])->middleware('userAkses:admin');
Route::resource('kelas', KelasController::class)->only(['index', 'store', 'update', 'destroy'])->middleware('userAkses:admin');
Route::resource('matakuliah', MatakuliahController::class)->only(['index', 'store', 'update', 'destroy'])->middleware('userAkses:admin');
Route::resource('jadwal', JadwalController::class)->only(['index', 'store', 'update', 'destroy'])->middleware('userAkses:admin');
Route::resource('kelas', KelasController::class)->only(['index', 'store', 'update', 'destroy'])->middleware('userAkses:admin');
Route::resource('jam', JamController::class)->only(['index', 'store', 'update', 'destroy'])->middleware('userAkses:admin');
Route::resource('input-jadwal', InputJadwalController::class)->only(['index', 'store', 'update', 'destroy'])->middleware('userAkses:admin');




Route::get('/pages/admin/jadwal', [AdminController::class, 'jadwalkuliah'])->name('admin.jadwalkuliah')->middleware('userAkses:admin');


Route::get('/mahasiswa/dashboard', [MahasiswaController::class, 'index'])->middleware('userAkses:mahasiswa');
Route::get('/mahasiswa/matakuliah', [MahasiswaController::class, 'matakuliah'])->middleware('userAkses:mahasiswa');


Route::get('/pages/dosen/dashboard', [DosenController::class, 'index'])->middleware('userAkses:dosen');
Route::get('/pages/dosen/matakuliah', [DosenController::class, 'matakuliah'])->middleware('userAkses:dosen');
Route::get('/logout', [LoginController::class, 'logout']);


});
