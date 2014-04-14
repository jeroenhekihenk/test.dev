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

Route::group(array('namespace'=>'Digitus\Pages\Controllers'), function()
{

	
	Route::get('/', ['uses'=>'HomeController@index', 'as'=>'home.index']);

	Route::get('ons-bureau', ['uses'=>'BureauController@index','as'=>'bureau.index']);

	Route::get('cases', ['uses'=>'CasesController@index','as'=>'cases.index']);

	Route::get('workshops', ['uses'=>'WorkshopsController@index','as'=>'workshops.index']);

	Route::get('insides', ['uses'=>'InsidesController@index','as'=>'insides.index']);

	Route::get('kennismaken', ['uses'=>'KennismakenController@index','as'=>'kennismaken.index']);
});

Route::group(array('namespace'=>'Digitus\Insides\Controllers'), function()
{
	Route::resource('insides','InsidesController');
	Route::delete('insides/{slug}', ['uses'=>'InsidesController@destroy','as'=>'delete.post']);
});



Route::group(array('namespace'=>'Digitus\Auth\Controllers'), function()
{
	Route::get('in/loggen', ['uses'=>'UserController@getLogin','as'=>'login']);
	Route::post('in/loggen', ['uses'=>'UserController@postLogin','as'=>'post.login']);
	Route::get('logout', ['uses'=>'UserController@getLogout', 'as'=>'logout']);
	// Route::get('register', ['uses'=>'UserController@getRegister','as'=>'register']);
	// Route::post('register', ['uses'=>'UserController@postRegister', 'as'=>'post.register']);
});


Route::group(array('prefix'=>'admin', 'namespace'=>'Digitus\Admin\Controllers','before'=>'guest'), function(){
	
		Route::get('/', ['uses'=>'AdminController@index','as'=>'admin.index']);
		// (index)get overview, (create,store)create admin, (show)show admin, (edit,update)update admin, (destroy)delete admin
		Route::resource('pages', 'AdminPageController',
			array('names'=>
				array(
					'index'=>'admin.pages.index',
					'create'=>'admin.pages.create',
					'store'=>'admin.pages.store',
					'show'=>'admin.pages.show',
					'edit'=>'admin.pages.edit',
					'update'=>'admin.pages.update',
					'destroy'=>'admin.pages.destroy'
				)
			)
		);

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

		Route::resource('blog/tag', 'AdminBlogTagController',
			array('names' =>
				array(
					'oldtag'=>'admin.blog.tag.addold',
					'newtag'=>'admin.blog.tag.addnew'
				)
			)
		);

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

	Route::get('user/{username}/social', ['uses'=>'ProfileSocialMediaController@show','as'=>'this.user.social.show']);
	Route::post('user/{username}/social', ['uses'=>'ProfileSocialMediaController@update','as'=>'this.user.social.update']);

});

Route::group(array('namespace'=>'Digitus\Upload\Controllers'), function()
{
	Route::get('user/{username}/picture', ['uses'=>'UploadController@index','as'=>'picture.index']);
	Route::post('user/{username}/picture', ['uses'=>'UploadController@update', 'as'=>'picture.store']);
});

Route::group(array('namespace'=>'Digitus\Insides\Controllers'), function()
{
	Route::resource('insides', 'InsidesController', array(
		'names'=>array(
			'index'=>'insides.index',
			'show'=>'insides.show'
			)
		)
	);
});
Route::group(array('namespace'=>'Digitus\Comments\Controllers'), function()
{

	Route::post('insides/{slug}', ['uses'=>'CommentsController@store','as'=>'comment.create']);
	Route::get('comment/{id}', ['uses'=>'CommentsController@show','as'=>'comment.show']);
	Route::get('comment/{id}/edit', ['uses'=>'CommentsController@edit', 'as'=>'comment.edit']);
	Route::put('comment/{id}', ['uses'=>'CommentsController@update','as'=>'comment.update']);
	Route::delete('comment/{id}', ['uses'=>'CommentsController@destroy','as'=>'comment.destroy']);
	Route::get('comment', function(){ return Redirect::route('home.index'); });
});

Route::group(array('namespace'=>'Digitus\Tag\Controllers'), function()
{
	Route::get('tags/{name}', ['uses'=>'TagController@getThisTag','as'=>'tags.show']);
	Route::get('tags', ['uses'=>'TagController@getTags','as'=>'tags.index']);
});

Route::group(array('namespace'=>'Digitus\Categorie\Controllers'), function()
{
	Route::get('categories/{name}', ['uses'=>'CategorieController@getThisCategorie','as'=>'categories.show']);
	Route::get('categories', ['uses'=>'CategorieController@getCategories','as'=>'categories.index']);
});

Route::group(array('namespace'=>'Digitus\Pages\Controllers'), function()
{
	Route::get('/{slug}', ['uses'=>'PageController@show','as'=>'show.page']);
});