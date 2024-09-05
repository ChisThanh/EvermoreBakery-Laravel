<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

// Route::resource('users', UserController::class);

// Route::resources([
//     'photos' => PhotoController::class,
//     'posts' => PostController::class,
// ]);
// Chỉ định các route cụ thể:
// Route::resource('users', UserController::class)->only([
//     'index', 'show', 'store'
// ]);

// Loại bỏ các route cụ thể:
// Route::resource('users', UserController::class)->except([
//     'create', 'edit'
// ]);

require __DIR__.'/auth.php';
