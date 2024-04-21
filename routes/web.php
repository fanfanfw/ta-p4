<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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
Route::get('/main', [AdminController::class, 'index']);
Route::get('/main/admin', [AdminController::class, 'admin']);
Route::get('/main/mahasiswa', [AdminController::class, 'mahasiswa']);
Route::get('/main/dosen', [AdminController::class, 'dosen']);
Route::get('/logout', [LoginController::class, 'logout']);
});