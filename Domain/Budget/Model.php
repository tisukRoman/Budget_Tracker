<?php

namespace Domain\Budget;

use System\DBHelper;
use System\SelectBuilder;

use Domain\_base\Model as BaseModel;

class Model extends BaseModel {
  protected string $table = "budgets";
  protected string $key = "id";
}
