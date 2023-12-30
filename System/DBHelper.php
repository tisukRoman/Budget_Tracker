<?php

namespace System;

use PDO;

class DBHelper {
	public static DBHelper $instance;
	public static PDO $pdo;

	public function __construct(){
    self::$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
      PDO::ATTR_EMULATE_PREPARES => false 
    ]);
	}

  public static function getInstance(): self {
    if(!isset(self::$instance)) {
      self::$instance = new DBHelper();
    }

    return self::$instance;
  }

	public function fetch(string $query, array $params = []) : ?array{
		$query = self::$pdo->prepare($query);
		$query->execute($params);
		return $query->fetchAll();
	}

	public function fetchAll(string $query, array $params = []) : ?array{
		$query = self::$pdo->prepare($query);
		$query->execute($params);
		return $query->fetchAll();
	}
}
