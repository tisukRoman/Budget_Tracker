<?php

namespace System\Database;

class Query {
  protected PDOHelper $pdoHelper;
  protected SelectBuilder $select;

  protected string $table;
  protected string $key;

  public function __construct(string $table, string $key) {
    $this->pdoHelper = PDOHelper::getInstance();
    $this->select = new SelectBuilder($table);

    $this->table = $table;
    $this->key = $key;
  }

  public function select(array $fields = ["*"]): SelectBuilder {
    return $this->select->fields($fields);
  }

  public function fetch(string $query, array $params = []) {
    return $this->pdoHelper->fetch($query, $params);
  }

  public function fetchAll(string $query, array $params = []) {
    return $this->pdoHelper->fetchAll($query, $params);
  }
}
