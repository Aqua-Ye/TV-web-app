<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Person->getId() ?></td>
    </tr>
    <tr>
      <th>Fname:</th>
      <td><?php echo $Person->getFname() ?></td>
    </tr>
    <tr>
      <th>Lname:</th>
      <td><?php echo $Person->getLname() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('person/edit?id='.$Person->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('person/index') ?>">List</a>
