var AppMain = {

    Models:{},
    Collections:{},

    loadData: function() {

        var colors = new AppMain.Collections.Colors();

        colors.fetch({
            success: function() {

                var cycle = 'odd';

                colors.each(function(c) {

                    var trow = _.template('<tr class="<%= bgColor %>">'  +
                                          '<td><a href="#" data-cid="<%= cid %>" class="color_link"><%= colorName %></a><td class="vote_count"></td>' +
                                          '</tr>', {colorName: c.get('colorName'), cid: c.get('id'), bgColor: cycle});

                    $("#color_table tbody").append(trow);

                    if(cycle == 'odd') cycle = 'even'; else cycle = 'odd';
                });


                $('.color_link').click(function() {
                    AppMain.colorClick(this);
                });
            }
        })
    },

    colorClick: function(lnk) {

        var colorId = $(lnk).data('cid');
        var votes = new AppMain.Collections.Votes();

        var voteCell = $(lnk).parent().next().get(0);

        votes.url += "/color/" + colorId;

        votes.fetch({
            success: function() {
                $(voteCell).text(votes.totalVotes());
            }
        });
    },

    run: function() {
        this.loadData();
    }
};

$(document).ready(function() {
    AppMain.run();
});
