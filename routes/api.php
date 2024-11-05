<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'App\Http\Controllers\API',
    'prefix' => 'v1'
], function () {

    Route::prefix('auth')->group(function () {
        Route::post('login', 'AuthApiController@login');
        Route::post('register', 'AuthApiController@register');

        Route::middleware('auth:sanctum')->group(function () {
            Route::post('logout', 'AuthApiController@logout');
            Route::post('refresh', 'AuthApiController@refresh');
            Route::post('me', 'AuthApiController@me');
        });
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('/products', 'ProductApiController');
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/products/{slug}/like', 'ProductApiController@likeProduct');
        Route::post('/coupons/{code}', 'ProductApiController@getCoupons');
    });
});
