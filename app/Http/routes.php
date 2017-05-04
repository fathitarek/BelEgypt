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
    return view('welcome');
});

Route::auth();
Route::get('/kiri/en','inquiryFrontController@create');
Route::get('/kiri/ar','inquiryFrontController@create_ar');

Route::get('/lavashkiri/en','inquiryFrontController@create_lav');
Route::get('/lavashkiri/ar','inquiryFrontController@create_ar_lav');

Route::post('/thanks', 'inquiryFrontController@store');
Route::get('/home', 'HomeController@index');
Route::resource('/brand', 'brandController');


Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('brands', 'brandController');

Route::resource('settings', 'settingsController');
Route::get('export', 'inquiryController@export');
Route::resource('inquiries', 'inquiryController');
