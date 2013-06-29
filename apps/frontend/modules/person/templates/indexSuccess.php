<h1>Persons List</h1>

<div id="add"></div>
<div id="persons"></div>
<div id="person"></div>

<script type="text/template" id="header">
  <button class="new btn btn-success">New</button>
</script>

<script type="text/template" id="person-list-item">
  <a href='/person/<%= id %>'><%= fname %> <%= lname %></a> <i class="icon-pencil"></i>
</script>

<script type="text/template" id="person-details">
    <div>
        <label>First Name:</label>
        <input type="text" id="fname" name="fname" value="<%= fname %>" required/>
        <label>Last Name:</label>
        <input type="text" id="lname" name="lname" value="<%= lname %>" required/>
        <button class="save btn btn-primary">Save</button>
        <button class="delete btn btn-danger">Delete</button>
    </div>
</script>
