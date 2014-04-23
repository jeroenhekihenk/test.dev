<?php namespace Digitus\Admin\Controllers;

use Digitus\Base\Controllers\BaseController,
Digitus\Base\Model\Image,
Auth,
View,
Input,
Redirect,
Validator;

class AdminMediaController extends BaseController {

	public function index()
	{
		$images = Image::all();
		return View::make('admin.media.index')
		->with('images',$images);
	}

	public function create()
	{
		if(Auth::check())
		{
			$user = Auth::user();
		} else {
			$user = false;
		}
		return View::make('admin.media.create')
		->with('user', $user);
	}

	public function store()
	{
		$file = Input::file('file');

		$destinationPath = 'uploads/images/media/';
	    $filename = $file->getClientOriginalName();
	    $upload_success = $file->move($destinationPath, $filename);

	    $new_media = array(
			'title'		=> Input::get('title'),
			'image'		=> str_replace('\\', '/', $upload_success),
			'datum'		=> Input::get('datum'),
		);
		$rules = array(
			'title'		=> 'required|min:3|max:255',
		);

		// $new_tags = array();
		// foreach(explode(',', $this->input->get('tags')) as $tag) {
		// $tag = Tag::firstOrCreate(array('name' => $tag));
		// array_push($new_tags, $tag);
		// }
		// $post->tags()->sync($new_tags); 
		$validation = Validator::make($new_media, $rules);
		if ( $validation->fails() )
		{
			return Redirect::route('admin.media.create')->withErrors($validation)->withInput();
		}
		$media = new Image($new_media);
		$media->save(); 
		
		return Redirect::route('admin.media.index');
		
	}

	public function show($slug)
	{

	}

	public function edit($id)
	{
		$image = Image::where('id','=',$id)->first();
// dd($image);
		return View::make('admin.media.edit')
		->with('image',$image);
	}

	public function update($id)
	{
		$image = Image::where('id','=',$id)->first();
		$image->title 		= Input::get('title');
		$image->save();
		return Redirect::route('admin.media.index');
		
	}

	public function destroy($id)
	{
		$image = Image::where('id','=',$id)->first();
		if ($image) {
			$image->delete();
			return Redirect::route('admin.media.index');
			}
		return 'There was a problem...';
	}

}