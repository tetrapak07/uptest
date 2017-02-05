<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*(Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'HomeController@index');

Route::group(['middleware' => ['auth']], function () {
Route::resource('customer', 'CustomerController');
Route::resource('booking', 'BookingController');
Route::resource('cleaner', 'CleanerController');
Route::resource('city', 'CityController');
});
Auth::routes();



Route::get('register', function () {
        return view('errors.404');
});
