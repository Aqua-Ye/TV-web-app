<div class="navbar">
  <div class="navbar-inner">
    <a class="brand">All Genres</a>
  </div>
</div>

<ul>
  <?php foreach ($Genres as $Genre): ?>
  <li>
    <a href="<?php echo url_for('genre/show?id='.$Genre->getId()) ?>"><?php echo $Genre->getName() ?></a>
  </li>
  <?php endforeach; ?>
</ul>
