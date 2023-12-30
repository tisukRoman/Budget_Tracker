<?php

namespace Domain\Transaction;

use System\Template;
use Domain\_base\Controller as BaseController;

class Controller extends BaseController {
  public function __construct() {
    $this->model = new Model();
  }

  public function index() {
    $transactions = $this->model->getAll();

    $this->title = 'Транзакції';
    $this->content = Template::render(__DIR__ . '/../../Views/transactions.html.php', [
      'transactions' => $transactions
    ]);

    return parent::render();
  }
}
