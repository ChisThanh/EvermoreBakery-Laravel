<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'App\Http\Controllers\Client',
], function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index');
    Route::get('/about', 'HomeController@about')->name('about');
    Route::get('/blog', 'HomeController@blog')->name('blog');
    Route::get('/contact', 'HomeController@contact')->name('contact');
    Route::get('/checkout', 'ProductController@checkout')->middleware('auth');
    Route::post('/checkout', 'ProductController@HandleCheckout')->middleware('auth');
    Route::get('/cart', 'ProductController@cart')->name('cart');

    Route::prefix('products')->group(function () {
        Route::get('/', 'ProductController@index')->name('products');
        Route::get('/{slug}', 'ProductController@show')->name('product.show');
        Route::get('/add-to-cart/{slug}', 'ProductController@addToCart');
        Route::get('/update-from-cart/{slug}/{quantity}', 'ProductController@updateFromCart');

    });
});



// https://hotkicks.themealchemy.com/home/
require __DIR__ . '/auth.php';
