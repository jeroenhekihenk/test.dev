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
	Route::resource('blog','BlogController');
	Route::delete('blog/{slug}', ['uses'=>'BlogController@destroy','as'=>'delete.post']);
});


Route::group(array('namespace'=>'Digitus\Auth\Controllers'), function()
{
	Route::get('login', ['uses'=>'UserController@index','as'=>'login']);
	Route::post('login', 'UserController@postLogin');
	Route::get('logout', 'UserController@getLogout');
	Route::get('register', 'RegisterController@index');
	Route::post('register', 'RegisterController@store');
});


Route::group(array('prefix'=>'admin', 'namespace'=>'Digitus\Admin\Controllers'), function(){
	
		Route::get('/', array('uses'=>'AdminController@index', 'as'=>'admin.index')
		);
		// (index)get overview, (create,store)create admin, (show)show admin, (edit,update)update admin, (destroy)delete admin

		Route::resource('users', 'AdminUserController',
			array('names' =>
				array(
					'index'=>'admin.users.index',
					'create'=>'admin.users.create',
					'store'=>'admin.users.store',
					'show'=>'admin.users.show',
					'edit'=>'admin.users.edit',
					'update'=>'admin.users.update',
					'destroy'=>'admin.users.destroy'
				)
			)
		);
		// (index)get users, (create,store)create user, (edit,update)update user, (destroy)delete user

		Route::resource('register', 'AdminRegisterController',
			array('names' =>
				array(
					'index'=>'admin.register.index',
					'create'=>'admin.register.create',
					'store'=>'admin.register.store',
					'show'=>'admin.register.show',
					'edit'=>'admin.register.edit',
					'update'=>'admin.register.update',
					'destroy'=>'admin.register.destroy'
				)
			)
		);
		// (index)get register form, (create,store)register user
		Route::resource('blog', 'AdminBlogController',
			array('names' =>
				array(
					'index'=>'admin.blog.index',
					'create'=>'admin.blog.create',
					'store'=>'admin.blog.store',
					// 'show'=>'admin.blog.show',
					'edit'=>'admin.blog.edit',
					'update'=>'admin.blog.update',
					'destroy'=>'admin.blog.destroy'
				)
			)
		);
		// (index)Get all blogposts, (create,store)Create post, (edit)Update blogpost, (destroy)Delete post

		Route::resource('tag', 'AdminBlogTagController',
			array('names' =>
				array(
					'index'=>'admin.tag.index',
					'create'=>'admin.tag.create',
					'store'=>'admin.tag.store',
					'show'=>'admin.tag.show',
					'edit'=>'admin.tag.edit',
					'update'=>'admin.tag.update',
					'destroy'=>'admin.tag.destroy'
				)
			)
		);
		// (index)Get all tags, (create,store)Create tags, (update)update tags, (destroy)delete tags

		Route::resource('categorie', 'AdminBlogCategorieController',
			array('names' =>
				array(
					'index'=>'admin.categorie.index',
					'create'=>'admin.categorie.create',
					'store'=>'admin.categorie.store',
					'show'=>'admin.categorie.show',
					'edit'=>'admin.categorie.edit',
					'update'=>'admin.categorie.update',
					'destroy'=>'admin.categorie.destroy'
				)
			)
		);
		// (index)Get all categories, (create,store)Create categories, (update)update categories, (destroy)delete categories
	
});

Route::group(array('namespace'=>'Digitus\Profile\Controllers'), function()
{

	Route::resource('user/dashboard', 'UserProfileDashboardController',
		array(
			'names' => array(
				'index'=>'user.dashboard.index'
				)
			)
		);
	// (index)Latest activities

	Route::resource('user', 'UserProfileController',
			array('names' =>
				array(
					'index'=>'this.user.index',
					'create'=>'this.user.create',
					'store'=>'this.user.store',
					'show'=>'this.user.show',
					'edit'=>'this.user.edit',
					'update'=>'this.user.update',
					'destroy'=>'this.user.destroy'
				)
			)
		);
	// (index)show your profile info, (edit,update)Edit and update your profile 

});

Route::group(array('namespace'=>'Digitus\Upload\Controllers'), function()
{
	Route::get('user/{username}/picture', ['uses'=>'UploadController@index','as'=>'picture.index']);
	Route::post('user/{username}/picture', ['uses'=>'UploadController@update', 'as'=>'picture.store']);
});

Route::group(array('namespace'=>'Digitus\Blog\Controllers'), function()
{
	Route::resource('blog', 'BlogController', array(
		'names'=>array(
			'index'=>'blog.index',
			'show'=>'blog.show'
			)
		)
	);
});

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

// App::missing(function($exception)
// {
// 	return Response::view('error', array(), 404);
// });