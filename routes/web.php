<?php

use App\Http\Controllers\Client\KeywordController;
use App\Http\Controllers\Client\ProfileController;
use App\Models\Product;
use App\Service\GeminiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('clients.home');
})->name('home');

Route::get('/products', function () {
    return view('clients.products');
})->name('products');

Route::get('/test', function (Request $request) {
        return view("clients.home");
});


require __DIR__ . '/auth.php';
