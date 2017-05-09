<?php

class BlogController
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
		$blog = $this->blogs;
		$category = $this->categories;
		$allBlogCategory = $blog->allBlogCategory();
		$allCategoryTypeBlog = $category->allCategoryTypeBlog();
		return view('admin.blogs.index', compact('allBlogCategory','allCategoryTypeBlog'));
	}

	public function category($id)
	{
		$blog = $this->categories;
		$allCategoryBlogById = $blog->allCategoryBlogById($id);
		$allCategoryTypeBlog = $blog->allCategoryTypeBlog();
		return view('admin.blogs.categories', compact('allCategoryBlogById','allCategoryTypeBlog'));
	}

	public function search()
	{
		$validator = new Validator;
		$validator->validate(Input::all(), [
			'search' => 'required'
		]);
		if(!$validator->passed()){
			return Redirect::back(['key' => 'errors', 'values' => $validator->errors()]);
		} else {
			$search = Input::get('search');
			$blog = new Blog;
			$blogSearch = $blog->selectLike('*',"type = 'default' AND title",$search)->getAll();
			$category = $this->categories;
			$allCategoryTypeBlog = $category->allCategoryTypeBlog();
			return view('admin.blogs.search', compact('blogSearch','allCategoryTypeBlog'));
		}
	}

	public function create()
	{
		$category = $this->categories;
		$allCategoryTypeBlog = $category->allCategoryTypeBlog();
		return view('admin.blogs.create', compact('allCategoryTypeBlog'));
	}

	public function store()
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
		if(!$validator->passed()) {
			return Redirect::back(['key' => 'errors', 'values' => $validator->errors()]);
		} else {
			$blog = $this->blogs;
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
			$blog->create([
				'title' => $title,
				'category_id' => $categories,
				'slug' => slug($title),
				'body' => $body,
				'created_at' => $created_at,
				'headline' => $headline,
				'email' => $email,
				'image' => $filename,
				'type' => 'default'
			]);
			return Redirect::to('/admin/blogs');
		}	
	}

	public function edit($id)
	{
		$blogs = $this->blogs;
		$blogCategoryById = $blogs->blogCategoryById($id);
		$category = $this->categories;
		$allCategoryTypeBlog = $category->allCategoryTypeBlog();
		return view('admin.blogs.edit', compact('blogCategoryById','allCategoryTypeBlog'));
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
		if(!$validator->passed()) {
			return Redirect::back(['key' => 'errors', 'values' => $validator->errors()]);
		} else {
			$blog = $this->blogs;
			$auth = new Auth;
			$auth = $auth->user();
			$email = $auth->email;
			$title = Input::get('title');
			$headline = Input::get('headline') ? 1 : 0 ;
			$categories = Input::get('categories');
			$body = Input::get('body');
			$created_at = Input::get('created_at');
			$image = Storage::getOriginal('image');
			if(!empty($image)){
				$filename = Storage::get('image');
			}
			if(empty($image)){
				$imageInPage = $blog->find($id)->getOne();
				if($imageInPage != null){
					$filename = $imageInPage->image;
				}
			}	
			Storage::upload('image', $filename);
			$blog->update($id, [
				'title' => $title,
				'category_id' => $categories,
				'slug' => slug($title),
				'body' => $body,
				'created_at' => $created_at,
				'headline' => $headline,
				'email' => $email,
				'image' => $filename,
				'type' => 'default'
			]);
			return Redirect::to('/admin/blogs');
		}
	}

	public function destroy($id)
	{
		$blog = $this->blogs;
		$blogId = $blog->find($id)->getOne();
		$imageInBlog = $blogId->image;
		if($imageInBlog != null) {
			$filename = Storage::setDestination($imageInBlog);
			unlink($filename);
			$blog->delete($id);
			Session::flash('success','Successfuly deleted blog.');
			return Redirect::to('/admin/blogs');
		} elseif($imageInBlog == null) {
			$blog->delete($id);
			Session::flash('success','Successfuly deleted blog.');
			return Redirect::to('/admin/blogs');
		}	
	}
}