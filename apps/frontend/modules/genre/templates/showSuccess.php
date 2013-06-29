<div class="navbar">
  <div class="navbar-inner">
    <a class="brand">Genre: <?php echo $Genre->getName() ?></a>
  </div>
</div>

<?php include_partial('global/shows', array('Shows' => $Shows)) ?>

<a href="<?php echo url_for('genre/index') ?>">All Genres</a>