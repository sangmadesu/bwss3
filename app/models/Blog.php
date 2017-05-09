<?php

class Blog extends Model
{
	protected $table = 'blogs';

	public function allBlogCategory()
	{
		$this->selectJoin(
			'blogs.*, categories.name, categories.color',
			'categories',
			'blogs.category_id = categories.id',
			"blogs.type = 'default'",
			'blogs.created_at DESC'
		);
		return $this->getAll();
	}

	public function blogCategoryByLimit($limit)
	{
		$this->selectJoin(
			'blogs.*, categories.name, categories.color',
			'categories',
			'blogs.category_id = categories.id',
			"blogs.type = 'default'",
			'blogs.created_at DESC',
			"{$limit}"
		);
		return $this->getAll();
	}

	public function blogCategoryById($id)
	{
		$this->selectJoin(
			'blogs.*, categories.name, categories.color, categories.description',
			'categories',
			'blogs.category_id = categories.id',
			"blogs.id = {$id} AND blogs.type = 'default'"
		);
		return $this->getOne();
	}

	public function allBlogPageCategory()
	{
		$this->selectJoin(
			'blogs.*, categories.name, categories.color',
			'categories',
			'blogs.category_id = categories.id',
			"blogs.type = 'page'",
			'blogs.created_at DESC'
		);
		return $this->getAll();
	}

	public function blogPageCategoryById($id)
	{
		$this->selectJoin(
			'blogs.*, categories.name, categories.color',
			'categories',
			'blogs.category_id = categories.id',
			"blogs.id = {$id} AND blogs.type = 'page'"
		);
		return $this->getOne();
	}
}