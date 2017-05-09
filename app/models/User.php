<?php

class User extends Model
{
	protected $table = 'users';

	public function checkEmailInUser($email)
	{
		$this->where('*',"email = '{$email}'");
		return $this->getOne();
	}
}