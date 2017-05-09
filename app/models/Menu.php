<?php

class Menu extends Model
{
	protected $table = 'menus';

	public function order()
	{
		$this->orderBy('*','','menu_order ASC');
		return $this->getAll();
	}

}