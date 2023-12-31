<?php

namespace Domain\User;

use System\Template;
use Domain\_base\Controller as BaseController;

class Controller extends BaseController {
  public function __construct() {
    $this->model = new Model();
  }

  public function index() {
    $user = $this->model->getById(1);

    $this->title = 'Профіль';
    $this->content = Template::render(__DIR__ . '/../../Views/home.html.php', [
      'user' => $user
    ]);

    return parent::render();
  }
}
