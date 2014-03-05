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

Route::get('/', 'HomeController@index');

Route::get('register', 'HomeController@getRegister');
Route::post('register', 'HomeController@postRegister');

Route::get('login', 'HomeController@getLogin');
Route::post('login', 'HomeController@postLogin');


Route::group(array('before'=>'auth'), function(){
	
	Route::get('admin', 'AdminController@index');
	Route::get('logout', 'HomeController@logout');

});

Route::group(array('before'=>'auth'), function(){

	Route::get('blog', 'BlogController@getBlog');
	Route::get('blog/create', 'BlogController@getBlogForm');
	Route::delete('blog/post/(:num)', array('do'=>function($id){
		$delete_post = Post::with('user')->find($id);
		$delete_post -> delete();
		return Redirect::to('blog');
	}));
	Route::post('blog/create', 'BlogController@newPost');
	Route::get('admin/blogposts', 'BlogController@admin');
});

