<?php

namespace Domain\Category;

use System\DBHelper;
use System\SelectBuilder;

use Domain\_base\Model as BaseModel;

class Model extends BaseModel {
  protected string $table = "categories";
  protected string $key = "id";
}
