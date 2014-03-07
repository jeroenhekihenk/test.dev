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

Route::get('blog', 'BlogController@getBlog');

Route::group(array('prefix'=>'admin', 'before'=>'auth'), function(){
	Route::get('', 'AdminController@index');
	Route::get('blog/create', 'BlogController@getBlogForm');
	Route::post('blog/create', 'BlogController@newPost');
	Route::get('blogposts', 'BlogController@admin');
	Route::delete('blog/(num)', array('do'=>function($id){
		$delete_post = Post::with('user')->find($id);
		$delete_post -> delete();
		return Redirect::to('blog');
	}));
});

Route::group(array('before'=>'auth'), function(){

	Route::get('logout', 'HomeController@logout');
	Route::get('profile/{username}', 'ProfileController@getIndex');
	
});

Route::filter('admin', function()
{
	if(!Sentry::check())
	{
		return Redirect::to('login');
	}
	if(Sentry::getUser()->hasAccess(array('Super Admin', 'Admin')))
	{
		return Redirect::to('admin');
	}

	if (!Sentry::getUser()->hasAccess(array('Super Admin', 'Admin')))
	{
		return Redirect::to('login');
	}

});


// App::missing(function($exception)
// {
// 	return Response::view('error', array(), 404);
// });