$(window).load(init);

function init() {
    switch (location.pathname) {
        case "/embarc-utils/servers/server_add.php":
            server_add.initialize();
            break;

        case "/embarc-utils/servers/server_list.php":
            server_list.initialize();
            break;
    }
}

var server_hosting_locations = {
    "1": "esecuredata",
    "2": "Customer Location"
};

var server_add = {
    initialize: function () {
        var self = this;

        //focus on company to start quickly
        $("#company").focus();

        //fill list of countries
        fillDropDown2("#country", countriesMap, "name", null);

        //fill hosting locations
        fillDropDown2("#hosted_at", server_hosting_locations, null, null);

        //validate and submit form when done
        $("#serverAddForm").validate({
            highlight: function (element, errorClass, validClass) {
                $(element).parent().addClass("has-error");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass("has-error");
            },
            submitHandler: function (form) {
                //set current state of submit button to loading
                $("#saveServerButton").button('loading');

                //call method to submit this form
                self.save();

                //reset state of submit button
                $("#saveServerButton").button('reset');

                //clean form for next filling
                form.reset();

                //focus on company to start again quickly
                $("#company").focus();

                return false;
            }
        });
    },

    //save a new server
    save: function () {
        //hide error message if shown already
        $("#errorMessage-1").hide();

        var jsdata = createObject(["serverAddForm"]);

        $.ajax({
            type: "POST",
            async: true,
            data: jsdata,
            url: "/embarc-utils/php/main.php?util=servers&fx=add",
            success: function (result) {
                if (strncmp(result, "SUCCESS", 7)) {
                    $("#successMessage-1").show();
                    window.setTimeout(function () {
                        $("#successMessage-1").hide();
                    }, 5000);
                } else {
                    $("#errorMessage-1").show();
                }
            }
        });
    }
};

var server_list = {
    initialize: function () {
        this.get();

        this.addRow();
    },

    get: function (callback) {
        $.ajax({
            type: "GET",
            async: true,
            url: "/embarc-utils/php/main.php?util=servers&fx=list",
            success: function (data) {
                try {
                    data = getJSONFromString(data);
                } catch (ex) {
                    console.log("no server available");
                    return;
                }
                
                if (callback) callback(data);
            }
        });
    },

    updateRow: function (row, details) {
        debugger;
    },

    createRow: function (details) {
        var panel = createElement("<div/>", null, { 'class': "panel panel-default" });
        var panelHeading = createElement("<div/>", panel, { 'class': "panel-heading panel-heading-notworking" });
        var panelTitle = createElement("<h4/>", panelHeading, { 'class': "panel-title" });
        var row = createElement("<div/>", panelTitle, { 'class': "row" });
        //var accordionToggle = createElement("<a/>", row, { 'class': "accordion-toggle", 'data-toggle': "collapse", 'href': "#col1" });
        var col1 = createElement("<div/>", row, { 'class': "col-lg-2", 'html': '<span class="badge">u</span> <span class="badge">f</span> <span class="badge">m</span> <span class="badge">g</span> <span class="badge">r</span>' });
        var col2 = createElement("<div/>", row, { 'class': "col-lg-3", 'html': 'Embarc Information Technologies Pvt. Ltd.' });
        var col3 = createElement("<div/>", row, { 'class': "col-lg-2", 'html': '<code>71.19.240.175</code>' });
        var col4 = createElement("<div/>", row, { 'class': "col-lg-2", 'html': '<code>Copy password </code><input type="hidden" id="root_pass">' });
        var col5 = createElement("<div/>", row, { 'class': "col-lg-2", 'html': '<a href="http://trackv4.findnsecure.com" target="_blank" onclick="alert(\"hi\");">http://trackv4.findnsecure.com</a>' });
        var col6 = createElement("<div/>", row, { 'class': "col-lg-1", 'html': '<button type="button" class="close" aria-hidden="true" data-toggle="collapse" data-target="#col1"><i class="icon-chevron-sign-down" style="font-size:15px;"></i></button><button type="button" class="close" aria-hidden="true"><i class="icon-refresh" style="font-size:15px;"></i>&nbsp;</button>' });

        var panelCollapse = createElement("<div/>", panel, { 'class': "panel-collapse collapse", 'id': "col1" });
        var panelBody = createElement("<div/>", panelCollapse, { 'class': "panel-body", 'html': "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean a nisi a erat laoreet blandit. Fusce dictum suscipit purus ut euismod. In orci sem, tincidunt hendrerit libero quis, lobortis vehicula massa. Phasellus convallis dictum urna at aliquet. Aenean fringilla volutpat odio sed pulvinar." });

        return panel;
    },

    addRow: function () {
        var $row = this.createRow();
        $("#workingServersList").append($row);

        this.getServerStatus("71.19.240.175", function (status) {
            
        });
    },

    getServerStatus: function (ip, callback) {
        $.ajax({
            type: "GET",
            async: true,
            url: "/embarc-utils/php/main.php?util=servers&fx=status&ip=" + ip,
            success: function (result) {
                try {
                    result = getJSONFromString(result);
                } catch (ex) {
                    console.log("server not working");
                    return;
                }

                if (callback) callback(result);
            }
        });
    }
};