<?php

namespace Domain\Category;

use System\Template;
use Domain\_base\Controller as BaseController;

class Controller extends BaseController {
  public function __construct() {
    $this->model = new Model();
  }

  public function index() {
    $categories = $this->model->getAll();

    $this->title = 'Категорії';
    $this->content = Template::render(__DIR__ . '/../../Views/categories.html.php', [
      'categories' => $categories
    ]);

    return parent::render();
  }

  public function addCategory() {
    $params = [
      'name' => (string) $_POST['name'],
      'userId' => 1
    ];

    $categoryId = $this->model->add($params);

    header("Location: " . BASE_URL . "/categories");
    exit();
  }
}
