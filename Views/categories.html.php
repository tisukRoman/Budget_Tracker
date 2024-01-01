<table border="1">

    <thead>
      <tr>
        <th>Назва категорії</th>
      </tr>
    </thead>

    <tbody>

      <?php foreach($categories as $category): ?>

        <tr>
          <td><?php echo $category['name'] ?></td>
        </tr>

      <?php endforeach; ?>

    </tbody>

    <form method="POST" action="categories/add">
      <div class="form">
        <input class="input" name="name" placeholder="Назва категорії..." type="text" />
        <button type="submit">Додати Категорію</button>
      </div>
    </form>

</table>
