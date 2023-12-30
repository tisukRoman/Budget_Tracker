<?php

namespace Domain\Budget;

use System\Template;
use Domain\_base\Controller as BaseController;

class Controller extends BaseController {
  public function __construct() {
    $this->model = new Model();
  }

  public function index() {
    $budgets = $this->model->getAll();

    $this->title = 'Рахунки';
    $this->content = Template::render(__DIR__ . '/../../Views/budgets.html.php', [
      'budgets' => $budgets
    ]);

    return parent::render();
  }
}
