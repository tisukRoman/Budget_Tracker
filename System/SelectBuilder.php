<?php

namespace System;

class SelectBuilder {
	public string $table;
  public string $sql;

  public string $whereSQL = "";
  public string $limitSQL = "";
  public string $orderSQL = "";

	public function __construct(string $table){
		$this->table = $table;
    $this->sql = "SELECT * FROM `{$table}` ";
	}

  public function getSQL(): string {
    return $this->sql . $this->whereSQL . $this->orderSQL . $this->limitSQL;
  }

  public function where(string $field, string $operator, string $value): ISelectBuilder {
    if(!isset($field) || !isset($operator)){
      throw new Exception("You must specify all the variables");
    }

    empty($this->whereSQL)
      ? $this->whereSQL = " WHERE {$field} {$operator} {$value} "
      : $this->whereSQL .= " AND {$field} {$operator} {$value} ";

    return $this;
  }

  public function orderBy(string $field, string $order = "ASC"): ISelectBuilder {
    empty($this->orderSQL) 
      ? $this->orderSQL = " ORDER BY {$field} {$order} "
      : $this->orderSQL .= ", {$field} {$order} ";

    return $this;
  }

  public function limit(int $limit = 10, int $offset = 0): ISelectBuilder {
    if(!empty($this->limitSQL)){
      throw new Exception("You can use only one limit statement in SQL");
    }

    $this->limitSQL = " LIMIT {$limit} OFFSET {$offset} ";

    return $this;
  }

	public function __toString(){
    return $this->getSQL();
	}
}
