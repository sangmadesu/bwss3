<?php

abstract class Model
{

	protected $db;
	protected $table;

	public function __construct()
	{
		$this->db = SQL::getInstance();
	}

	public function all()
	{
		$this->db->select('*', $this->table);
		return $this->db->getAll();
	}

	public function orderBy($columns, $where = null, $orderBy = null, $limit = null)
	{
		$this->db->select($columns, $this->table, $where, $orderBy, $limit);
		return $this;
	}

	public function selectLike($columns, $where, $pattern)
	{
		$this->db->selectLike($columns, $this->table, $where, $pattern);
		return $this;
	}

	public function selectJoin($columns, $join, $on, $where = null, $orderBy = null, $limit = null)
	{
		$this->db->selectJoin($columns, $this->table, $join, $on, $where, $orderBy, $limit);
		return $this;
	}

	public function LeftJoin($columns, $join, $on, $where = null, $orderBy = null, $limit = null)
	{
		$this->db->selectLeftJoin($columns, $this->table, $join, $on, $where, $orderBy, $limit);
		return $this;
	}

	public function where($columns, $where, $args = null)
	{
		$this->db->where($columns, $this->table, $where, $args);
		return $this;
	}

	public function find($id)
	{
		$this->db->where('*', $this->table, "id = {$id}");
		return $this;
	}

	public function create(array $data = [])
	{
		try {
			$this->db->insert($this->table, $data);
			return true;
		} catch (Exception $e) {
			die($e->getMessage());
		}	
	}

	public function update($id, array $data = [])
	{
		try {
			$this->db->update($this->table, $id, $data);
			return true;
		} catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public function delete($id)
	{
		try {
			$this->db->delete($this->table, $id);
			return true;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function getAll()
	{
		return $this->db->getAll();
	}

	public function getOne()
	{
		return $this->db->getOne();
	}
}