<?php

$app = new AltoRouter;

// HOME
$app->map('GET','/','HomeController@index','home');
$app->map('GET','/search', 'HomeController@search','search');
$app->map('GET','/detail/[i:id]','HomeController@detail','home-detail');
$app->map('GET','/contact','HomeController@contact','contact');
$app->map('GET','/categories','HomeController@categories','categories');
$app->map('GET','/category/[i:id]','HomeController@category','category-id');
$app->map('GET','/pages/[i:id]','HomeController@pages','pages');
$app->map('GET','/page/[i:id]','HomeController@page','page-id');

// AUTH
$app->map('GET','/auth/login','Auth@login','auth-login');
$app->map('GET','/auth/logout','Auth@logout','auth-logout');
/*$app->map('GET','/auth/register','Auth@register','auth-register');*/
$app->map('POST','/auth/store','Auth@store','auth-store');
$app->map('POST','/auth/[i:id]/update','Auth@update','auth-update');
$app->map('POST','/auth/check','Auth@check','auth-check');

// ADMIN OVERVIEW
$app->map('GET', '/admin/overview', 'admin/AdminController@index', 'overview');

// ADMIN USER
$app->map('GET', '/admin/profile', 'admin/UserController@profile', 'profile');
$app->map('GET', '/admin/users', 'admin/UserController@index', 'users');

// ADMIN BLOG
$app->map('GET', '/admin/blogs', 'admin/BlogController@index', 'admin-blog-index');
$app->map('GET', '/admin/blogs/search', 'admin/BlogController@search', 'admin-blog-search');
$app->map('GET', '/admin/blogs/[i:id]/category', 'admin/BlogController@category', 'admin-blog-by-category');
$app->map('GET', '/admin/blogs/create', 'admin/BlogController@create', 'admin-blog-create');
$app->map('POST', '/admin/blogs/store', 'admin/BlogController@store', 'admin-blog-store');
$app->map('GET', '/admin/blogs/[i:id]/edit', 'admin/BlogController@edit', 'admin-blog-edit');
$app->map('POST', '/admin/blogs/[i:id]/update', 'admin/BlogController@update', 'admin-blog-update');
$app->map('POST', '/admin/blogs/[i:id]/[delete:action]', 'admin/BlogController@destroy', 'admin-blog-destroy');

// ADMIN PAGE
$app->map('GET', '/admin/pages', 'admin/PageController@index', 'admin-page-index');
$app->map('GET', '/admin/pages/search', 'admin/PageController@search', 'admin-page-search');
$app->map('GET', '/admin/pages/[i:id]/category', 'admin/PageController@category', 'admin-page-by-category');
$app->map('GET', '/admin/pages/create', 'admin/PageController@create', 'admin-page-create');
$app->map('POST', '/admin/pages/store', 'admin/PageController@store', 'admin-page-store');
$app->map('GET', '/admin/pages/[i:id]/edit', 'admin/PageController@edit', 'admin-page-edit');
$app->map('POST', '/admin/pages/[i:id]/update', 'admin/PageController@update', 'admin-page-update');
$app->map('POST', '/admin/pages/[i:id]/[delete:action]', 'admin/PageController@destroy', 'admin-page-destroy');


// ADMIN CATEGORY
$app->map('GET', '/admin/categories', 'admin/CategoryController@index', 'admin-category-index');
$app->map('GET', '/admin/categories/create', 'admin/CategoryController@create', 'admin-category-create');
$app->map('POST', '/admin/categories/store', 'admin/CategoryController@store', 'admin-category-store');
$app->map('GET', '/admin/categories/[i:id]/edit', 'admin/CategoryController@edit', 'admin-category-edit');
$app->map('POST', '/admin/categories/[i:id]/update', 'admin/CategoryController@update', 'admin-category-update');
$app->map('POST', '/admin/categories/[i:id]/[delete:action]', 'admin/CategoryController@destroy', 'admin-category-destroy');

// ADMIN MENUS
$app->map('GET', '/admin/menus', 'admin/MenuController@index', 'admin-menu-index');
$app->map('POST', '/admin/menus/store', 'admin/MenuController@store', 'admin-menu-store');
$app->map('GET', '/admin/menus/[i:id]/edit', 'admin/MenuController@edit', 'admin-menu-edit');
$app->map('POST', '/admin/menus/[i:id]/update', 'admin/MenuController@update', 'admin-menu-update');
$app->map('POST', '/admin/menus/sort', 'admin/MenuController@sort', 'admin-menu-sort');

$match = $app->match();
$GLOBALS['app'] = $app;
if(empty($match)){
	header('HTTP/1.1 404 not found');
	view('errors.404');
	exit();
} 
list($controller, $method) = explode('@', $match['target']);
$controller = explode('/', $controller);
if(isset($controller[1])) {
	if (is_callable($controller[1], $method)){
		$object = new $controller[1];
		call_user_func_array([$object, $method], $match['params']);
	} else {
		throw new Exception("Error method missing " . $controller[1] . "@" . $method);
	}
} elseif (isset($controller[0])) {
	if (is_callable($controller[0], $method)){
		$object = new $controller[0];
		call_user_func_array([$object, $method], $match['params']);
	} else {
		throw new Exception("Error method missing " . $controller[0] . "@" . $method);
	}
}
