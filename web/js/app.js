// Models
window.Person = Backbone.Model.extend({
  urlRoot: "/api/person",
  defaults:{
    "id":null,
    "fname":"",
    "lname":""
    }
});

window.PersonCollection = Backbone.Collection.extend({
    model: Person,
    url: "/api/person",
    parse: function(response) {
      return response.persons;
    }
});

// Views
window.PersonListView = Backbone.View.extend({

    tagName:'ul',

    initialize:function () {
      this.model.bind("reset", this.render, this);
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

    render:function (eventName) {
        $(this.el).html(this.template(this.model.toJSON()));
        return this;
    }

});

window.PersonView = Backbone.View.extend({

    template:_.template($('#person-details').html()),

    render:function (eventName) {
        $(this.el).html(this.template(this.model.toJSON()));
        return this;
    }

});

// Router
var AppRouter = Backbone.Router.extend({

    routes:{
        "":"list",
        "persons/:id":"personDetails"
    },

    list:function () {
        this.personList = new PersonCollection();
        this.personListView = new PersonListView({model:this.personList});
        var that = this;
        this.personList.fetch({success:function() {
          $('#persons').html(that.personListView.render().el);
        }});
    },

    personDetails:function (id) {
        this.person = this.personList.get(id);
        this.personView = new PersonView({model:this.person});
        $('#person').html(this.personView.render().el);
    }
});

var app = new AppRouter();
Backbone.history.start();