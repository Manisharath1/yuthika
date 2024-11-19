<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScholarController;
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

//Scholar Page
// Scholar page accessible only by admins

Route::get('/scholar/index', [ScholarController::class, 'index'])->middleware(['auth', 'verified', 'admin'])->name('scholar.index');

Route::middleware(['auth', 'admin'])->group(function () {

    Route::put('/students/{id}', [ScholarController::class, 'update']);
    Route::post('/scholar/create', [ScholarController::class, 'create'])->name('scholar.create');
    Route::get('/students/{id}', [ScholarController::class, 'show']);


});
Route::get('/scholar/personal', [ScholarController::class, 'personal'])->middleware(['auth', 'verified', 'admin'])->name('scholar.personal');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
