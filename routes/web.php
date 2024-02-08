<?php

use App\Http\Controllers\Back\BeasiswaController;
use App\Http\Controllers\Back\RoleController;
use App\Http\Controllers\Back\SiswaController;
use App\Http\Controllers\Back\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/pendaftaran', function () {
    return view('pendaftaran');
})->name('pendaftaran');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::post('/beasiswa/approve/{id}', [BeasiswaController::class, 'approve'])->name('beasiswa.approve');
Route::post('/beasiswa/reject/{id}', [BeasiswaController::class, 'reject'])->name('beasiswa.reject');
Route::resource('beasiswa', BeasiswaController::class);
Route::resource('role', RoleController::class);
Route::resource('manage-user', UserController::class);
Route::resource('siswa', SiswaController::class);
