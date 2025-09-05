<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\propertiController;
use App\Http\Controllers\klienController;
use App\Http\Controllers\pemasukanController;
use App\Http\Controllers\staffController;
use App\Http\Controllers\authController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\cicilanController;
use App\Http\Middleware\SessionTimeout;
use App\Http\Middleware\CheckJabatan;

Route::get('/', [authController::class, 'showLoginForm'])->name('login');
Route::post('/login', [authController::class, 'login'])->name('auth.login');
Route::get('/logout', [authController::class, 'logout'])->name('logout');

Route::middleware(['auth', SessionTimeout::class])->group(function() {
    
    Route::get('home', [homeController::class, 'home'])->name('home');

    Route::get('pemasukan', [pemasukanController::class, 'pemasukan_list'])->name('pemasukan_list');
    Route::get('transaksi', [pemasukanController::class, 'transaksi'])->name('transaksi');
    Route::post('transaksi/store', [pemasukanController::class, 'transaksi_store'])->name('transaksi_store');
    Route::get('pemasukan/show/{id_pemasukan}', [pemasukanController::class, 'pemasukan_show'])->name('pemasukan_show');
    Route::get('cicilan/', [cicilanController::class, 'cicilan'])->name('cicilan');
    Route::post('cicilan/{id_pemasukan}', [cicilanController::class, 'cicilan_store'])->name('cicilan_store');

    Route::get('klien', [klienController::class, 'klien_list'])->name('klien_list');
    Route::get('klien/new', [klienController::class, 'klien_new'])->name('klien_new');
    Route::post('klien/store', [klienController::class, 'klien_store'])->name('klien_store');
    Route::get('klien/show/{id_klien}', [klienController::class, 'klien_show'])->name('klien_show');
    Route::get('klien/edit/{id_klien}', [klienController::class, 'klien_edit'])->name('klien_edit');
    Route::put('klien/update/{id_klien}', [klienController::class, 'klien_update'])->name('klien_update');
    Route::delete('klien/delete/{id_klien}', [klienController::class, 'klien_destroy'])->name('klien_destroy');

    Route::get('properti', [propertiController::class, 'properti_list'])->name('properti_list');
    Route::get('properti/new', [propertiController::class, 'properti_new'])->name('properti_new');
    Route::post('properti/store', [propertiController::class, 'properti_store'])->name('properti_store');
    Route::get('properti/show/{id_properti}', [propertiController::class, 'properti_show'])->name('properti_show');
    Route::get('properti/edit/{id_properti}', [propertiController::class, 'properti_edit'])->name('properti_edit');
    Route::put('properti/update/{id_properti}', [propertiController::class, 'properti_update'])->name('properti_update');
    Route::delete('properti/delete/{id_properti}', [propertiController::class, 'properti_destroy'])->name('properti_destroy');
    
    Route::middleware([CheckJabatan::class])->group(function() {
        Route::get('staff', [staffController::class, 'staff_list'])->name('staff_list');
        Route::get('staff/new', [staffController::class, 'staff_new'])->name('staff_new');
        Route::post('staff/store', [staffController::class, 'staff_store'])->name('staff_store');
        Route::get('staff/show/{id}', [staffController::class, 'staff_show'])->name('staff_show');
        Route::get('staff/edit/{id}', [staffController::class, 'staff_edit'])->name('staff_edit');
        Route::put('staff/update/{id}', [staffController::class, 'staff_update'])->name('staff_update');
        Route::delete('staff/delete/{id}', [staffController::class, 'staff_destroy'])->name('staff_destroy');
        
        Route::delete('pemasukan/delete/{id_pemasukan}', [pemasukanController::class, 'pemasukan_destroy'])->name('pemasukan_destroy');
    });
});

Route::fallback(function () {return redirect()->back()->with('error', 'Halaman tidak tersedia.');});
