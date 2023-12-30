<?php

// php.ini

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// global constants

const BASE_URL = '/budget-tracker';

const DB_HOST = 'localhost';
const DB_NAME = 'budget-tracker';
const DB_USER = 'root';
const DB_PASS = 'root';


// classes autoloader

function autoloader($className){

  $path = str_replace('\\', '/', $className) . '.php';

  if(!file_exists($path)){
    $path = '../' . str_replace('\\', '/', $className) . '.php';
  }

  if(!file_exists($path)){
    print_r('Autoload fuck');
  }


  include_once($path);

}

spl_autoload_register('autoloader');
