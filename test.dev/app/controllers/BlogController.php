<?php 

use post as Post;
use Illuminate\Support\Facades\View as View;

class BlogController extends BaseController {

	protected $posts;
	protected $view;
	protected $sentry;

	public function getBlog()
	{
		$posts = $this->posts->paginate(4);
		// $posts = Post::with('user')->orderBy('updated_at', 'desc')->paginate(4);
		return View::make('blog.index')->with('posts', $posts, 'user', Sentry::getUser());
		// return View::make('blog.index')->with('posts', $posts, 'user', Sentry::getUser());
	}
	public function getBlogPost($post_slug)
	{
		$currpost = Post::with('user')->where('post_slug', '=', $post_slug)->first();
		return View::make('blog.post')->with('post', $currpost, 'user', Sentry::getUser());
	}

	public function getBlogForm()
	{
		$user = Sentry::getUser();
		return View::make('admin.blog.create')->with('user', $user);
	}

		public function destroyPost($slug)
		{
		$post = Post::where('post_slug', $slug)->first();
		if ($post) {
			$post->delete();
			return Redirect::to('blog');
			}
		return 'There was a problem...';
		}

	public function newPost()
	{

		$new_post = array(
			'post_title'	=> Input::get('post_title'),
			'post_body'		=> Input::get('post_body'),
			'post_author'	=> Input::get('post_author'),
			'post_slug'		=> Str::slug(Input::get('post_title'))
		);

		$rules = array(
			'post_title'	=> 'required|min:3|max:255',
			'post_body'		=> 'required|min:10',
		);
		// $new_tags = array();
		// foreach(explode(',', Input::get('tags')) as $tag) {
		// $tag = Tag::firstOrCreate(array('name' => $tag));
		// array_push($new_tags, $tag);
		// }
		// $post->tags()->sync($new_tags); 
		

		$validation = Validator::make($new_post, $rules);
		if ( $validation->fails() )
		{
			return Redirect::to('admin/blog/create')->with('user', $loggedUser)->withErrors($validation)->with_input();
		}

		$post = new Post($new_post);
		$post->save(); 

		return Redirect::to('blog');
	}

	public function admin()
	{
		$posts = Post::with('user')->orderBy('updated_at', 'desc')->paginate();
		return View::make('admin.blog.overview')->with('posts', $posts);
	}

}