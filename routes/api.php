<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/login', 'LoginController')->name('login');
Route::post('/register', 'RegisterController')->name('register');

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', 'LogoutController')->name('logout');

    Route::prefix('users')->group(function () {
        Route::get('', 'UserController@index')->name('get.users');
        Route::post('', 'UserController@store')->name('add.user');
        Route::get('{id}', 'UserController@show')->name('get.user');
        Route::post('{id}', 'UserController@update')->name('put.user');
        Route::delete('{id}', 'UserController@destroy')->name('del.user');
    });

    Route::prefix('booking-lists')->group(function () {
        Route::get('', 'BookingListController@index')->name('get.booking-lists');
        Route::post('', 'BookingListController@store')->name('add.booking-list');
        Route::get('{id}', 'BookingListController@show')->name('get.booking-list');
        Route::post('{id}', 'BookingListController@update')->name('put.booking-list');
        Route::delete('{id}', 'BookingListController@destroy')->name('del.booking-list');
    });
});