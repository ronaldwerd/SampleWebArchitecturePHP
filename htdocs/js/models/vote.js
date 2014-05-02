AppMain.Models.Vote = Backbone.Model.extend({
    defaults: {
        id: 0,
        cityName: '',
        colorId: 0,
        voteCount: 0
    }
});

AppMain.Collections.Votes = Backbone.Collection.extend({
    model: AppMain.Models.Vote,
    url: "/service/votes",

    totalVotes: function() {

        var totalVotes = 0;

        this.each(function(v) {
            totalVotes += parseInt(v.get('voteCount'));
        });

        return totalVotes;
    }
});