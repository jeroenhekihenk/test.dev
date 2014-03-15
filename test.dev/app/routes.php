<?php
// \Carbon\Carbon::setToStringFormat('D d-m-Y \o\m\ H:i');
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

Route::get('ons-bureau', 'PagesController@getBureau');

Route::get('cases', 'PagesController@getCases');

Route::get('workshops', 'PagesController@getWorkshops');

Route::get('insides', 'PagesController@getInsides');

Route::get('kennismaken', 'PagesController@getKennismaken');




Route::get('register', 'HomeController@getRegister');
Route::post('register', 'HomeController@postRegister');

Route::get('login', 'HomeController@getLogin');
Route::post('login', 'HomeController@postLogin');

Route::get('blog', 'BlogController@getBlog');
// Route::delete('blog/{slug}', array('do'=>function($slug){
// 	$delete_post = Post::with('user')->find($slug);
// 	$delete_post -> delete();
// 	return Redirect::to('blog');
// }));
Route::delete('blog/{post_slug}', array('as'=>'delete.post.slug', 'uses'=>'BlogController@destroyPost'));
Route::get('blog/{post_slug}', 'BlogController@getBlogPost');

Route::group(array('prefix'=>'admin', 'before'=>'auth'), function(){
	Route::get('', 'AdminController@index');
	Route::get('blog/create', 'BlogController@getBlogForm');
	Route::post('blog/create', 'BlogController@newPost');
	Route::get('blogposts', 'BlogController@admin');
	Route::get('blog/tag/create', 'BlogController@getTag');
	Route::post('blog/tag/create', 'BlogController@postTag');
});

Route::group(array('before'=>'auth'), function(){

	Route::get('logout', 'HomeController@logout');
	Route::get('profile/{username}', 'ProfileController@getIndex');
	
});

Route::get('tags/{name}', 'TagController@getThisTag');
Route::get('tags', 'TagController@getTags');
Route::get('categories/{name}', 'CategorieController@getThisCategorie');
Route::get('categories', 'CategorieController@getCategories');

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