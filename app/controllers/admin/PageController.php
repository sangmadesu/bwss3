<?php

class PageController
{
	protected $blogs;
	protected $categories;

	public function __construct()
	{
		$session_name = Config::get('session.session_name');
		if(Session::exists($session_name)){
			$this->blogs = new Blog;
			$this->categories = new Category;
			return true;
		} else {
			return Redirect::to('/auth/login');
		}
	}

	public function index()
	{
		$page = $this->blogs;
		$category = $this->categories;
		$allBlogPageCategory = $page->allBlogPageCategory();
		$allCategoryTypePage = $category->allCategoryTypePage();
		return view('admin.pages.index', compact('allBlogPageCategory','allCategoryTypePage'));
	}

	public function search()
	{
		$validator = new Validator;
		$validator->validate(Input::all(),[
			'search' => 'required'
		]);
		if(!$validator->passed()){
			return Redirect::back(['key' => 'errors', 'values' => $validator->errors()]);
		} else {
			$page = $this->blogs;
			$category = $this->categories;
			$search = Input::get('search');
			$pageSearch = $page->selectLike('*',"type = 'page' AND title", $search)->getAll();
			$allCategoryTypePage = $category->allCategoryTypePage();
			return view('admin.pages.search', compact('pageSearch','allCategoryTypePage'));
		}
	}

	public function category($id)
	{
		$page = $this->categories;
		$categoryPageById = $page->categoryPageById($id);
		$allCategoryTypePage = $page->allCategoryTypePage();
		return view('admin.pages.category', compact('categoryPageById','allCategoryTypePage'));
	}

	public function create()
	{
		$category = $this->categories;
		$allCategoryTypePage = $category->allCategoryTypePage();
		return view('admin.pages.create', compact('allCategoryTypePage'));
	}

	public function store()
	{
		if(!Token::match(Input::get('token'))){
			return Redirect::back();
		}
		$validator = new Validator;	
		$validator->validate(Input::all(),[
			'title' => 'required',
			'body' => 'required',
			'created_at' => 'required'
		]);
		if(!$validator->passed()){
			return Redirect::back(['key' => 'errors', 'values' => $validator->errors()]);
		} else {
			$page = $this->blogs;
			$title = Input::get('title');
			$categories = Input::get('categories');
			$body = Input::get('body');
			$created_at = Input::get('created_at');
			$auth = new Auth;
			$auth = $auth->user();
			$email = $auth->email;
			$headline = Input::get('headline') ? 1 : 0 ;
			$image = Storage::getOriginal('image');
			if(!empty($image)){
				$filename = Storage::get('image');
				if($filename){
					Storage::upload('image', $filename);	
				}
			} else {
				$filename = null;
			}
			$page->create([
				'title' => $title,
				'category_id' => $categories,
				'slug' => slug($title),
				'body' => $body,
				'created_at' => $created_at,
				'headline' => $headline,
				'email' => $email,
				'image' => $filename,
				'type' => 'page'
			]);
			return Redirect::to('/admin/pages');
		}
	}

	public function edit($id)
	{
		$page = $this->blogs;
		$blogPageCategoryById = $page->blogPageCategoryById($id);
		$category = $this->categories;
		$allCategoryTypePage = $category->allCategoryTypePage();
		return view('admin.pages.edit', compact('blogPageCategoryById','allCategoryTypePage'));
	}

	public function update($id)
	{
		if(!Token::match(Input::get('token'))) {
			return Redirect::back();
		}
		$validator = new Validator;
		$validator->validate(Input::all(), [
			'title' => 'required',
			'body' => 'required',
			'created_at' => 'required'
		]);
		if(!$validator->passed()){
			return Redirect::to(['key' => 'errors', 'values' => $validator->errors()]);
		} else {
			$page = $this->blogs;
			$title = Input::get('title');
			$categories = Input::get('categories');
			$body = Input::get('body');
			$created_at = Input::get('created_at');
			$headline = Input::get('headline') ? 1 : 0;
			$image = Storage::getOriginal('image');
			if(!empty($image)){
				$filename = Storage::get('image');
			}
			if(empty($image)){
				$imageInPage = $page->find($id)->getOne();
				if($imageInPage != null){
					$filename = $imageInPage->image;
				}
			}	
			Storage::upload('image', $filename);
			$page->update($id, [
				'title' => $title,
				'category_id' => $categories,
				'body' => $body,
				'created_at' => $created_at,
				'headline' => $headline,
				'image' => $filename
			]);
			return Redirect::to('/admin/pages');
		}
	}

	public function destroy($id)
	{
		$page = $this->blogs;
		$pageId = $page->find($id)->getOne();
		$imageInPage = $pageId->image;
		if($imageInPage != null) {
			$filename = Storage::setDestination($imageInPage);
			unlink($filename);
			$page->delete($id);
			Session::flash('success','Successfuly deleted page.');
			return Redirect::to('/admin/pages');
		} elseif($imageInPage == null) {
			$page->delete($id);
			Session::flash('success','Successfuly deleted page.');
			return Redirect::to('/admin/pages');
		}
	}
}
			