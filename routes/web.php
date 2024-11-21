<?php

use App\Http\Middleware\CheckVerifyEmail;
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'App\Http\Controllers\Client',
    'middleware' => [CheckVerifyEmail::class],
], function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index');
    Route::get('/about', 'HomeController@about')->name('about');
    Route::get('/blog', 'HomeController@blog')->name('blog');
    Route::get('/contact', 'HomeController@contact')->name('contact');
    Route::get('/cart', 'ProductController@cart')->name('cart');
    Route::middleware('auth')->group(function () {
        Route::get('/checkout', 'ProductController@checkout');
        Route::post('/checkout', 'ProductController@HandleCheckout');
        Route::get('/checkout/vnpay/callback', 'ProductController@CheckoutCallback')
            ->name('checkout.callback');
        Route::get('/profile', 'ProfileController@index')->name('profile');
        Route::post('/profile', 'ProfileController@update')->name('profile.update');

        Route::post('/products/review/{slug}', 'ProductController@reviewProduct')->name('profile.update');
    });

    Route::prefix('products')->group(function () {
        Route::get('/', 'ProductController@index')->name('products');
        Route::get('/{slug}', 'ProductController@show')->name('product.show');
        Route::get('/buy-now/{slug}', 'ProductController@buyNow');
        Route::get('/add-to-cart/{slug}', 'ProductController@addToCart');
        Route::get('/update-from-cart/{slug}/{quantity}', 'ProductController@updateFromCart');
    });
});

// https://hotkicks.themealchemy.com/home/
require __DIR__ . '/auth.php';
