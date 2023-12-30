<table border="1">

    <thead>
      <tr>
        <th>Рахунок</th>
        <th>Баланс</th>
      </tr>
    </thead>

    <tbody>

      <?php foreach($budgets as $budget): ?>

        <tr>
          <td><?php echo $budget['name'] ?></td>
          <td><?php echo $budget['total'] ?></td>
        </tr>

      <?php endforeach; ?>

    </tbody>

</table>
