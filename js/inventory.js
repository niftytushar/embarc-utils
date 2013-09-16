$(window).load(init);

function init() {
    switch (location.pathname) {
        case "/embarc-utils/inventory/stock_in.php":
            stock_in.initialize();
            break;

        case "/embarc-utils/inventory/stock_out.php":
            stock_out.initialize();
            break;

        case "/embarc-utils/inventory/preferences.php":
            preferences.initialize();
            break;
    }
}

var stock_in = {
    initialize: function () {
        var self = this;

        //initialize datepicker
        $('.datepicker').datepicker({
            'autoclose': true,
            'format': "dd/mm/yyyy"
        });

        //add change listener on model drop down
        $("#model").on('change', function (ev) {
            self.fillModelDetails($(this).val());
        });

        //validate and submit form when done
        $("#stockInForm").validate({
            highlight: function (element, errorClass, validClass) {
                $(element).parent().addClass("has-error");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass("has-error");
            },
            submitHandler: function (form) {
                //call method to submit this form
                self.saveStock();

                //focus on serial number to start again quickly
                $("#serial").focus();
                return false;
            }
        });

        var $in_invoice = $("#in_invoice"),
            $serial = $("#serial");

        //set focus to invoice number by default
        $in_invoice.focus();

        //prevent form submit on enter press on invoice number (useful when scanned via barcode scanner) also set focus to serial number if required
        $($in_invoice).keypress(function (ev) {
            if (ev.which === 13) {
                ev.preventDefault();
                $serial.focus();
            }
        });

        //prevent form submit on enter press on serial number (useful when scanned via barcode scanner) also set focus to IMEI if required
        $($serial).keypress(function (ev) {
            if (ev.which === 13) {
                ev.preventDefault();
                $("#imei").focus();
            }
        });

        //fetch list of trackers from server
        this.getTrackersList();
    },

    getTrackersList: function () {
        var self = this;

        $.ajax({
            type: "GET",
            url: "/embarc-utils/php/main.php?util=inventory&fx=getTrackers",
            async: true,
            success: function (data) {
                data = getJSONFromString(data);
                
                //save list of trackers
                self.trackers = data;

                //fill trackers in model select drop down
                fillDropDown("#model", self.trackers, "model", "model");

                //set default values
                self.setDefaults();
            }
        });
    },

    fillModelDetails: function (model) {
        for (var i = 0; i < this.trackers.length; i++) {
            if (model == this.trackers[i].model) {
                $("#vendor").val(this.trackers[i].vendorName);
                $("#warranty").val(this.trackers[i].warranty);
            }
        }
    },

    defaults: {
        'serial': "",
        'imei': "",
        'warranty': "12",
        'model': "VT-60",
        'vendor': "Teltonika",
        'dateOfPurchase': "today",
        'invoice_no': ""
    },

    trackers: [],

    //set default values for each form field
    setDefaults: function () {
        $.each(this.defaults, function (key, value) {
            //set today's date
            if(key === "dateOfPurchase" && value === "today")
                $('.datepicker').datepicker('setDate', new Date());
            else
                //set all other values
                $("#" + key).val(value);
        });
    },

    saveStock: function () {
        var jsn = createObject(["stockInForm"]),
            self = this;
        dropElements(jsn, ["warranty", "vendor"]);
        jsn.dateOfPurchase = getFormattedDate(jsn.dateOfPurchase);
        
        $.ajax({
            type: "POST",
            url: "/embarc-utils/php/main.php?util=inventory&fx=saveStockItem",
            async: true,
            data: jsn,
            success: function (result) {
                var $errorMsg = $("#errorMessage-1"),
                    $successMsg = $("#successMessage-1"),
                    $imeiExistsMsg = $("#errorMessage-2");
                
                if (strncmp(result, "SUCCESS", 7)) {
                    //hide error message and show success message
                    $errorMsg.hide();
                    $imeiExistsMsg.hide();
                    $successMsg.show();

                    //clear quick fill fields
                    self.clearToQuickFill();

                    //hide success message after 5 seconds
                    window.setTimeout(function () {
                        $successMsg.hide();
                    }, 5000);
                } else if (strncmp(result, "IMEI_EXISTS", 11)) {
                    $successMsg.hide();
                    $errorMsg.hide();
                    $imeiExistsMsg.show();
                } else {
                    //show error message and hide success message
                    $successMsg.hide();
                    $imeiExistsMsg.hide();
                    $errorMsg.show();
                }
            }
        });
    },

    clearToQuickFill: function () {
        $("#imei,#serial").val("");
    }
};

