<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SessionController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware(['guest'])->group(function(){
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'login']);
});

Route::get('/home', function(){
return redirect('/main');
});

Route::middleware(['auth'])->group(function(){
Route::get('/main', [SessionController::class, 'index']);
Route::get('/main/admin', [SessionController::class, 'admin'])->middleware('userAkses:admin');
Route::get('/main/mahasiswa', [SessionController::class, 'mahasiswa'])->middleware('userAkses:mahasiswa');
Route::get('/main/dosen', [SessionController::class, 'dosen'])->middleware('userAkses:dosen');
Route::get('/logout', [LoginController::class, 'logout']);
});
