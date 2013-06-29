<h1>Last TV Shows</h1>

<ul class="unstyled">
  <?php foreach ($Shows as $Show): ?>
  <li>
    <div class="span2">
      <img src="/uploads/images/<?php echo $Show->getImage() ?>" class="img-polaroid pull-left"></img>
    </div>
    <div class="span8">
      <a href="<?php echo url_for('show/show?id='.$Show->getId()) ?>"><h1><?php echo $Show->getName() ?></h1></a>
      <p><?php echo $Show->getStoryline() ?></p>
    </div>
  </li>
  <?php endforeach; ?>
</ul>
