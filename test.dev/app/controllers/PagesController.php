<?php

class PagesController extends BaseController {

	public function getBureau()
	{
		return View::make('pages.ons-bureau.index');
	}

	public function getKennismaken()
	{
		return view::make('pages.kennismaken.index');
	}

}