<?php

namespace System\Database\QueryBuilder;

abstract class QueryBuilder {
	protected string $table;
	protected array $fields;

	public function __construct(string $table){
		$this->table = $table;
	}

  public function fields(array $fields) {
    if(isset($fields)){
      $this->fields = $fields;
    }

    return $this;
  }

	public function __toString(){
    return $this->getSQL();
	}

  abstract public function getSQL(): string;
}
