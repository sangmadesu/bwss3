<?php

if(!function_exists('env')) {
	function env($key)
	{
		if(!is_string($key)) {
			throw new \InvalidArgumentException;
		}
		$json = file_get_contents('env.json');
		$data = (array) json_decode($json);
		if(!array_key_exists($key, $data)){
			throw new \ErrorException;
		}
		return $data[$key];
	}
}

if(!function_exists('view')) {
	function view($view_path, array $data = [])
	{
		if($view_path) {
			$path = explode('.', $view_path);
			$app = $GLOBALS['app'];
			foreach ($data as $key => $value) {
				if(!is_string($key)) {
					throw new \Exception("Please provide string for key the data.");
				}
				$$key = $value;
			}
			$path =  'app/views/' . implode('/', $path) . '.php';
			if(!file_exists($path)) {
				throw new \Exception("File not exists in path: {$path}");
			}
			require_once $path;
		} 
	}
}

if(!function_exists('in_public')) {
	function in_public($path)
	{
		return BASE_URL . 'app/public/' . $path;
	}
}

if(!function_exists('uploads')) {
	function uploads($path)
	{	
		return BASE_URL . 'app/resource/uploads/' . $path; 
	}
}

if(!function_exists('slug')) {
	function slug($str)
	{
		$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $str);
		$slug = strtolower($slug);
		return $slug;
	}
}

if(!function_exists('dd')) {
	function dd($args) {
		echo '<pre>';
		var_dump($args);
		echo '</pre>';
	}
}