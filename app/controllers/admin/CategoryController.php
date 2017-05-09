<?php

class CategoryController
{
	protected $categories;

	public function __construct()
	{
		$session_name = Config::get('session.session_name');
		if(Session::exists($session_name)){
			$this->categories = new Category;
			return true;
		} else {
			return Redirect::to('/auth/login');
		}
	}

	public function index()
	{
		$category = $this->categories;
		$categories = $category->all();
		return view('admin.categories.index', compact('categories'));
	}

	public function create()
	{
		return view('admin.categories.create');
	}

	public function store()
	{
		if(!Token::match(Input::get('token'))) {
			return Redirect::back();
		}
		$validator = new Validator;
		$validator->validate(Input::all(), [
			'name' => 'required',
			'description' => 'required',
			'type' => 'required'
		]);
		if(!$validator->passed()){
			return Redirect::back(['key' => 'errors', 'values' => $validator->errors()]);
		} else {
			$categories = new Category;
			$name = Input::get('name');
			$type = Input::get('type');
			$color = Input::get('color');
			$description = Input::get('description');
			$categories->create([
				'name' => $name,
				'type' => $type,
				'slug' => slug($name),
				'color' => $color,
				'description' => $description
			]);
			return Redirect::to('/admin/categories');
		}
	}

	public function edit($id)
	{
		$category = $this->categories;
		$category = $category->find($id)->getOne();
		return view('admin.categories.edit', compact('category'));
	}

	public function update($id)
	{
		if(!Token::match(Input::get('token'))) {
			return Redirect::back();
		}
		$validator = new Validator;
		$validator->validate(Input::all(), [
			'name' => 'required',
			'description' => 'required'
		]);
		if(!$validator->passed()){
			return Redirect::back(['key' => 'errors', 'values' => $validator->errors()]);
		} else {
			$category = $this->categories;
			$name = Input::get('name');
			$color = Input::get('color');
			$description = Input::get('description');
			$category->update($id, [
				'name' => $name,
				'color' => $color,
				'slug' => slug($name),
				'description' => $description
			]);
			return Redirect::to('/admin/categories');
		}
	}

	public function destroy($id)
	{
		$category = $this->categories;
		$allAssociateCategoryById = $category->allAssociateCategoryById($id);
		
		foreach ($allAssociateCategoryById as $i) {
			if($i->id > 0){
				Session::flash('info','Category have associate.');
				return Redirect::to('/admin/categories');
			} else {
				$category->delete($id);
				Session::flash('success','Successfully deleted category.');
				return Redirect::to('/admin/categories');
			}
		}
	}
}