<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ContactUsController;

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

Route::get('/', function () {
    echo "Halaman Home";
});

Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'kategori'])->name('product');
    Route::get('/makanan', [ProductController::class,'makanan']);
    Route::get('/minuman', [ProductController::class,'minuman']);
});

Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'berita'])->name('news');
    Route::get('/{judul}', [NewsController::class,'detail']);
});

Route::prefix('program')->group(function () {
    Route::get('/', [ProgramController::class, 'program'])->name('program');
    Route::get('/karir', [ProgramController::class,'karir']);
    Route::get('/magang', [ProgramController::class,'magang']);
});

Route::get('/about-us', function () {
    echo "Nama: Hilmi Mughid <br>";
    echo "NIM: 2141720081";
});

Route::resource('contact-us', ContactUsController::class)->names(['index' => 'contact-us'
]);
