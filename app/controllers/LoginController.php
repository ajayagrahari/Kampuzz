<?php

class LoginController extends BaseController {

	public function __construct() {
		parent::__construct();
	}

	public function index()
	{
		return View::make('login.index');
	}


}
