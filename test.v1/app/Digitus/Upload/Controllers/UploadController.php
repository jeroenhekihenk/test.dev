<?php namespace Digitus\Upload\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use View, Auth, Redirect;

class UploadController extends \Digitus\Base\Controllers\BaseController {

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

}