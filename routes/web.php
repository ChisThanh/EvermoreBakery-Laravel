<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('users', UserController::class);

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


