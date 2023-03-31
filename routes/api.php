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

    Route::prefix('cities')->group(function () {
        Route::get('', 'CityController@index')->name('get.cities');
        Route::post('', 'CityController@store')->name('add.city');
        Route::get('{id}', 'CityController@show')->name('get.city');
        Route::post('{id}', 'CityController@update')->name('put.city');
        Route::delete('{id}', 'CityController@destroy')->name('del.city');
    });

    Route::prefix('contact-types')->group(function () {
        Route::get('', 'ContactTypeController@index')->name('get.contact-types');
        Route::post('', 'ContactTypeController@store')->name('add.contact-type');
        Route::get('{id}', 'ContactTypeController@show')->name('get.contact-type');
        Route::post('{id}', 'ContactTypeController@update')->name('put.contact-type');
        Route::delete('{id}', 'ContactTypeController@destroy')->name('del.contact-type');
    });

    Route::prefix('locations')->group(function () {
        Route::get('', 'LocationController@index')->name('get.locations');
        Route::post('', 'LocationController@store')->name('add.location');
        Route::get('{id}', 'LocationController@show')->name('get.location');
        Route::post('{id}', 'LocationController@update')->name('put.location');
        Route::delete('{id}', 'LocationController@destroy')->name('del.location');
    });

    Route::prefix('medical-records')->group(function () {
        Route::get('', 'MedicalRecordController@index')->name('get.medical-records');
        Route::post('', 'MedicalRecordController@store')->name('add.medical-record');
        Route::get('{id}', 'MedicalRecordController@show')->name('get.medical-record');
        Route::post('{id}', 'MedicalRecordController@update')->name('put.medical-record');
        Route::delete('{id}', 'MedicalRecordController@destroy')->name('del.medical-record');
    });

    Route::prefix('patients')->group(function () {
        Route::get('', 'PatientController@index')->name('get.patients');
        Route::post('', 'PatientController@store')->name('add.patient');
        Route::get('{id}', 'PatientController@show')->name('get.patient');
        Route::post('{id}', 'PatientController@update')->name('put.patient');
        Route::delete('{id}', 'PatientController@destroy')->name('del.patient');
    });

    Route::prefix('payment-histories')->group(function () {
        Route::get('', 'PaymentHistoryController@index')->name('get.payment-histories');
        Route::post('', 'PaymentHistoryController@store')->name('add.payment-history');
        Route::get('{id}', 'PaymentHistoryController@show')->name('get.payment-history');
        Route::post('{id}', 'PaymentHistoryController@update')->name('put.payment-history');
        Route::delete('{id}', 'PaymentHistoryController@destroy')->name('del.payment-history');
    });

    Route::prefix('payments')->group(function () {
        Route::get('', 'PaymentController@index')->name('get.payments');
        Route::post('', 'PaymentController@store')->name('add.payment');
        Route::get('{id}', 'PaymentController@show')->name('get.payment');
        Route::post('{id}', 'PaymentController@update')->name('put.payment');
        Route::delete('{id}', 'PaymentController@destroy')->name('del.payment');
    });

    Route::prefix('provinces')->group(function () {
        Route::get('', 'ProvinceController@index')->name('get.provinces');
        Route::post('', 'ProvinceController@store')->name('add.province');
        Route::get('{id}', 'ProvinceController@show')->name('get.province');
        Route::post('{id}', 'ProvinceController@update')->name('put.province');
        Route::delete('{id}', 'ProvinceController@destroy')->name('del.province');
    });

    Route::prefix('rates')->group(function () {
        Route::get('', 'RateController@index')->name('get.rates');
        Route::post('', 'RateController@store')->name('add.rate');
        Route::get('{id}', 'RateController@show')->name('get.rate');
        Route::post('{id}', 'RateController@update')->name('put.rate');
        Route::delete('{id}', 'RateController@destroy')->name('del.rate');
    });

    Route::prefix('user-contacts')->group(function () {
        Route::get('', 'UserContactController@index')->name('get.user-contacts');
        Route::post('', 'UserContactController@store')->name('add.user-contact');
        Route::get('{id}', 'UserContactController@show')->name('get.user-contact');
        Route::post('{id}', 'UserContactController@update')->name('put.user-contact');
        Route::delete('{id}', 'UserContactController@destroy')->name('del.user-contact');
    });

    Route::prefix('user-levels')->group(function () {
        Route::get('', 'UserLevelController@index')->name('get.user-levels');
        Route::post('', 'UserLevelController@store')->name('add.user-level');
        Route::get('{id}', 'UserLevelController@show')->name('get.user-level');
        Route::post('{id}', 'UserLevelController@update')->name('put.user-level');
        Route::delete('{id}', 'UserLevelController@destroy')->name('del.user-level');
    });
});
