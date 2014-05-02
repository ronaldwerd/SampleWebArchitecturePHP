AppMain.Models.Color = Backbone.Model.extend({
    defaults: {
        id: 0,
        colorName: ''
    }
});

AppMain.Collections.Colors = Backbone.Collection.extend({
    model: AppMain.Models.Color,
    url: "/service/colors"
});