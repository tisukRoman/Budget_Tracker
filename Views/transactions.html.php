<table border="1">

    <thead>
      <tr>
        <th>Сума</th>
        <th>Категорія</th>
        <th>Бюджет</th>
      </tr>
    </thead>

    <tbody>

      <?php foreach($transactions as $transaction): ?>

        <tr>
          <td><?php echo $transaction['total'] ?></td>
          <td><?php echo $transaction['category'] ?></td>
          <td><?php echo $transaction['budget'] ?></td>
        </tr>

      <?php endforeach; ?>

    </tbody>

</table>
