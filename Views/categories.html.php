<table border="1">

    <thead>
      <tr>
        <th>Назва категорії:</th>
      </tr>
    </thead>

    <tbody>

      <?php foreach($categories as $category): ?>

        <tr>
          <td><?php echo $category['name'] ?></td>
        </tr>

      <?php endforeach; ?>

    </tbody>

</table>
