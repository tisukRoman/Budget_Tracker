<?php

namespace System;

class Template {
  public static function render($pathToTemplate, $args = []): string {
    extract($args);

    ob_start();
    include($pathToTemplate);
    return ob_get_clean();
  }
}
