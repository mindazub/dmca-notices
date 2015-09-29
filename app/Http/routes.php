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

Route::get('/', 'NoticesController@index');



/**
 * Notices
 */
Route::get('notices/confirm', 'NoticesController@confirm');
Route::resource('notices', 'NoticesController');


// Authentication routes...
// Route::get('auth/login', 'Auth\AuthController@getLogin');
// Route::post('auth/login', 'Auth\AuthController@postLogin');
// Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
// 
// Route::get('auth/register', 'Auth\AuthController@getRegister');
// Route::get('auth/register2', function(){
// 	return view('auth/register2');
// });
// Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::controllers([
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController',
	]);