<div class="navbar">
  <div class="navbar-inner">
    <a class="brand">All Persons</a>
    <div class="pull-right">
      <span id="add"></span>
    </div>
  </div>
</div>

<div class="row-fluid">
  <div class="span4">
    <div id="persons"></div>
  </div>
  <div class="span8">
    <div id="person"></div>
  </div>
</div>

<script type="text/template" id="header">
  <button class="new btn btn-success">New</button>
</script>

<script type="text/template" id="person-list-item">
  <span id="p<%= id %>">
    <a href='#id=<%= id %>'><%= fname %> <%= lname %></a> <i class="icon-pencil edit"></i> <i class="icon-trash delete"></i>
  </span>
</script>

<script type="text/template" id="person-details">
  <form class="form-horizontal">
    <div class="control-group">
      <label class="control-label" for="fname">First Name</label>
      <div class="controls">
        <input type="text" name="fname" id="fname" placeholder="First Name" value="<%= fname %>"  required>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="lname">Last Name</label>
      <div class="controls">
        <input type="text" name="lname" id="lname" placeholder="Last Name" value="<%= lname %>" required>
      </div>
    </div>
    <div class="control-group">
      <div class="controls">
        <button type="submit" class="save btn btn-primary">Save</button>
        <a class="cancel btn">Cancel</a>
      </div>
    </div>
  </form>
</script>

<script src="/js/person.js"></script>