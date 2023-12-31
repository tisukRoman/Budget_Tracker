<?php

namespace Domain\_base;

use System\DBHelper;
use System\SelectBuilder;

abstract class Model {

  protected DBHelper $db;
  protected SelectBuilder $query;

  protected string $key = "id";
  protected string $table;

  public function __construct() {
    $this->query = new SelectBuilder($this->table);
    $this->db = DBHelper::getInstance();
  }

  public function getAll(){
    return $this->db->fetchAll(
      $this->query->getSQL()
    );
  }

  public function getById(int $id){
    return $this->db->fetch(
      $this->query->where($this->key, "=", ":{$this->key}")->getSQL(),
      [$this->key => $id]
    );
  }
}
