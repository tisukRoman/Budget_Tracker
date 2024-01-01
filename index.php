<?php

use Domain\User\Controller as UserController;
use Domain\Category\Controller as CategoryController;
use Domain\Budget\Controller as BudgetController;
use Domain\Transaction\Controller as TransactionController;

try {

  include_once('init.php');

  $uri = $_SERVER['REQUEST_URI'];

  $path = explode("/", $uri);
  $path = array_slice($path, 2);

  $user = new UserController();
  $category = new CategoryController();
  $budget = new BudgetController();
  $transaction = new TransactionController();
  

  if($path[0] == 'categories' and $path[1] == "add")
  {
    echo $category->addCategory();
  }

  elseif($path[0] === '')
  {
    echo $user->index();
  }
  elseif($path[0] === 'categories')
  {
    echo $category->index();
  }
  elseif($path[0] == 'budgets')
  {
    echo $budget->index();
  }
  elseif($path[0] == 'transactions')
  {
    echo $transaction->index();
  }

  else 
  {
    echo "404";
  }

}

catch(Throwable $error){
  echo "<pre>";
  print_r($error);
  echo "</pre>";
}
