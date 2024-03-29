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

Route::get('/', 'GuestController@index');
Route::get('/list/{name}', 'GuestController@wishList');

Route::get('admin', ['as' => 'admin', 'uses' => 'AdminController@index']);

Route::get('test', 'GuestController@test');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
