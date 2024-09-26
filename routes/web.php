<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Scholar
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'scholar'])->name('dashboard');

// Faculty
Route::get('/faculty/dashboard', function () {
    return view('faculty.dashboard');
})->middleware(['auth', 'verified', 'faculty'])->name('faculty.dashboard');

//Staff
Route::get('/staff/dashboard', function () {
    return view('staff.dashboard');
})->middleware(['auth', 'verified', 'staff'])->name('staff.dashboard');
//
//Admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified', 'admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
