<?php

namespace System\Database\QueryBuilder;

class SelectBuilder extends QueryBuilder {
  protected array $fields = ["*"];

  protected string $joinSQL = "";
  protected string $whereSQL = "";
  protected string $orderSQL = "";
  protected string $limitSQL = "";

  public function getSQL(): string {
    $fields = implode(", ", $this->fields);

    return "
      SELECT {$fields} FROM {$this->table} 
      {$this->joinSQL} 
      {$this->whereSQL} 
      {$this->orderSQL} 
      {$this->limitSQL}
    ";
  }

  public function where(string $field, string $operator, string $value): SelectBuilder {
    if(!isset($field) || !isset($operator)){
      throw new Exception("You must specify all the variables");
    }

    empty($this->whereSQL)
      ? $this->whereSQL = " WHERE {$field} {$operator} {$value} "
      : $this->whereSQL .= " AND {$field} {$operator} {$value} ";

    return $this;
  }

  public function orderBy(string $field, string $order = "ASC"): SelectBuilder {
    empty($this->orderSQL) 
      ? $this->orderSQL = " ORDER BY {$field} {$order} "
      : $this->orderSQL .= ", {$field} {$order} ";

    return $this;
  }

  public function limit(int $limit = 10, int $offset = 0): SelectBuilder {
    if(!empty($this->limitSQL)){
      throw new Exception("You can use only one limit statement in SQL");
    }

    $this->limitSQL = " LIMIT {$limit} OFFSET {$offset} ";

    return $this;
  }

  public function join(string $table, string $foreignKey, string $primaryKey): SelectBuilder {
    $this->joinSQL .= " JOIN {$table} ON {$this->table}.{$foreignKey} = {$table}.{$primaryKey} ";

    return $this;
  }
}
