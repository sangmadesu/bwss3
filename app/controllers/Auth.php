<?php

class Auth
{
	protected $session_name;

	public function __construct()
	{
		$this->session_name = Config::get('session.session_name');
	}

	public function user()
	{
		if(Session::exists($this->session_name)) {			
			$id = Session::get($this->session_name);
			$user = new User;
			$user = $user->where('*', "id = {$id}")->getOne();
			return $user;
		}
		return false;
	}

	public function login()
	{
		if(Session::exists($this->session_name)) {
			return Redirect::to('/admin/overview');
		} else {
			return view('auth.login');
		}
	}

	public function logout()
	{
		Session::delete($this->session_name);
		return Redirect::to('/auth/login');
	}

	public function check()
	{
		if(!Token::match(Input::get('token'))) {
			return Redirect::back();
		}
		$validator = new Validator;
		$validator->validate(Input::all(), [
			'email' => 'required',
			'password' => 'required'
		]);
		if(!$validator->passed()) {
			return Redirect::back(['key' => 'errors', 'values' => $validator->errors()]);
		} else {
			$email = Input::get('email');
			$password = Input::get('password');
			$login = $this->authenticate($email, $password);
			if($login) {
				return Redirect::to('/admin/overview');
			} else {
				return Redirect::to('/auth/login');
			}
		}
	}

	private function authenticate($email, $password)
	{
		$user = new User;
		$user = $user->checkEmailInUser($email);
		if(Hash::check($password, $user->password)) {
			Session::put($this->session_name, $user->id);
			return true;
		}
		return false;
	}

	public function register()
	{
		return view('auth.register');
	}

	public function store()
	{
		if(!Token::match(Input::get('token'))){
			return Redirect::back();
		}
		$validator = new Validator;
		$validator->validate(Input::all(),array(
			'firstname' => 'required|min:3',
			'lastname' => 'required|min:3',
			'email' => 'required|unique:users',
			'password' => 'required|min:3',
			'password_confirmation' => 'required|matches:password'
		));
		if(!$validator->passed()) {
			return Redirect::back(['key' => 'errors', 'values' => $validator->errors()]);
		} else {
			$user = new User;
			$user = $user->create([
				'firstname' => Input::get('firstname'),
				'lastname' => Input::get('lastname'),
				'email' => Input::get('email'),
				'password' => Hash::make(Input::get('password'))
			]);
			return Redirect::to('/auth/login');
		}
	}

	public function update($id)
	{
		if(!Token::match(Input::get('token'))) {
			return Redirect::back();
		}
		$validator = new Validator;
		$validator->validate(Input::all(), [
			'password' => 'required|min:3',
			'password_confirmation' => 'required|matches:password'
		]);
		if(!$validator->passed()){
			return Redirect::back(['key' => 'errors', 'values' => $validator->errors()]);
		} else {
			$password = Input::get('password');
			$user = new User;
			$user->update($id, [
				'password' => Hash::make($password)
			]);
			return Redirect::to('/admin/users');
		}
	}
}