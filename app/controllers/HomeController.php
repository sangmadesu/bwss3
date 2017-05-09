<?php

class HomeController
{
	protected $menus;
	protected $blogs;
	protected $categories;

	public function __construct()
	{
		$this->menus = new Menu;
		$this->blogs = new Blog;
		$this->categories = new Category;
		function getChilds($currentMenu, $menus) {
			return array_filter($menus, function($menus) use ($currentMenu){
				return $currentMenu->id == $menus->parent;
			});
		}
	}

	public function index()
	{
		$blog = $this->blogs;
		$blogs = $blog->blogCategoryByLimit(10);
		$pages = $blog->allBlogPageCategory();
		$menu = $this->menus;
		$menus = $menu->order();
		return view('home', compact('blogs','pages','menus'));
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
			$blog = $this->blogs;
			$findBlog = $blog->selectLike('*', "type = 'default' AND title", $search)->getAll();
			$menu = $this->menus;
			$menus = $menu->order();
			return view('search', compact('findBlog', 'menus'));
		}
	}

	public function detail($id)
	{
		$blog = $this->blogs;
		$blogCategoryById = $blog->blogCategoryById($id);
		$allBlogCategory = $blog->allBlogCategory();
		$menu = $this->menus;
		$menus = $menu->order();
		return view('detail', compact('blogCategoryById','allBlogCategory','menus'));
	}

	public function contact()
	{
		$menu = $this->menus;
		$menus = $menu->order();
		return view('contact', compact('menus'));
	}

	public function categories()
	{
		$category = $this->categories;
		$allCategoryBlog = $category->allCategoryBlog();
		$menu = $this->menus;
		$menus = $menu->order();
		return view('categories', compact('allCategoryBlog','menus'));
	}

	public function category($id)
	{
		$category = $this->categories;
		$allCategoryBlogById = $category->allCategoryBlogById($id);
		$menus = $this->menus;
		$menus = $menus->order();
		return view('category',compact('allCategoryBlogById','menus'));
	}

	public function pages($id)
	{
		$category = $this->categories;
		$categoryPageById = $category->categoryPageById($id);
		$menus = $this->menus;
		$menus = $menus->order();
		return view('pages', compact('categoryPageById','menus'));
	}

	public function page($id)
	{
		$page = $this->blogs;
		$blogPageCategoryById = $page->blogPageCategoryById($id);
		$menus = $this->menus;
		$menus = $menus->order();
		return view('page', compact('blogPageCategoryById','menus'));
	}
}