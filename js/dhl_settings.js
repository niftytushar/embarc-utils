function init() {
	$.ajax({
		type: "GET",
		async: true,
		url: "/courier/php/main.php?util=courier&fx=getSettings",
		success: function(data) {
			data = getJSONFromString(data);
			fillSettings(data);
		}
	});
}

function saveSettings() {
	var jsn = createObject(["settingsForm"]);
	$.ajax({
		type: "POST",
		async: true,
		data: {'pref': JSON.stringify(jsn)},
		url: "/courier/php/main.php?util=courier&fx=setSettings",
		success: function (data) {
		    if (data == "SUCCESS") {
		        $("#messages").append(
                    '<div class="alert alert-success fade in">\
			    <button type="button" class="close" data-dismiss="alert">&times;</button>\
			    <strong>Great!</strong> You have successfully saved all settings.\
		        </div>');
		    } else {
		        $("#messages").append(
                    '<div class="alert alert-error fade in">\
			    <button type="button" class="close" data-dismiss="alert">&times;</button>\
			    <strong>Oh snap!</strong> There was an while saving settings.\
		        </div>');
		    }
		    window.setTimeout(function () {
		        $(".alert").alert('close');
		    }, 10000);
		}
	});
}

function fillSettings(data) {
	var settingsFiller = new FormFiller(document.getElementById('settingsForm'), "");
	settingsFiller.fillData(data);
}