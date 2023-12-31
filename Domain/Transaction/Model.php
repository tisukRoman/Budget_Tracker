<?php

namespace Domain\Transaction;

use System\DBHelper;
use System\SelectBuilder;

use Domain\_base\Model as BaseModel;

class Model extends BaseModel {
  protected string $table = "transactions";
  protected string $key = "id";

  public function getAll(){
    return $this->db->fetchAll(
      $this->query
        ->join("categories", "id", "id")
        ->join("budgets", "id", "id")
        ->fields([
          "transactions.id AS id", 
          "transactions.total AS total", 
          "categories.name AS category", 
          "budgets.name AS budget"
        ])->getSQL(),
    );
  }
}
