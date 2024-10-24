<?php

use App\Http\Controllers\Client\KeywordController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
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

Route::prefix('kw')->group(function () {
    Route::get('/search', [KeywordController::class, 'search'])->name('kw.search');
    Route::get('/generate', [KeywordController::class, 'generate'])->name('kw.generate');
});

require __DIR__ . '/auth.php';
