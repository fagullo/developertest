<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Route::auth();

Route::get('/home/guest', [
    'middleware' => 'guest',
    'uses' => 'HomeController@guest',
]);
Route::get('/home', [
    'middleware' => 'auth',
    'uses' => 'HomeController@index',
]);

Route::group([
    'middleware' => 'auth',
    'prefix' => 'user',
    'as' => 'user.',
], function () {
    Route::get('/edit', [
        'as' => 'edit',
        'uses' => 'UserController@edit',
    ]);

    Route::get('/wishlist', [
        'as' => 'wishlist',
        'uses' => 'UserController@wishlist',
    ]);

    Route::post('/update', [
        'as' => 'update',
        'uses' => 'UserController@update',
    ]);
});


Route::group([
    'middleware' => 'auth',
    'prefix' => 'product',
    'as' => 'product.',
], function () {
    Route::post('add-to-wishlist/{productId}', [
        'as' => 'add-to-wishlist',
        'uses' => 'ProductController@addToWishlist',
    ]);

    Route::post('remove-from-wishlist/{productId}', [
        'as' => 'remove-from-wishlist',
        'uses' => 'ProductController@removeFromWishlist',
    ]);

    Route::get('show/{productId}', [
        'as' => 'show',
        'uses' => 'ProductController@show',
    ]);
});
