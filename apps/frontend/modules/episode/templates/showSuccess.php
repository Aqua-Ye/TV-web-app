<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Episode->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $Episode->getName() ?></td>
    </tr>
    <tr>
      <th>Number:</th>
      <td><?php echo $Episode->getNumber() ?></td>
    </tr>
    <tr>
      <th>Season:</th>
      <td><?php echo $Episode->getSeason() ?></td>
    </tr>
    <tr>
      <th>Year:</th>
      <td><?php echo $Episode->getYear() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('episode/edit?id='.$Episode->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('episode/index') ?>">List</a>
