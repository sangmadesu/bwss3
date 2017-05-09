<?php

class UserController
{
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
		$users = new User;
		$users = $users->all();
		return view('admin.users.index', compact('users'));
	}

	public function profile()
	{
		$auth = new Auth;
		$profile = $auth->user();
		return view('admin.users.profile', compact('profile'));
	}
}