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
                                          '<td><a href="#"><%= colorName %></a><td>' +
                                          '</tr>', {colorName: c.get('colorName'), cid: 0, bgColor: cycle});

                    $("#color_table tbody").append(trow);

                    if(cycle == 'odd') cycle = 'even'; else cycle = 'odd';
                });

                console.log('rewind?');

                colors.each(function(c) {
                    console.log(c);
                });
            }
        })
    },

    run: function() {
        this.loadData();
    }
};

$(document).ready(function() {
    AppMain.run();
});
