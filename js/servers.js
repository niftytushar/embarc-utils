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
                if(self.doReset) form.reset();

                //focus on company to start again quickly
                $("#company").focus();

                return false;
            }
        });
    },

    doReset: true,

    //save a new server
    save: function () {
        //hide error message if shown already
        $("#errorMessage-1").hide();

        var jsdata = createObject(["serverAddForm"]);
        jsdata.url = "http://" + jsdata.url;

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
                    self.doReset = true;
                } else {
                    self.doReset = false;
                    $("#errorMessage-1").show();
                }
            }
        });
    }
};

var server_list = {
    initialize: function () {
        var self = this;

        //get list of servers and display
        this.get(this.printList);
    },

    get: function (callback) {
        var self = this;

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
                
                if (callback) callback.apply(self, [data]);
            }
        });
    },

    printList: function (serversList) {
        for (var i = 0, l = serversList.length; i < l; i++) {
            this.addRow(serversList[i]);
        }
    },

    //update server row
    updateRow: function ($row, statusObject) {
        var totalProcesses = getObjectLength(statusObject.process || ""),
            stoppedProcesses = this.checkProceses(statusObject.process || ""),
            $left_status = $row.find(".left_status"),
            showNonWorkingProcesses = function (html) {
                createElement("<div/>", $left_status, { 'class': "col-lg-2", 'html': html });
            };

        //remove working and part working options
        $row.find(".panel-heading").removeClass("panel-heading-working");
        $row.find(".panel-heading").removeClass("panel-heading-partworking");

        //clean left status column
        $left_status.html("");
        
        if (totalProcesses == stoppedProcesses.count && stoppedProcesses.count > 0) {
            //default is red

            //show non working processes
            showNonWorkingProcesses(stoppedProcesses.html);
        } else if (stoppedProcesses.count > 0 && totalProcesses != stoppedProcesses.count) {
            //color it amber
            $row.find(".panel-heading").addClass("panel-heading-partworking");

            //show non working processes
            showNonWorkingProcesses(stoppedProcesses.html);
        } else if (totalProcesses > 0 && stoppedProcesses.count == 0) {
            //calculate Disk and Memory usage
            var diskUsage = this.getPrimaryDiskUsage(statusObject.disk),
                memoryUsage = this.getPrimaryMemoryUsage(statusObject.mem);

            if (diskUsage > 80 || memoryUsage > 80) {
                //color it amber
                $row.find(".panel-heading").addClass("panel-heading-partworking");
            } else {
                //color it green
                $row.find(".panel-heading").addClass("panel-heading-working");
            }

            //show HDD and RAM status
            createElement("<div/>", $left_status, { 'class': "col-lg-1", 'html': '<i class="icon-hdd" title="Disk Usage" style="font-size:20px;"></i><span>&nbsp;' + diskUsage + '%</span>' });
            createElement("<div/>", $left_status, { 'class': "col-lg-1", 'html': '<i class="icon-tasks" title="Memory Usage" style="font-size:19px;"></i><span>&nbsp;' + memoryUsage + '%</span>' });
        } else {
            //show error message
            createElement("<div/>", $left_status, { 'class': "col-lg-2", 'html': "unable to connect" });
        }
    },

    //create a server row
    createRow: function (details) {
        var panel = createElement("<div/>", null, { 'class': "panel panel-default" });
        var panelHeading = createElement("<div/>", panel, { 'class': "panel-heading panel-heading-notworking" });
        var panelTitle = createElement("<h4/>", panelHeading, { 'class': "panel-title" });
        var row = createElement("<div/>", panelTitle, { 'class': "row" });

        var leftCover = createElement("<div/>", row, {'class': "left_status"});
        var col1 = createElement("<div/>", leftCover, { 'class': "col-lg-2", 'html': "" });

        var col2 = createElement("<div/>", row, { 'class': "col-lg-3", 'html': details.company });
        var col3 = createElement("<div/>", row, { 'class': "col-lg-2", 'html': '<code>' + details.ip_address + '</code>' });
        var col4 = createElement("<div/>", row, { 'class': "col-lg-2", 'html': '<code>Copy password </code><input type="hidden" id="root_pass">' });
        var col5 = createElement("<div/>", row, { 'class': "col-lg-2", 'html': '<a href="' + details.url + '" target="_blank">' + details.url + '</a>' });
        var col6 = createElement("<div/>", row, { 'class': "col-lg-1", 'html': '<button type="button" class="close" aria-hidden="true" data-toggle="collapse" data-target="#col' + details.id + '"><i class="icon-chevron-sign-down" style="font-size:15px;"></i></button><button type="button" class="close" aria-hidden="true"><i class="icon-refresh" style="font-size:15px;"></i>&nbsp;</button>' });

        var panelCollapse = createElement("<div/>", panel, { 'class': "panel-collapse collapse", 'id': "col" + details.id });
        var panelBody = createElement("<div/>", panelCollapse, { 'class': "panel-body", 'html': "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean a nisi a erat laoreet blandit. Fusce dictum suscipit purus ut euismod. In orci sem, tincidunt hendrerit libero quis, lobortis vehicula massa. Phasellus convallis dictum urna at aliquet. Aenean fringilla volutpat odio sed pulvinar." });

        return panel;
    },

    //add a server row
    addRow: function (details) {
        var $row = this.createRow(details);
        $("#workingServersList").append($row);

        this.getServerStatus($row, details.ip_address, this.updateRow);
    },

    //check if all processes are working or not
    checkProceses: function (proc) {
        var result = { count: 0, html: "" };

        if (!result) return result;

        $.each(proc, function (key, value) {
            if (value == -1) {
                result.count++;
                result.html += '<span class="badge">' + key.substr(0, 1) + '</span> ';
            }
        });

        return result;
    },

    //get main memory usage
    getPrimaryMemoryUsage: function (mems) {
        for (var i = 0, l = mems.length; i < l; i++) {
            if (mems[i][0] == "-/+") {//match -/+
                return Math.floor((+mems[i][2] / (+mems[i][2] + +mems[i][3])) * 100);
            }
        }

        return "∞";
    },

    //get usage of /root disk
    getPrimaryDiskUsage: function (disks) {
        for (var i = 0, l = disks.length; i < l; i++) {
            if (disks[i][5] == "/") {//check for root partition
                //return usage percent
                return parseInt(disks[i][4], 10);
            }
        }

        return "∞";
    },

    //get status of server
    getServerStatus: function ($row, ip, callback) {
        var self = this;

        $.ajax({
            type: "GET",
            async: true,
            url: "/embarc-utils/php/main.php?util=servers&fx=status&ip=" + ip,
            success: function (result) {
                try {
                    result = getJSONFromString(result);
                } catch (ex) {
                    console.log("server " + ip + " not working");
                    result = "";
                }

                if (callback) callback.apply(self, [$row, result]);
            }
        });
    }
};