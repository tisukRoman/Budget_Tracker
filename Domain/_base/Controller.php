<?php

namespace Domain\_base;

use System\Template;

class Controller {
  protected Model $model;
  protected string $title = "Заголовок";
  protected string $content = "Контент";

  public function render() {
    return Template::render(__DIR__ . '/../../Views/base.html.php', [
      'title' => $this->title,
      'content' => $this->content
    ]);
  }
}
