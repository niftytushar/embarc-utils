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
        var self = this;

        this.getMAR(function (modulesList) {
            self.mar = modulesList;

            // fill up modules
            fillDropDown2("#module", modulesList, "name", "id");

            $("#module").trigger("change");
        });

        $("#module").on("change", function () {
            self._onModuleChange($(this).val());
        });
    },

    mar: {},

    // when a module is changed
    _onModuleChange: function (module) {
        if (!module) return;

        fillDropDown("#alerts", this.mar[module].alerts, "name", "id");
        fillDropDown("#reminders", this.mar[module].reminders, "name", "id");
    },

    // get a list of modules with their respective alerts and reminders
    getMAR: function (callback) {
        var self = this;

        $.ajax({
            type: "GET",
            async: true,
            url: "/embarc-utils/php/main.php?util=anr&fx=getMAR",
            success: function (data) {
                try {
                    data = getJSONFromString(data);
                } catch (ex) {
                    console.log("Invalid list of alerts & reminders received from server");
                    return;
                }

                if (callback) callback.apply(self, [data]);
            }
        });
    }
};

/**
* Contributions
*
*
* jQuery
* URL: http://jquery.com/
* GitHub: https://github.com/jquery/jquery
*
* Bootstrap
* URL: http://getbootstrap.com/
* GitHub: https://github.com/twbs/bootstrap/
*
* select2.js
* URL: http://ivaynberg.github.io/select2/
* GitHub: https://github.com/ivaynberg/select2
*
* jQuery.validate
* URL: http://jqueryvalidation.org/
* GitHub: https://github.com/jzaefferer/jquery-validation
*/