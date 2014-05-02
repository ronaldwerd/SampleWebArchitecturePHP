var AppMain = {

    Models:{},
    Collections:{},

    loadData: function() {

        var colors = new AppMain.Collections.Colors(); colors.fetch();

        colors.fetch({
            success: function() {

                var votes = new AppMain.Collections.Votes()

                votes.fetch({
                    success: function() {

                        colors.each(function(c) {
                            console.log(c);
                        });

                        console.log('rewind?');

                        colors.each(function(c) {
                            console.log(c);
                        });


                        console.log('Vote count: ' + votes.totalVotes());
                    }
                })
            }
        });
    },

    run: function() {
        this.loadData();
    }
};

$(document).ready(function(){
    AppMain.run();
});
