<?php

use System\Router;

use Domain\User\Controller as User;
use Domain\Budget\Controller as Budget;
use Domain\Category\Controller as Category;
use Domain\Transaction\Controller as Transaction;

try {

  include_once('init.php');

  $user = new User();
  $budget = new Budget();
  $category = new Category();
  $transaction = new Transaction();
  
  $router = new Router();

  $router->addRoute('GET', '/', $user, 'index');
  $router->addRoute('GET', '/budgets', $budget, 'index');
  $router->addRoute('GET', '/categories', $category, 'index');
  $router->addRoute('GET', '/transactions', $transaction, 'index');

  $router->addRoute('POST', '/categories/add', $category, 'addCategory');

  $method = $_SERVER['REQUEST_METHOD'];

  $uri = str_replace(BASE_URL, "", $_SERVER['REQUEST_URI']);

  $activeRoute = $router->match($method, $uri);

  if($activeRoute){

    $controller = $activeRoute['controller'];
    $controllerMethod = $activeRoute['callback'];

    echo call_user_func([$controller, $controllerMethod]);

  } else {

    echo "404 Not Found";

  }
}

catch(Throwable $error){
  echo "<pre>";
  print_r($error);
  echo "</pre>";
}
