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

        $("#saveStockButton").on('click', function () {
            self.saveStock();
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
                    $successMsg = $("#successMessage-1");
                
                if (strncmp(result, "SUCCESS", 7)) {
                    //hide error message and show success message
                    $errorMsg.hide();
                    $successMsg.show();

                    //set default values again
                    self.setDefaults();

                    //hide success message after 5 seconds
                    window.setTimeout(function () {
                        $successMsg.hide();
                    }, 5000);
                } else {
                    //show error message and hide success message
                    $successMsg.hide();
                    $errorMsg.show();
                }
            }
        });
    }
};