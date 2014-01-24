$(window).load(init);

function init() {
    switch (window.eu.id) {
        case "smtp_check":
            smtp_check.initialize();
            break;
    }
}

var smtp_check = {
    initialize: function () {
        var self = this;

        $("#smtpForm").validate({
            highlight: function (element, errorClass, validClass) {
                $(element).parent().addClass("has-error");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass("has-error");
            },
            submitHandler: function (form) {
                self.receive();

                return false;
            }
        });
    },

    // receive an email
    receive: function () {
        var jsdata = createObject(["smtpForm"]);

        $.ajax({
            type: "POST",
            async: true,
            url: "/embarc-utils/php/main.php?util=smtp&fx=sendMail",
            data: jsdata,
            success: function (data, textStatus, jqXHR) {
                // Request successful
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("unable to do something " + errorThrown);
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
* jQuery.validate
* URL: http://jqueryvalidation.org/
* GitHub: https://github.com/jzaefferer/jquery-validation
*/