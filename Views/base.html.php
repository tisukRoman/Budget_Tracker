<!DOCTYPE html>

<html lang="en">
  <head>
    <title><?php echo $title ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/style.css" type="text/css" />
    <link rel="icon" href="<?php echo BASE_URL ?>/assets/favicon.png" type="image/x-icon">
  </head>

  <body>

    <div class="container">

      <header class="header">
        <a href="<?php echo BASE_URL ?>" class="header__logo">Трекер Бюджету</a>
        <button class="header__logout">Вийти</button>
      </header>

        <main class="home">

        <nav class="menu">
          <ul class="menu__list">
            <li class="menu__item">
              <a href="<?php echo BASE_URL ?>/transactions">
                Транзакції
              </a>
            </li>
            <li class="menu__item">
              <a href="<?php echo BASE_URL ?>/categories">
                Категорії
              </a>
            </li>
            <li class="menu__item">
              <a href="<?php echo BASE_URL ?>/budgets">
                Рахунки
              </a>
            </li>
          </ul>
        </nav>

        <h1 class="title"><?php echo $title ?></h1>

        <?php echo $content ?>

      </main>

    </div>

  </body>

</html>
