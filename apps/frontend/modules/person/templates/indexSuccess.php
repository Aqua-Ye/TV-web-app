<h1>Persons List</h1>

<div id="persons"></div>
<div id="person"></div>

<script type="text/template" id="person-list-item">
  <a href='/person/<%= id %>'><%= fname %> <%= lname %></a> <i class="icon-pencil"></i>
</script>

<script type="text/template" id="person-details">
    <div>
        <label>Id:</label>
        <input type="text" id="wineId" name="id" value="<%= id %>" disabled />
        <label>Name:</label>
        <input type="text" id="name" name="name" value="<%= name %>" required/>
    </div>
</script>
