<h1>Episodes List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Number</th>
      <th>Season</th>
      <th>Year</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Episodes as $Episode): ?>
    <tr>
      <td><a href="<?php echo url_for('episode/show?id='.$Episode->getId()) ?>"><?php echo $Episode->getId() ?></a></td>
      <td><?php echo $Episode->getName() ?></td>
      <td><?php echo $Episode->getNumber() ?></td>
      <td><?php echo $Episode->getSeason() ?></td>
      <td><?php echo $Episode->getYear() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('episode/new') ?>">New</a>
