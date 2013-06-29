<h1>Last TV Shows</h1>

<ul>
  <?php foreach ($Shows as $Show): ?>
  <li>
    <img src="/uploads/images/<?php echo $Show->getImage() ?>"></img>
    <a href="<?php echo url_for('show/show?id='.$Show->getId()) ?>"><?php echo $Show->getName() ?></a>
    <p><?php echo simple_format_text($Show->getStoryline()) ?></p>
  </li>
  <?php endforeach; ?>
</ul>

<a href="<?php echo url_for('show/new') ?>">New</a>
