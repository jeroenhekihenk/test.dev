<?php namespace Digitus\Upload\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class UploadController extends \Digitus\Base\Controllers\BaseController {

	public function index()
	{
		return $this->view->make('user.profile.picture');
	}

	public function update()
	{

		$file = Input::file('file');

	    $destinationPath = 'uploads/images/users/'.$this->user->id;
	    $filename = $file->getClientOriginalName();
	    $upload_success = $file->move($destinationPath, $filename);

	    try
	    {
	        $user = $this->user;

	        $user->image = str_replace('\\', '/', $upload_success);

	        if($user->save())
	        {
	            return $this->redirect->to('user/'.$user->username.'/profile');
	        }

	    } catch(\Exception $e) {
	        return $this->redirect->to('user/'.$user->username.'/profile')->withErrors(array('login'=> $e->getMessage()));
	    }



	}

}