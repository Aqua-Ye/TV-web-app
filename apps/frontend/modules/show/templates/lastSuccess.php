<h1>Last TV Shows</h1>

<ul id="last" class="unstyled">
  <?php foreach ($Shows as $Show): ?>
  <li>
    <div class="row-fluid img-polaroid">
    <div class="span2">
      <?php if ($Show->getImage()) { ?>
        <img src="/uploads/images/<?php echo $Show->getImage() ?>" class="img-polaroid pull-left"></img>
      <?php } else { ?>
        <img src="http://placehold.it/214x317" class="img-polaroid pull-left"></img>
      <?php } ?>
    </div>
    <div class="span8">
      <a href="<?php echo url_for('show/show?id='.$Show->getId()) ?>"><h2><?php echo $Show->getName() ?></h2></a>
      <p><?php echo $Show->getStoryline() ?></p>
    </div>
    </div>
  </li>
  <?php endforeach; ?>
</ul>
