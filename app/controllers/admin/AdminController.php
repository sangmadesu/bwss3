<?php

class AdminController
{

	protected $auth;

	public function __construct()
	{
		$session_name = Config::get('session.session_name');
		if(Session::exists($session_name)){
			return true;
		} else {
			return Redirect::to('/auth/login');
		}
	}
	
	public function index()
	{
		return view('admin.overview');
	}
}