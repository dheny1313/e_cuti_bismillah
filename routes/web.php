<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\Admin\CutiController as admiCutiController;

use App\Http\Controllers\Pegawai\CutiController;
use App\Http\Controllers\Pegawai\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('cuti', admiCutiController::class);
    Route::resource('user-details', UserDetailController::class);
});


//prefix localhost:8000/pegawai
Route::middleware(['auth'])->prefix('pegawai')->name('pegawai.')->group(function () {
    Route::resource('cuti', CutiController::class);
    Route::get('dashboard', [DashboardController::class, 'index'])->name('pegawai.dashboard');
});


require __DIR__ . '/auth.php';
