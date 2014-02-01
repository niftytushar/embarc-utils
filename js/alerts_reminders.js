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

        // fetch details of modules, alerts and reminders
        this.getMAR(function (modulesList) {
            self.mar = modulesList;

            // fill up modules
            fillDropDown2("#module", modulesList, "name", "id");

            $("#module").trigger("change");
        });

        $("#alerts,#reminders").select2();

        // handler on module change
        $("#module").on("change", function () {
            self._onModuleChange($(this).val());
        });

        // form validation and submit handler
        $("#scheduleForm").validate({
            highlight: function (element, errorClass, validClass) {
                $(element).parent().addClass("has-error");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass("has-error");
            },
            submitHandler: function (form) {
                // method to submit this form
                self.save();

                return false;
            },
            invalidHandler: function (ev, validator) {
                if (validator.numberOfInvalids()) {
                    $("#errorMessage-1").show();
                } else {
                    $("#errorMessage-1").hide();
                }
            }
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
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("unable to fetch list of modules, alerts and reminders " + errorThrown);
            }
        });
    },

    // save a schedule
    save: function () {
        // hide error & success messages
        $("#successMessage-1").hide();
        $("#errorMessage-1").hide();

        var jsdata = createObject(["scheduleForm"]);
        delete jsdata.module;
        
        jsdata.alerts = this.getBinDec_fromCSV(jsdata.alerts);
        jsdata.reminders = this.getBinDec_fromCSV(jsdata.reminders);
        
        $.ajax({
            type: "POST",
            async: true,
            data: jsdata,
            url: "/embarc-utils/php/main.php?util=anr&fx=save",
            success: function (data, textStatus, jqXHR) {
                if (data == "SUCCESS") {
                    $("#successMessage-1").show();
                } else {
                    $("#errorMessage-1").show();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("unable to save schedule " + errorThrown);
            }
        });

    },

    getBinDec_fromCSV: function (csvstr) {
        var temp = 0,
            i = 0;

        csvstr = csvstr.split(",");
        for (; i < csvstr.length; i++) {
            temp |= +csvstr[i];
        }

        return temp;
    },

    getCSV_fromBinDec: function () {
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