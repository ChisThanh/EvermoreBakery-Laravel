<?php

use App\Http\Controllers\Client\KeywordController;
use App\Http\Controllers\Client\ProfileController;
use App\Models\Product;
use App\Service\GeminiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'App\Http\Controllers\Client',
], function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index');
    Route::get('/about', 'HomeController@about')->name('about');
    Route::get('/blog', 'HomeController@blog')->name('blog');
    Route::get('/contact', 'HomeController@contact')->name('contact');
    Route::get('/checkout', 'HomeController@checkout')->name('checkout');
    Route::get('/cart', 'HomeController@cart')->name('cart');

    Route::prefix('products')->group(function () {
        Route::get('/', 'ProductController@index')->name('products');
        Route::get('/{id}', 'ProductController@show')->name('product.show');
    });
});



// https://hotkicks.themealchemy.com/home/
require __DIR__ . '/auth.php';
