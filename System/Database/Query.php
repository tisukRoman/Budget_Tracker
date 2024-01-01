<?php

namespace System\Database;

use System\Database\QueryBuilder\SelectBuilder;
use System\Database\QueryBuilder\InsertBuilder;

class Query {
  protected PDOHelper $pdoHelper;

  protected SelectBuilder $select;
  protected InsertBuilder $insert;

  protected string $table;
  protected string $key;

  public function __construct(string $table, string $key) {
    $this->pdoHelper = PDOHelper::getInstance();

    $this->select = new SelectBuilder($table);
    $this->insert = new InsertBuilder($table);

    $this->table = $table;
    $this->key = $key;
  }

  public function select(array $fields = ["*"]): SelectBuilder {
    return $this->select->fields($fields);
  }
  public function insert(array $fields): InsertBuilder {
    return $this->insert->fields($fields);
  }

  public function fetch(string $query, array $params = []): array {
    return $this->pdoHelper->fetch($query, $params);
  }

  public function fetchAll(string $query, array $params = []): array {
    return $this->pdoHelper->fetchAll($query, $params);
  }

  public function execute(string $query, array $params = []): bool {
    return $this->pdoHelper->execute($query, $params);
  }
}
