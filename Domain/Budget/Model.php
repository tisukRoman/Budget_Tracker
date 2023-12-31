<?php

namespace Domain\Budget;

use Domain\_base\Model as BaseModel;

class Model extends BaseModel {
  protected string $table = "budgets";
  protected string $key = "id";
}
