<?php

namespace System;

class Router {
    private $routes = [];

    public function addRoute($method, $path, $controller, $callback) {
      $this->routes[] = [
        'method' => strtoupper($method),
        'path' => $path,
        'controller' => $controller,
        'callback' => $callback,
      ];
    }

    public function match($method, $uri) {
      foreach ($this->routes as $route) {
        if ($route['method'] === strtoupper($method) && $this->matchPath($route['path'], $uri)) {
          return [
            "controller" => $route['controller'],
            "callback" => $route['callback']
          ];
        }
      }

      return null; // No matching route found
    }

    private function matchPath($pattern, $uri) {
      $pattern = '#^' . str_replace('/', '\/', $pattern) . '$#';
      return preg_match($pattern, $uri);
    }
}
