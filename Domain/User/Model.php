<?php

namespace Domain\User;

use System\DBHelper;
use System\SelectBuilder;

use Domain\_base\Model as BaseModel;

class Model extends BaseModel {
  protected string $table = "users";
  protected string $key = "id";
}
