<h1>Genres</h1>

<ul>
  <?php foreach ($Genres as $Genre): ?>
  <li>
    <a href="<?php echo url_for('genre/show?id='.$Genre->getId()) ?>"><?php echo $Genre->getName() ?></a>
  </li>
  <?php endforeach; ?>
</ul>
