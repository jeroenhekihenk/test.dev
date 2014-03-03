<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@getHome');

Route::resource('admin', 'HomeController');

Route::get('login', 'AuthController@getLogin');
Route::post('users/signin', 'AuthController@postLogin');

Route::get('logout', 'AuthController@getLogout');

Route::get('register', 'AuthController@getRegister');
Route::post('users/signup', 'AuthController@postRegister');