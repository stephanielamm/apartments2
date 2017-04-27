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
    return view('app');
});

// Style Guide Route
Route::get('/styleguide', function () {
    return view('style');
});

// API Routes
Route::get('/apartments', 'ApartmentController@index');
Route::post('/apartments', 'ApartmentController@create');
Route::get('/apartments/{id}', 'ApartmentController@show');
Route::put('/apartments/{id}', 'ApartmentController@update');
Route::delete('/apartments/{id}', 'ApartmentController@destroy');
