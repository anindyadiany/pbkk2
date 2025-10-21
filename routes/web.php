<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

// Application form routes
Route::get('/apply', [ApplicationController::class, 'create'])->name('apply');
Route::post('/apply', [ApplicationController::class, 'store'])->name('apply.store');


// Applications CRUD (public)
Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
Route::get('/applications/{application}', [ApplicationController::class, 'show'])->name('applications.show');
Route::get('/applications/{application}/edit', [ApplicationController::class, 'edit'])->name('applications.edit');
Route::put('/applications/{application}', [ApplicationController::class, 'update'])->name('applications.update');
Route::delete('/applications/{application}', [ApplicationController::class, 'destroy'])->name('applications.destroy');


// Home page
Route::get('/', [MemberController::class, 'index'])->name('home');

// Dashboard & Auth
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
