<?php namespace Digitus\Upload\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use View, Auth, Redirect;
use Digitus\Base\Controllers\BaseController;

class UploadController extends BaseController {

	public function index()
	{
		return View::make('user.profile.picture');
	}

	public function update()
	{
		$user = Auth::user();
		$file = Input::file('file');

	    $destinationPath = 'uploads/images/users/'.$user->id;
	    $filename = $file->getClientOriginalName();
	    $upload_success = $file->move($destinationPath, $filename);

	    try
	    {
	        $user = $user;

	        $user->image = str_replace('\\', '/', $upload_success);

	        if($user->save())
	        {
	            return $this->redirect->to('user/'.$user->username);
	        }

	    } catch(\Exception $e) {
	        return Redirect::to('user/'.$user->username)->withErrors(array('login'=> $e->getMessage()));
	    }



	}

	public function addPageImage($slug)
	{
		$page = Page::where('slug','=',$slug);
		$file = Input::file('file');

	    $destinationPath = 'uploads/images/pages/'.$page->id;
	    $filename = str_random(12);
	    $upload_success = $file->move($destinationPath, $filename);

	    if( $upload_success ) {
	    	return Redirect::back();
	    } else {
	    	return Redirect::to('home.index');
	    }
	}

}