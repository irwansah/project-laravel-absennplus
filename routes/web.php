<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AttendancesController;
use App\Http\Controllers\CutiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/kehadiran', [AttendancesController::class, 'index'])->name('kehadiran');
    Route::post('/absen', [AttendancesController::class, 'absen'])->name('absen');

    Route::get('/cuti', [CutiController::class, 'index'])->name('cuti');
    Route::post('/cuti-submit', [CutiController::class, 'submit'])->name('cuti.submit');
});

require __DIR__.'/auth.php';
