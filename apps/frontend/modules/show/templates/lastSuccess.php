<h1>Last TV Shows</h1>
<span id="add"></span>
<div id="shows"></div>

<script type="text/template" id="header">
  <button class="new btn btn-success">New</button>
</script>

<script type="text/template" id="show-list-item">
  <span id="s<%= id %>">
    <img src="/uploads/images/<%= image %>"></img>
    <a href='/show/<%= id %>'><%= name %></a> <i class="icon-pencil edit"></i> <i class="icon-trash delete"></i>
    <p><%= storyline %></p>
  </span>
</script>

<script type="text/template" id="show-details">
  <form>
    <fieldset>
      <label>First Name:</label>
      <input type="text" id="fname" name="fname" value="<%= fname %>" required/>
      <label>Last Name:</label>
      <input type="text" id="lname" name="lname" value="<%= lname %>" required/>
      <button type="submit" class="save btn btn-primary">Save</button>
    </fieldset>
  </form>
</script>

<!-- <ul>
  <?php foreach ($Shows as $Show): ?>
  <li>
    <img src="/uploads/images/<?php echo $Show->getImage() ?>"></img>
    <a href="<?php echo url_for('show/show?id='.$Show->getId()) ?>"><?php echo $Show->getName() ?></a>
    <p><?php echo simple_format_text($Show->getStoryline()) ?></p>
  </li>
  <?php endforeach; ?>
</ul>
 -->