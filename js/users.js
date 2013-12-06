$(window).load(init);

function init() {
    switch (location.pathname) {
        case "/embarc-utils/users/users_add.php":
            user_add.initialize();
            break;

        case "/embarc-utils/users/users_list.php":
            user_list.initialize();
            break;
    }
}

var user_list = {
    initialize: function () {
    }
};

var user_add = {
    initialize: function () {
        var self = this;

        //initialize datepicker
        $('.datepicker').datepicker({
            'autoclose': true,
            'format': "dd/mm/yyyy",
            'startView': 2
        });

        // fill up list of modules
        this.getModules(function (modules) {
            fillDropDown2("#modules", modules, "name", "id");
        });
        
        //validate and submit form when done
        $("#userAddForm").validate({
            highlight: function (element, errorClass, validClass) {
                $(element).parent().addClass("has-error");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass("has-error");
            },
            submitHandler: function (form) {
                //set current state of submit button to loading
                $("#saveUserButton").button('loading');

                //call method to submit this form
                self.save();

                //reset state of submit button
                $("#saveUserButton").button('reset');

                //focus on serial number to start again quickly
                $("#name").focus();

                return false;
            }
        });
    },

    // save this user
    save: function () {
        $("#errorMessage-1").hide();
        $("#successMessage-1").hide();

        var jsdata = createObject(["userAddForm"]);
        jsn.dob = getFormattedDate(jsn.dob);
        
        $.ajax({
            type: "POST",
            async: true,
            data: jsdata,
            url: "/embarc-utils/php/main.php?util=user&fx=add",
            success: function (result) {
                debugger;
                if (result == "SUCCESS") {
                    $("#successMessage-1").show();

                    window.setTimeout(function () {
                        $("#successMessage-1").hide();
                    }, 8000);
                } else {
                    $("#errorMessage-1").show();
                }
            }
        });
    },

    // get list of modules
    getModules: function (callback) {
        var self = this;

        $.ajax({
            type: "GET",
            async: true,
            url: "/embarc-utils/php/main.php?util=misc&fx=listModules",
            success: function (data) {
                if (strncmp(data, "ERROR", 5)) {
                    alert("No modules allowed");
                } else {
                    data = getJSONFromString(data);
                    callback.apply(self, [data]);
                }
            }
        });
    },
};