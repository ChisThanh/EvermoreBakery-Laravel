<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'App\Http\Controllers\API',
    'prefix' => 'v1'
], function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('/products', 'ProductApiController');
        Route::post('/products/{slug}/like', 'ProductApiController@likeProduct');
        Route::post('/coupons/{code}', 'ProductApiController@getCoupons');
        Route::post('/chat', 'ChatApiController@broadcast');
        Route::get('/chat/{chatId}', 'ChatApiController@getHistory');
    });

    Route::post('/update-from-cart/{slug}/{quantity}', 'ProductApiController@updateFromCart');
    Route::get('/recommend-keywords/{query}', 'ProductApiController@recommendKeywords');
    Route::get('/recommend-products', 'ProductApiController@recommendProducts');
});
