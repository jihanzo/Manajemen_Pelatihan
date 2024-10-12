<?php

use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesertaController;


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

// Route::get('/', function () {
//     return view('welcome');
Route::get('/', function () {
    return view('dashboard',[
    "title"=>"Dashboard"
    ]);

});
    Route::resource('peserta',PesertaController::class);
    // Route::get('/peserta/create', [PesertaController::class, 'create'])->name('peserta.create');
    // Route::get('/peserta/{id}/edit', [PesertaController::class, 'edit'])->name('peserta.edit');
    // Route::get('/peserta/{id}/show', [PesertaController::class, 'show'])->name('peserta.show');
    // Route::put('/peserta/{id}/update', [PesertaController::class, 'update'])->name('peserta.update');


    Route::resource('pelatihan',PelatihanController::class);
    Route::resource('pengguna',UserController::class)->except('destroy','create','show','update','edit');