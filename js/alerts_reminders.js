$(window).load(init);

function init() {
    switch (window.eu.id) {
        case "aNr_schedule":
            schedule.initialize();
            break;
    }
}

var schedule = {
    initialize: function () {
        this.getModules(function (modulesList) {
            fillDropDown2("#module", modulesList, "name", "id");
        });
    },

    // get list of modules
    getModules: function (callback) {
        var self = this;

        $.ajax({
            type: "GET",
            async: true,
            url: "/embarc-utils/php/main.php?util=misc&fx=getModules",
            success: function (data) {
                try {
                    data = getJSONFromString(data);
                } catch (ex) {
                    console.log("Invalid list of modules received from server");
                    return;
                }

                callback.apply(self, [data]);
            }
        });
    }
};