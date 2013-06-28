<h1>Persons List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Fname</th>
      <th>Lname</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Persons as $Person): ?>
    <tr>
      <td><a href="<?php echo url_for('person/show?id='.$Person->getId()) ?>"><?php echo $Person->getId() ?></a></td>
      <td><?php echo $Person->getFname() ?></td>
      <td><?php echo $Person->getLname() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('person/new') ?>">New</a>
