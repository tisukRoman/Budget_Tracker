<?php

namespace System;

class Router {
    private $routes = [];

    public function get($path, $controller, $callback) {
      $this->addRoute("GET", $path, $controller, $callback);
    }

    public function post($path, $controller, $callback) {
      $this->addRoute("POST", $path, $controller, $callback);
    }

    public function put($path, $controller, $callback) {
      $this->addRoute("PUT", $path, $controller, $callback);
    }

    public function delete($path, $controller, $callback) {
      $this->addRoute("DELETE", $path, $controller, $callback);
    }

    public function addRoute($method, $path, $controller, $callback) {
      $this->routes[] = [
        'method' => strtoupper($method),
        'path' => $path,
        'controller' => $controller,
        'callback' => $callback,
      ];
    }

    public function resolvePath($method, $uri) {
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
