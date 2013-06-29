$(document).ready(function() {

  window.Person = Backbone.Model.extend({
    urlRoot: "/api/person",
    defaults: {
      "id" : null,
      "fname" : "",
      "lname" : "",
    }
  });

  window.PersonCollection = Backbone.Collection.extend({
    model: Person,
    url: "/api/person",
    parse: function(response) {
      return response.persons;
    }
  });

  window.PersonListView = Backbone.View.extend({

    tagName:'ul',

    initialize:function () {
      this.model.bind("reset", this.render, this);
      var self = this;
      this.model.bind("add", function (person) {
        $(self.el).append(new PersonListItemView({model:person}).render().el);
      });
    },

    render:function (eventName) {
      _.each(this.model.models, function (person) {
        $(this.el).append(new PersonListItemView({model:person}).render().el);
      }, this);
      return this;
    }

  });

  window.PersonListItemView = Backbone.View.extend({

    tagName:"li",

    template:_.template($('#person-list-item').html()),

    initialize:function () {
      this.model.bind("change", this.render, this);
      this.model.bind("destroy", this.close, this);
    },

    events:{
      "click .delete":"deletePerson"
    },

    render:function (eventName) {
      $(this.el).html(this.template(this.model.toJSON()));
      return this;
    },

    close:function () {
      $(this.el).unbind();
      $(this.el).remove();
    },

    deletePerson:function () {
      this.model.destroy({
        success:function () {
          alert('Person deleted successfully');
          window.history.back();
        }
      });
      return false;
    },

  });

  window.PersonView = Backbone.View.extend({

    template:_.template($('#person-details').html()),

    initialize:function () {
      this.model.bind("change", this.render, this);
    },

    render:function (eventName) {
      $(this.el).html(this.template(this.model.toJSON()));
      return this;
    },

    events: {
      "change input":"change",
      "click .save":"savePerson",
      "click .cancel":"cancelPerson",
    },

    savePerson:function () {
      this.model.set({
        fname:$('#fname').val(),
        lname:$('#lname').val(),
      });
      if (this.model.isNew()) {
        app.personList.create(this.model);
      } else {
        this.model.save();
      }
      return false;
    },

    cancelPerson:function () {
      $('#person').empty();
      app.navigate('', false);
      return false;
    },

    close:function () {
      $(this.el).unbind();
      $(this.el).empty();
    }

  });

  window.HeaderView = Backbone.View.extend({

    template: _.template($('#header').html()),

    initialize: function() {
      this.render();
    },

    render: function(eventName) {
      $(this.el).html(this.template());
      return this;
    },

    events: {
      "click .new" : "newPerson",
    },

    newPerson: function(event) {
      if (app.personView) app.personView.close();
      app.personView = new PersonView({model:new Person()});
      $('#person').html(app.personView.render().el);
      return false;
    },

  });

    // Router
  var AppRouter = Backbone.Router.extend({

    routes: {
      "" : "list",
      "id=:id" : "personDetails",
    },

    initialize:function () {
      $('#add').html(new HeaderView().render().el);
    },

    list:function () {
      this.personList = new PersonCollection();
      this.personListView = new PersonListView({model:this.personList});
      var self = this;
      this.personList.fetch({success: function() {
        self.personListView = new PersonListView({model:self.personList});
        $('#persons').html(self.personListView.render().el);
        if (self.requestedId) self.personDetails(self.requestedId);
      }});
    },

    personDetails:function (id) {
      if (this.personList) {
        this.person = this.personList.get(id);
        if (app.personView) app.personView.close();
        this.personView = new PersonView({model:this.person});
        $('#person').html(this.personView.render().el);
      } else {
        this.requestedId = id;
        this.list();
      }
    }

  });

  var app = new AppRouter();
  Backbone.history.start();

});