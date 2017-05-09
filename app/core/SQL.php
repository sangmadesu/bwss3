<?php

class SQL
{
	private static $_instance = null;
	private $_pdo;
	private $_query;
	private $_results;
	private $_errors = false;
	private $_count = 0;

	public function __construct()
	{
		$this->_pdo = new PDO( env('driver') . 
			':host=' . env('hostname') . 
			';port=' . env('port') . 
			';dbname=' . env('dbname'), 
			env('username'), 
			env('password'));
	}

	public static function getInstance()
	{
		if(!isset(self::$_instance)) {
			self::$_instance = new SQL;
		}
		return self::$_instance;
	}

	public function query($sql, array $params = [])
	{
		$this->_errors = false;
		if ($this->_query = $this->_pdo->prepare($sql)) {
			if (count($params)) {
				$i = 1;
				foreach ($params as $param) {
					$this->_query->bindValue($i, $param);
					$i++;
				}
			}
			if ($this->_query->execute()){
				$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
				$this->_count = $this->_query->rowCount();
			} else {
				$this->_errors = true;
			}
		}
		return $this;
	}

	public function insert($table, array $fields = [])
	{
		if(count($fields)) {
			$keys = array_keys($fields);
			$values = null;
			$i = 1;
			foreach ($fields as $field) {
				$values .= '?';
				if($i < count($fields)) {
					$values .= ", ";
				}
				$i++;
			}
			$sql = "INSERT INTO " . $table . ' (' . implode(', ', $keys) . ') ' . "VALUES ({$values})";
			if(!$this->query($sql, $fields)->isErrors()){
				return true;
			}
		}
		return false;
	}

	public function update($table, $id, array $fields = [])
	{
		if(count($fields)){
			$sets = "";
			$i = 1;
			foreach ($fields as $key => $value) {
				$sets .= "{$key} = ?";
				if($i < count($fields)){
					$sets .= ", ";
				}
				$i++;  
			}
			$sql = "UPDATE {$table} SET {$sets} WHERE id = {$id}";
			if(!$this->query($sql, $fields)->isErrors()){
				return true;
			}
		}
		return false;
	}

	public function delete($table, $id)
	{
		$sql = "DELETE FROM {$table} WHERE id = {$id}";
		$this->query($sql);
		return $this;
	}

	public function select($columns, $table, $where = null, $orderBy = null, $limit = null)
	{
		$sql = "SELECT " . $columns . " FROM " . $table ;
		($where != null) ? $sql .= ' WHERE ' . $where : null;
		($orderBy != null) ? $sql .= ' ORDER BY ' . $orderBy : null; 
		($limit != null) ? $sql .= ' LIMIT ' . $limit : null;
		$this->query($sql);
		return $this; 
	}

	public function where($columns, $table, $where = null, $args = null)
	{
		$sql = "SELECT {$columns} FROM {$table} ";
		($where != null) ? $sql .= " WHERE " . $where : null;
		($args != null) ? $sql .= " " . $args : null;
		$this->query($sql);
		return $this;
	}

	public function selectLike($columns, $table, $where, $pattern)
	{
		$sql = "SELECT {$columns} FROM {$table} WHERE {$where} LIKE '%{$pattern}%'";
		$this->query($sql);
		return $this;
	}

	public function selectBetween($columns, $table, $where, $between)
	{
		$sql = "SELECT {$columns} FROM {$table} WHERE {$where} BETWEEN {$between}";
		$this->query($sql);
		return $this;
	}

	public function selectNotBetween($columns, $table, $where, $between)
	{
		$sql = "SELECT {$columns} FROM {$table} WHERE {$where} NOT BETWEEN {$between}";
		$this->query($sql);
		return $this;
	}

	public function selectJoin($columns, $table, $join, $on, $where = null, $orderBy = null, $limit = null)
	{
		$sql = "SELECT " . $columns . " FROM " . ' ' . $table . ' INNER JOIN ' . $join  . ' ON ' . $on;
		($where != null) ? $sql .= ' WHERE ' . $where : null;
		($orderBy != null) ? $sql .= ' ORDER BY ' . $orderBy : null;
		($limit != null) ? $sql .= ' LIMIT ' . $limit : null;
		$this->query($sql);
		return $this;
	}

	public function selectLeftJoin($columns, $table, $join, $on, $where = null, $orderBy = null, $limit = null)
	{
		$sql = "SELECT " . $columns . " FROM " . ' ' . $table . ' LEFT JOIN ' . $join  . ' ON ' . $on;
		($where != null) ?  $sql .= ' WHERE ' .  $where : null;
		($orderBy != null) ? $sql .= ' ORDER BY ' . $orderBy : null;
		($limit != null) ? $sql .= ' LIMIT ' . $limit : null;
		$this->query($sql);
		return $this;
	}

	public function selectRightJoin($columns, $table, $join, $on, $where = null, $orderBy = null, $limit = null)
	{
		$sql = "SELECT " . $columns . " FROM " . ' ' . $table . ' RIGHT JOIN ' . $join  . ' ON ' . $on;
		($where != null) ? $sql .= ' WHERE ' . $where : null;
		($orderBy != null) ? $sql .= ' ORDER BY ' . $orderBy : null;
		($limit != null) ? $sql .= ' LIMIT ' . $limit : null;
		$this->query($sql);
		return $this;
	}

	public function selectAVG($avg, $table)
	{
		$sql = "SELECT AVG({$avg}) FROM {$table}";
		$this->query($sql);
		return $this;
	}

	public function selectAVGRAW($avg, $table)
	{
		$sql = "SELECT AVG({$avg}) FROM {$table}";
		return $sql;
	}

	public function selectMAX($max, $table)
	{
		$sql = "SELECT MAX({$max}) FROM {$table}";
		$this->query($sql);
		return $this;
	}

	public function selectMAXRAW($max, $table)
	{
		$sql = "SELECT MAX({$max}) FROM {$table}";
		return $sql;
	}

	public function selectMIN($min, $table)
	{
		$sql = "SELECT MIN({$min}) FROM {$table}";
		$this->query($sql);
		return $this;
	}

	public function selectMINRAW($min, $table)
	{
		$sql = "SELECT MIN({$min}) FROM {$table}";
		return $sql;
	}

	public function selectMID($mid, $table)
	{
		$sql = "SELECT MID({$mid}) FROM {$table}";
		$this->query($sql);
		return $this;
	}

	public function selectSUM($sum, $table)
	{
		$sql = "SELECT SUM({$sum}) FROM {$table}";
		$this->query($sql);
		return $this;
	}

	public function selectSUMRAW($sum, $table)
	{
		$sql = "SELECT SUM({$sum}) FROM {$table}";
		return $sql;
	}

	public function isErrors()
	{
		return $this->_errors;
	}

	public function getAll()
	{
		return $this->_results;
	}

	public function getOne()
	{
		return $this->getAll()[0];
	}

	public function count()
	{
		return $this->_count;
	}

}