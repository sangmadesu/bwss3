<?php

class Category extends Model
{
	protected $table = 'categories';

	public function allCategoryBlog()
	{
		$this->selectJoin(
			'categories.*, blogs.*',
			'blogs',
			'categories.id = blogs.category_id',
			"categories.type = 'default'",
			'blogs.created_at DESC'
		);
		return $this->getAll();
	}

	public function allCategoryBlogById($id)
	{
		$this->selectJoin(
			'categories.*, blogs.*',
			'blogs',
			'categories.id = blogs.category_id',
			"categories.id = {$id} AND categories.type = 'default'",
			'blogs.created_at DESC'
		);
		return $this->getAll();
	}

	public function allCategoryTypeBlog()
	{
		$this->where('*',"type = 'default'");
		return $this->getAll();
	}

	public function allCategoryPage()
	{
		$this->selectJoin(
			'categories.*, blogs.*',
			'blogs',
			'categories.id = blogs.category_id',
			"categories.type = 'page'",
			'blogs.created_at DESC'
		);
		return $this->getAll();
	}

	public function categoryPageById($id)
	{
		$this->selectJoin(
			'categories.*, blogs.*',
			'blogs',
			'categories.id = blogs.category_id',
			"categories.id = {$id} AND categories.type = 'page'",
			'blogs.created_at DESC'
		);
		return $this->getAll();
	}
	
	public function allCategoryTypePage()
	{
		$this->where('*',"type = 'page'");
		return $this->getAll();
	}

	public function allAssociateCategoryById($id)
	{
		$this->leftJoin(
			'blogs.id',
			'blogs',
			'categories.id = blogs.category_id',
			"categories.id = {$id}"
		);
		return $this->getAll();
	}
}