<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', 'Auth\AuthAPIController@register');

Route::post('/login', 'Auth\AuthAPIController@login');

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/profile', function ($id) {
        return $request->user();
    });
    Route::post('/buku/store', 'BukuController@store');
});
Route::resource('buku', 'BukuController')->except('store');
