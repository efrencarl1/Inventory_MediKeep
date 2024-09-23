<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Staff_dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('staff/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('staff/home', [Staff_dashboard::class, 'home']);
    Route::get('staff/add', [Staff_dashboard::class, 'add']);
    Route::get('staff/list', [Staff_dashboard::class, 'list']);
});

require __DIR__.'/auth.php';
