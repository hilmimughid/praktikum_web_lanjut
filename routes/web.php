<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

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

Route::get('/', [MahasiswaController::class, 'index']);

Route::resource('mahasiswas', MahasiswaController::class);

Route::get('mahasiswas/{nim}/khs',[MahasiswaController::class,'showKhs'])->name('mahasiswas.nilai');

Route::get('/mahasiswas/{nim}/print_pdf',[MahasiswaController::class,'print_pdf'])->name('mahasiswas.print_pdf');
