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

Route::group(array('namespace'=>'Digitus\Home\Controllers'), function()
{
	Route::get('/', ['uses'=>'HomeController@index', 'as'=>'home']);
});

Route::get('ons-bureau', 'PagesController@index');

Route::get('cases', 'PagesController@index');

Route::get('workshops', 'PagesController@index');

Route::get('insides', 'PagesController@index');

Route::get('kennismaken', 'PagesController@index');

Route::group(array('namespace'=>'Digitus\Blog\Controllers'), function()
{
	Route::resource('blog','BlogController', array('only' => array('index','show')));
	Route::delete('blog/{slug}', ['uses'=>'BlogController@destroy','as'=>'delete.post']);
});


Route::group(array('namespace'=>'Digitus\Auth\Controllers'), function()
{
	Route::get('login', 'LoginController@index');
	Route::post('login', 'LoginController@login');
	Route::get('logout', 'LogoutController@logout');
	Route::get('register', 'RegisterController@index');
	Route::post('register', 'RegisterController@store');
});

// Route::group(array('as'=>'login'), function()
// {
// 	Route::get('login', 'HomeController@getLogin');
// 	Route::post('login', 'HomeController@postLogin');
// });

// Route::get('blog', 'BlogController@getBlog');
// Route::delete('blog/{slug}', array('do'=>function($slug){
// 	$delete_post = Post::with('user')->find($slug);
// 	$delete_post -> delete();
// 	return Redirect::to('blog');
// }));
// Route::delete('blog/{post_slug}', array('as'=>'delete.post.slug', 'uses'=>'BlogController@destroyPost'));
// Route::get('blog/{post_slug}', 'BlogController@getBlogPost');

Route::group(array('prefix'=>'admin'), function(){
	Route::group(array('namespace'=>'Digitus\Admin\Controllers'), function()
	{
		Route::resource('', 'AdminController');
	});
	Route::group(array('namespace'=>'Digitus\Blog\Controllers'), function()
	{
		Route::get('blog/create', 'BlogController@getBlogForm');
		Route::post('blog/create', 'BlogController@newPost');
		Route::get('blogposts', 'BlogController@admin');
		Route::get('blog/{slug}/edit', ['uses'=>'BlogController@editPost','as'=>'edit.post']);
		Route::post('blog/{slug}/edit', ['uses'=>'BlogController@updatePost','as'=>'update.post']);
		Route::get('blog/tag/create', 'BlogController@getTag');
		Route::post('blog/tag/create', 'BlogController@postTag');
	});
});

Route::group(array('namespace'=>'Digitus\Profile\Controllers'), function(){

	// Route::resource('profile', 'ProfileController', array('only'=>array('show','edit', 'update')));
	Route::get('user/{username}/profile', ['uses'=>'ProfileController@show', 'as'=>'user.profile']);
	Route::get('user/{username}/profile/edit', ['uses'=>'ProfileController@edit', 'as'=>'user.profile.edit']);
	Route::post('user/{username}/profile/edit', ['uses'=>'ProfileController@update', 'as'=>'user.profile.postedit']);
	Route::get('user/{username}/dashboard', ['uses'=>'ProfileController@dashboard', 'as'=>'user.dashboard']);
	
});

Route::group(array('namespace'=>'Digitus\Upload\Controllers'), function()
{
	Route::get('user/{username}/picture', ['uses'=>'UploadController@index','as'=>'picture.index']);
	Route::post('user/{username}/picture', ['uses'=>'UploadController@update', 'as'=>'picture.store']);
});

// Route::group(array('prefix'=>'admin','before'=>'Sentry|inGroup:Admin'), function()
// {
// 	Route::get('/', array(
// 		'as'=>'blogpost.add',
// 		'before'=>'hasAccess:blogpost.add',
// 		'uses'=>'AdminController@index'
// 	));
// });

Route::group(array('namespace'=>'Digitus\Tag\Controllers'), function()
{
	Route::get('tags/{name}', 'TagController@getThisTag');
	Route::get('tags', 'TagController@getTags');
});

Route::group(array('namespace'=>'Digitus\Categorie\Controllers'), function()
{
	Route::get('categories/{name}', 'CategorieController@getThisCategorie');
	Route::get('categories', 'CategorieController@getCategories');
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