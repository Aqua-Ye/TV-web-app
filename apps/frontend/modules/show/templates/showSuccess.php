<?php slot(
  'title',
  sprintf('%s', $Show->getName()))
?>

<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Show->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $Show->getName() ?></td>
    </tr>
    <tr>
      <th>Creators:</th>
      <td><?php echo $Show->getCreators() ?></td>
    </tr>
    <tr>
      <th>Cast:</th>
      <td><?php echo $Show->getCast() ?></td>
    </tr>
    <tr>
      <th>Genre:</th>
      <td><?php echo $Show->getGenreId() ?></td>
    </tr>
    <tr>
      <th>Image:</th>
      <td><?php echo $Show->getImage() ?></td>
    </tr>
    <tr>
      <th>Storyline:</th>
      <td><?php echo $Show->getStoryline() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $Show->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $Show->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('show/edit?id='.$Show->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('show/index') ?>">List</a>
