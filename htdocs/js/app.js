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
                                          '<td><a href="#" data-cid="<%= cid %>" class="color_link"><%= colorName %></a><td class="vote_count" data-vote-count=""></td>' +
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

                var totalVotes = votes.totalVotes()

                $(voteCell).data('vote-count', totalVotes);
                $(voteCell).text(totalVotes);
                $(voteCell).humanizeNumber();
            }
        });
    },

    totalClick: function() {

        var totalVotes = 0;

        $('.vote_count').each(function() {

            var votes = parseInt($(this).data('vote-count'));

            if(!isNaN(votes)) {
                totalVotes += votes;
            }
        });

        $('#vote_total').text(totalVotes);
        $('#vote_total').humanizeNumber();
    },

    run: function() {
        this.loadData();

        $('#calculate_total').click(function() { AppMain.totalClick(); })
    }
};

$(document).ready(function() {
    AppMain.run();
});
