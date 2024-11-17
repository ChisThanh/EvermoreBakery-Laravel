<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\CRUD.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('product', 'ProductCrudController');
    Route::crud('category', 'CategoryCrudController');
    Route::crud('coupon', 'CouponCrudController');
    Route::crud('bill', 'BillCrudController');
    Route::get('bill/{id}/update-status/{status}', 'BillCrudController@updateStatus');
    Route::get('chat', 'ChatController@index');
    Route::post('chat/broadcast', 'ChatController@broadcast');
    Route::crud('event', 'EventCrudController');
    Route::get('event/add-product/{id}', 'EventCrudController@viewAddProduct');
    Route::post('event/add-product/{id}', 'EventCrudController@addProduct');
    Route::get('event/calculate-price/{id}', 'EventCrudController@calculatePriceSale');
});

/**
 * DO NOT ADD ANYTHING HERE.
 */