var stock_out = {
    initialize: function () {
        var self = this;

        //initialize datepicker
        $('.datepicker').datepicker({
            'autoclose': true,
            'format': "dd/mm/yyyy"
        });

        var $out_invoice = $("#out_invoice"),
            $imei = $("#imei");

        //initially, set focus to invoice number
        $out_invoice.focus();

        $imei.on("blur", this.checkForItemInStock);

        $imei.keypress(function (ev) {
            if (ev.which === 13) {
                ev.preventDefault();
                $imei.blur();
            }
        });

        //validate and submit form when done
        $("#stockOutForm").validate({
            highlight: function (element, errorClass, validClass) {
                $(element).parent().addClass("has-error");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass("has-error");
            },
            submitHandler: function (form) {
                //call method to submit this form
                self.saveStockOut();

                //focus on serial number to start again quickly
                $imei.focus();
                return false;
            }
        });

        //get list of clients
        this.getClients();

        //fill in default values
        this.setDefaults();
    },

    checkForItemInStock: function () {
        var $errorMsg = $("#errorMessage-1"),
                    $imei_no_exist = $("#errorMessage-2"),
                    $successMsg = $("#successMessage-1");

        $.ajax({
            type: "GET",
            async: true,
            url: "/embarc-utils/php/main.php?util=inventory&fx=getItemInStock&prop=imei&val=" + $(this).val(),
            success: function (data) {
                if (strncmp(data, "ERROR", 5)) {
                    //show an error
                    $errorMsg.hide();
                    $imei_no_exist.show();
                    $successMsg.hide();

                    //clean up
                    $("#serial").val("");
                    $("#model").val("");
                    $("#id").val("");
                } else {
                    //hide the error message, if visible, or anyways
                    $errorMsg.hide();
                    $imei_no_exist.hide();
                    $successMsg.hide();

                    //fill it up
                    data = getJSONFromString(data);
                    $("#serial").val(data["serial"]);
                    $("#model").val(data["model"]);
                    $("#id").val(data["id"]);
                    
                    $("#stockOutForm").submit();
                }
            }
        });
    },

    getClients: function () {
        var self = this;

        $.ajax({
            type: "GET",
            url: "/embarc-utils/php/main.php?util=inventory&fx=getClients",
            async: true,
            success: function (data) {
                data = getJSONFromString(data);
                
                //fill clients list in client select drop down
                fillDropDown("#clientID", data, "name", "id");
            }
        });
    },

    defaults: {
        'serial': "",
        'imei': "",
        'out_warranty': "12",
        'dateOfSale': "today",
        'out_invoice_no': ""
    },

    //set default values for each form field
    setDefaults: function () {
        $.each(this.defaults, function (key, value) {
            //set today's date
            if (key === "dateOfSale" && value === "today")
                $('.datepicker').datepicker('setDate', new Date());
            else
                //set all other values
                $("#" + key).val(value);
        });
    },

    saveStockOut: function () {
        var jsn = createObject(["stockOutForm"]),
            self = this;
        dropElements(jsn, ["model", "serial"]);
        jsn.dateOfSale = getFormattedDate(jsn.dateOfSale);
        
        $.ajax({
            type: "POST",
            async: true,
            url: "/embarc-utils/php/main.php?util=inventory&fx=updateStockItem",
            data: jsn,
            success: function (result) {
                var $errorMsg = $("#errorMessage-1"),
                    $imei_no_exist = $("#errorMessage-2"),
                    $successMsg = $("#successMessage-1");

                if (strncmp(result, "SUCCESS", 7)) {
                    //hide error message and show success message
                    $errorMsg.hide();
                    $imei_no_exist.hide();
                    $successMsg.show();

                    //hide success message after 5 seconds
                    window.setTimeout(function () {
                        $successMsg.hide();
                    }, 5000);

                    //clear quick fill fields
                    self.clearToQuickFill();
                } else if (strncmp(result, "IMEI_NOT_STOCK", 14)) {
                    //show message that IMEI number does not exist
                    $errorMsg.hide();
                    $imei_no_exist.show();
                    $successMsg.hide();
                } else {
                    //an error occured - dunno what?
                    $errorMsg.show();
                    $imei_no_exist.hide();
                    $successMsg.hide();
                }
            }
        });
    },

    clearToQuickFill: function () {
        $("#imei,#serial,#model").val("");
    }
};

var preferences = {
    initialize: function () {
        stock_in.getTrackersList.apply(this);
    },

    trackers: [],

    setDefaults: function () {
    }
};