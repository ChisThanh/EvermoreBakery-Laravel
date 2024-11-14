<?php

use App\Http\Middleware\CheckVerifyEmail;
use App\Service\VnPayService;
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
    });

    Route::prefix('products')->group(function () {
        Route::get('/', 'ProductController@index')->name('products');
        Route::get('/{slug}', 'ProductController@show')->name('product.show');
        Route::get('/add-to-cart/{slug}', 'ProductController@addToCart');
        Route::get('/update-from-cart/{slug}/{quantity}', 'ProductController@updateFromCart');
    });
});

// Route::get('/vnpay', function () {
//     return view("clients.test");
// });
// Route::post('/vnpay', function () {
//     $inputs = request()->validate([
//         'amount' => 'required|numeric',
//         'bill_id' => 'required',
//     ]);
//     $vnpService = new VnPayService();
//     $url = $vnpService->vnpay($inputs);
//     return redirect()->to($url);
// });


// https://hotkicks.themealchemy.com/home/
require __DIR__ . '/auth.php';
