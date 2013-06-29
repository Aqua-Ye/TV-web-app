<h1>Shows</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Creators</th>
      <th>Cast</th>
      <th>Genre</th>
      <th>Image</th>
      <th>Storyline</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Shows as $Show): ?>
    <tr>
      <td><a href="<?php echo url_for('show/show?id='.$Show->getId()) ?>"><?php echo $Show->getId() ?></a></td>
      <td><?php echo $Show->getName() ?></td>
      <td><?php echo $Show->getCreators() ?></td>
      <td><?php echo $Show->getCast() ?></td>
      <td><?php echo $Show->getGenreId() ?></td>
      <td><?php echo $Show->getImage() ?></td>
      <td><?php echo $Show->getStoryline() ?></td>
      <td><?php echo $Show->getCreatedAt() ?></td>
      <td><?php echo $Show->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('show/new') ?>">New</a>
