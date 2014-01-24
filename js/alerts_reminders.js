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
    },


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