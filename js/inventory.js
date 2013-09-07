$(window).load(init);

function init() {
    switch (location.pathname) {
        case "/embarc-utils/inventory/stock_in.php":
            stock_in.initialize();
            break;
    }
}

var stock_in = {
    initialize: function () {
    },

    getDefaults: function () {
        $.ajax({
            type: "GET",
            url: "",
            async: true,
            success: function (data) {
            }
        });
    }
};