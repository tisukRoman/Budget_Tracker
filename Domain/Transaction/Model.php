<?php

namespace Domain\Transaction;

use Domain\_base\Model as BaseModel;

class Model extends BaseModel {
  protected string $table = "transactions";
  protected string $key = "id";

  public function getAll(): array {
    $sql = $this->query
      ->select([
          "transactions.id AS id", 
          "transactions.total AS total", 
          "categories.name AS category", 
          "budgets.name AS budget"
        ])
      ->join("categories", "id", "id")
      ->join("budgets", "id", "id")
      ->getSQL();

    return $this->query->fetchAll($sql);
  }
}
