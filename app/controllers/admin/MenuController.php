<?php

class MenuController
{
	protected $menus;
	protected $validator;
	
	public function __construct()
	{
		$session_name = Config::get('session.session_name');
		if(Session::exists($session_name)){
			$this->menus = new Menu;
			$this->validator = new Validator;
			return true;
		} else {
			return Redirect::to('/auth/login');
		}
	}

	public function index()
	{
		$menus = $this->menus;
		$menus = $menus->order();

		function getChilds($currentMenu, $menus){
			return array_filter($menus, function($menus) use ($currentMenu) {
				return $currentMenu->id == $menus->parent;
			});
		}
		
		return view('admin.menus.index', compact('menus'));
	}

	public function store()
	{
		if(!Token::match(Input::get('token'))){
			return Redirect::back();
		}
		$validator = $this->validator;
		$validator->validate(Input::all(), [
			'title' => 'required'
		]);
		if(!$validator->passed()){
			return Redirect::back(['key' => 'errors', 'values' => $validator->errors()]);
		} else {
			$title = Input::get('title');
			$url = Input::get('url');
			$menus = $this->menus;
			$menus->create([
				'title' => $title,
				'url' => $url
			]);
			return Redirect::to('/admin/menus');
		}
	}

	public function edit($id)
	{
		$menu = $this->menus;
		$menu = $menu->find($id)->getOne();
		return view('admin.menus.edit', compact('menu'));
	}

	public function update($id)
	{
		if(!Token::match(Input::get('token'))) {
			return Redirect::back();
		}
		$validator = $this->validator;
		$validator->validate(Input::all(), [
			'title' => 'required',
			'url' => 'required'
		]);
		if(!$validator->passed()) {
			return Redirect::back(['key' => 'errors', 'values' => $validator->errors()]);
		} else {
			$title = Input::get('title');
			$url = Input::get('url');
			$menu_order = Input::get('menu_order');
			$parent = Input::get('parent') ? Input::get('parent') : null;
			$menu = $this->menus;
			$menu->update($id, [
				'title' => $title,
				'url' => $url,
				'menu_order' => $menu_order,
				'parent' => $parent
			]);
			return Redirect::to('/admin/menus');
		}
	}

	public function sort()
	{
		function sortMenu($array, $parent = null, $i = 0, $x = 0){
			foreach ($array as $a) {
				if(is_null($parent)){
					$i++;
					$menus = new Menu;
					$findMenuId = $menus->find($a['id'])->getOne();
					$menus->update($a['id'],[
						'menu_order' => $i,
						'parent' => $parent,
					]);
					if(array_key_exists('children', $a)){
						sortMenu($a['children'], $a['id'], $i);
					}
				} else {
					$i = ++$x;
					$menus = new Menu;
					$findMenuId = $menus->find($a['id'])->getOne();
					$menus->update($a['id'],[
						'menu_order' => $i,
						'parent' => $parent,
					]);
					if(array_key_exists('children', $a)){
						sortMenu($a['children'], $a['id'], $i);
					}
				}
			}
		}
		$menuIds = Input::get('menuIds');
		sortMenu($menuIds);
	}
}