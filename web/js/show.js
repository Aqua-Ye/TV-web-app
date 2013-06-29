$(document).ready(function() {

  window.Show = Backbone.Model.extend({
    urlRoot: "/api/show",
    defaults: {
      "id" : null,
      "name" : "",
      "creators" : "",
      "cast": "",
      "genre_id": null,
      "image": "",
      "storyline": "",
      "created_at": null,
      "updated_at": null,
    }
  });

  window.ShowCollection = Backbone.Collection.extend({
    model: Show,
    url: "/api/show",
    parse: function(response) {
      return response.shows;
    }
  });

  window.ShowListView = Backbone.View.extend({

    tagName:'ul',
    className:'unstyled',

    initialize:function () {
      this.model.bind("reset", this.render, this);
      var self = this;
      this.model.bind("add", function (show) {
        $(self.el).append(new ShowListItemView({model:show}).render().el);
      });
    },

    render:function (eventName) {
      _.each(this.model.models, function (show) {
        $(this.el).append(new ShowListItemView({model:show}).render().el);
      }, this);
      return this;
    },

  });

  window.ShowListItemView = Backbone.View.extend({

    tagName:"li",

    template:_.template($('#show-list-item').html()),

    initialize:function () {
      this.model.bind("change", this.render, this);
      this.model.bind("destroy", this.close, this);
    },

    events: {
      "click .delete" : "deleteShow",
    },

    render:function (eventName) {
      $(this.el).html(this.template(this.model.toJSON()));
      return this;
    },

    close:function () {
      $(this.el).unbind();
      $(this.el).remove();
    },

    deleteShow:function () {
      this.model.destroy({
        success:function () {
          alert('Show deleted successfully');
          window.history.back();
        }
      });
      return false;
    },

  });

  window.ShowView = Backbone.View.extend({

    template:_.template($('#show-details').html()),

    events: {
      "click .save" : "saveShow",
    },

    initialize:function () {
      this.model.bind("change", this.render, this);
    },

    render:function (eventName) {
      $(this.el).html(this.template(this.model.toJSON()));
      return this;
    },

    close:function () {
      $(this.el).unbind();
      $(this.el).empty();
    },

    saveShow:function () {
      this.model.set({
        name:$('#name').val(),
        creators:$('#creators').val(),
        cast:$('#cast').val(),
        genre_id:$('#genre_id').val(),
        storyline:$('#storyline').val(),
      });
      if (this.model.isNew()) {
        app.showList.create(this.model);
      } else {
        this.model.save();
      }
      $('#show').modal('hide');
      return false;
    },

  });

  window.HeaderView = Backbone.View.extend({

    template: _.template($('#header').html()),

    initialize: function() {
      this.render();
      $('#show').on('hide', function () {
        app.navigate('', false);
      })
    },

    render: function(eventName) {
      $(this.el).html(this.template());
      return this;
    },

    events: {
      "click .new" : "newShow",
    },

    newShow: function(event) {
      if (app.showView) app.showView.close();
      app.showView = new ShowView({model:new Show()});
      $('#show').html(app.showView.render().el);
      $('#newShowLabel').text('New Show');
      return true;
    },

  });

  // Router
  var AppRouter = Backbone.Router.extend({

    routes: {
      "" : "list",
      "edit=:id" : "editDetails",
    },

    initialize:function () {
      $('#add').html(new HeaderView().render().el);
    },

    list:function () {
      this.showList = new ShowCollection();
      this.showListView = new ShowListView({model:this.showList});
      var self = this;
      this.showList.fetch({success:function () {
        self.showListView = new ShowListView({model:self.showList});
        $('#shows').html(self.showListView.render().el);
        if (self.requestedId) self.editDetails(self.requestedId);
      }});
    },

    editDetails:function (id) {
      if (this.showList) {
        this.requestedId = null;
        this.show = this.showList.get(id);
        if (app.showView) app.showView.close();
        this.showView = new ShowView({model:this.show});
        $('#show').html(this.showView.render().el);
        $('#showLabel').text('Edit Show');
        $('#show').modal('show');
      } else {
        this.requestedId = id;
        this.list();
      }
    }

  });

  var app = new AppRouter();
  Backbone.history.start();

});