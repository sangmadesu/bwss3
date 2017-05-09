<?php

return [
	
	'mysql' => [
		'driver' => env('driver'),
		'hostname' => env('hostname'),
		'port' => env('port'),
		'dbname' => env('dbname'),
		'username' => env('username'),
		'password' => env('password')
	],

	'remember' => [
		'cookie_name' => env('cookie_name'),
		'cookie_expiry' => env('cookie_expiry')
	],

	'session' => [
		'session_name' => env('session_name'),
		'token_name' => env('token_name')
	]
];