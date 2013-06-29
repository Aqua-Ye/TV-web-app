<div class="navbar">
  <div class="navbar-inner">
    <a class="brand">Shows</a>
    <div class="pull-right">
      <span id="add">
      </span>
    </div>
  </div>
</div>

<div class="row-fluid">
  <div id="shows"></div>
</div>

<div id="show" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="showLabel" aria-hidden="true">
</div>

<script type="text/template" id="header">
  <a href="#show" role="button" class="new btn btn-success" data-toggle="modal">New</a>
</script>

<script type="text/template" id="show-list-item">
 <div id="s<%= id %>">
    <div class="span2">
      <img src="/uploads/images/<%= image %>" class="img-polaroid"></img>
    </div>
    <div class="span10">
      <a href='/show/show/id/<%= id %>'><h1><%= name %></h1></a>
      <p><%= storyline %></p>
      <a class="edit btn" href="#edit=<%= id %>">Edit</a>
      <a class="delete btn btn-danger">Delete</a>
    </div>
  </div>
</script>

<script type="text/template" id="show-details">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="showLabel">New Show</h3>
  </div>
  <div class="modal-body">
  <form class="form-horizontal">
    <div class="control-group">
      <label class="control-label" for="fname">Name</label>
      <div class="controls">
        <input type="text" name="name" id="name" placeholder="Name" value="<%= name %>"  required>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="creators">Creators</label>
      <div class="controls">
        <input type="text" name="creators" id="creators" placeholder="Creators" value="<%= creators %>">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="creators">Cast</label>
      <div class="controls">
        <input type="text" name="cast" id="cast" placeholder="Cast" value="<%= cast %>">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="genre_id">Genre</label>
      <div class="controls">
        <select id="genre_id" required>
        <?php foreach ($Genres as $Genre): ?>
          <option value="<?php echo $Genre->getId() ?>"><?php echo $Genre->getName() ?></option>
        <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="creators">Storyline</label>
      <div class="controls">
        <textarea name="storyline" id="storyline" required><%= storyline %></textarea>
      </div>
    </div>
  </form>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="save btn btn-primary">Save changes</button>
  </div>
</script>

<script src="/js/show.js"></script>