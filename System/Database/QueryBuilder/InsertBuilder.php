<?php

namespace System\Database\QueryBuilder;

class InsertBuilder extends QueryBuilder {

  public function getSQL(): string {
    if(!isset($this->fields)){
      throw new Exception("Fields and Value must be provided");
    }

    return "
      INSERT INTO {$this->table} ({$this->getKeysSQL()})
      VALUES ({$this->getValuesSQL()});
    ";
  }

  protected function getKeysSQL(): string {
    return implode(", ", array_keys($this->fields));
  }
  
  protected function getValuesSQL(): string {
    $values = array_values($this->fields);

    $values = array_map(function($value){
      return is_string($value)
        ? "'{$value}'"
        : $value;
    }, $values);

    return implode(", ",  $values);
  }
}
