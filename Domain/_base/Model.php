<?php

namespace Domain\_base;

use System\Database\Query;

abstract class Model {
  protected Query $query;
  protected string $table;
  protected string $key;

  public function __construct() {
    $this->query = new Query($this->table, $this->key);
  }

  public function getAll(): array {
    $sql = $this->query->select()->getSQL();

    return $this->query->fetchAll($sql);
  }

  public function getById(int $id): array {
    $sql = $this->query
      ->select()
      ->where($this->key, "=", $id)
      ->getSQL();

    return $this->query->fetch($sql);
  }

  public function add(array $params): int {
    $sql = $this->query
      ->insert($params)
      ->getSQL();

    print_r($sql);

    return $this->query->execute($sql);
  }
}
