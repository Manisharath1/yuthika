<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScholarController;
use App\Http\Controllers\StudentController;
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
Route::get('/scholar', [ScholarController::class, 'index'])->middleware(['auth', 'verified', 'admin'])->name('scholar');
// Route for displaying the form to create a new student
Route::get('/students/create', [StudentController::class, 'create'])->middleware(['auth', 'verified', 'admin'])->name('students.create');
// Route for storing the new student
Route::post('/students', [StudentController::class, 'store'])->middleware(['auth', 'verified', 'admin'])->name('students.store');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
