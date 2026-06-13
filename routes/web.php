<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JemaatController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});


Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('jemaat', JemaatController::class);
    Route::resource('cabang', CabangController::class);
    Route::resource('settings', SettingsController::class);
});

require __DIR__.'/auth.php';