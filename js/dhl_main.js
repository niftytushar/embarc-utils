/*
* dhl_main.js - 1.0.2
* All JavaScript methods relating to main page of DHL courier system
*
* 12-Aug-2013 Tushar Agarwal niftytushar@gmail.com
* Bug Fixes: #2
* 
*/
var types = [
    { 'name': 'Document', 'value': 'DOC' },
    { 'name': 'Non-Document', 'value': 'NDOC' }
];

var typesMapper = {
    "DOC": "Document",
    "DOCMUL": "Document (Multiplied)",
    "NDOC": "Non-Document",
    "NDOCMUL": "Non-Document (Multiplied)"
};
var preferences = null;

function init() {
    //Fill type
	var typeDDN = document.getElementById("type");
    dropDownFiller(typeDDN, types, "name", "value");
	typeDDN.value = "NDOC";

    //Fill countries
    $.ajax({
        type: "GET",
        async: true,
        url: "/courier/php/main.php?util=courier&fx=getCountries",
        success: function (data) {
            data = getJSONFromString(data);
            dropDownFiller(document.getElementById("country"), data, "name", "code");
        }
    });

    //Get Settings
    $.ajax({
        type: "GET",
        async: true,
        url: "/courier/php/main.php?util=courier&fx=getSettings",
        success: function (data) {
            preferences = getJSONFromString(data);
        }
    });
}

function calculate() {
    var jsn = createObject(["packageDetailsForm"]);
    $.ajax({
        type: "POST",
        async: true,
        data: jsn,
        url: "/courier/php/main.php?util=courier&fx=dhlCalculate",
        success: function (data) {
            data = getJSONFromString(data);
            var resultEl = document.getElementById("result");
            resultEl.innerHTML = "";

            for (var i = 0; i < data.length; i++) {
                if (i == 1) append = "alt";
                var result = data[i];

                result.price = parseFloat(result.price);

                resultEl.innerHTML += "Weight: <strong>" + result.weight + "</strong> kgs<br />";

                //fill computed result
                resultEl.innerHTML += "The Best Price for this package of type <strong>" + typesMapper[result.type] + "</strong> is <strong>₹" + result.price + "</strong> using DHL courier, Account Number <strong>" + result.account + "</strong>.";

                //show additional charges
                resultEl.innerHTML += showAdditionalCharges(result.price);

                //show final price
                var totalPrice = result.price + parseFloat(getFuelSurcharge(result.price)) + parseFloat(getClearanceCost(result.price)) + parseFloat(getMiscCharges(result.price));
                resultEl.innerHTML += showFinalPrice(totalPrice);

                resultEl.innerHTML += "<br />";
                //document.getElementById("altResult").innerHTML = "Increase the weight of the package to " + result.weight + "kgs. This " + typesMapper[result.type] + " type package will cost ₹" + result.price + " using DHL courier, Account Number " + result.account;
            }

        }
    });
}

function showAdditionalCharges(price) {
    var str = "<table class='table'>\
            <thead>\
                <tr>\
                    <th>Charge</th>\
                    <th>Rate</th>\
                    <th>Price @ " + price + "</th>\
                </tr>\
            </thead>\
    <tbody>";

    str += '<tr>\
                <td style="min-width: 25%;">Fuel Surcharge</td>\
                <td>' + preferences.fuelSurcharge + '%</td>\
                <td>' + getFuelSurcharge(price) + '</td>\
            </tr>';
    str += '<tr>\
                <td style="min-width: 25%;">Miscellaneous</td>\
                <td>' + preferences.misc + '%</td>\
                <td>' + getMiscCharges(price) + '</td>\
            </tr>';
    str += '<tr>\
                <td style="min-width: 25%;">Clearance Cost</td>\
                <td>₹' + preferences.clearanceCost + '</td>\
                <td>' + getClearanceCost(price) + '</td>\
            </tr>';
    str += '</tbody>\
        </table>';

    return str;
}

function showFinalPrice(price) {

    //converting all values to float - convenience
    preferences.handlingCharges_USD = parseFloat(preferences.handlingCharges_USD),
    preferences.handlingCharges_EUR = parseFloat(preferences.handlingCharges_EUR),
    preferences.minBilling_USD = parseFloat(preferences.minBilling_USD),
    preferences.minBilling_EUR = parseFloat(preferences.minBilling_EUR);

    /*
    * Fix #1: Removed charges in INR
    * Requestd by shailendra.bansal@findnsecure.com on August 1st, 2013
    *
    * To display charges in INR again, include the following line:
    * '<div class="span4 breadcrumb">₹' + price.toFixed(2) + '</div>'
    *
    * Fix #2: Final price has been split into two, Handling Charges & Freight Charges
    *
    * Note: Final Total Price is not displayed, as indicated via email communication with shailendra.bansal@findnsecure.com on August 1st, 2013
    */
    var handlingChargesRow = '<div class="row-fluid align_center">\
                <div class="span4 breadcrumb">Handling Charges</div>\
                <div class="span4 breadcrumb">$' + preferences.handlingCharges_USD + '</div>\
                <div class="span4 breadcrumb">&euro;' + preferences.handlingCharges_EUR + '</div>\
            </div>';
    var freightCharge_USD = Math.ceil(parseFloat(price / parseFloat(preferences.dollarValue)) - preferences.handlingCharges_USD),
        freightCharge_EUR = Math.ceil(parseFloat(price / parseFloat(preferences.euroValue)) - preferences.handlingCharges_EUR);
    
    //check for total minimum charges - USD
    if ((freightCharge_USD + preferences.handlingCharges_USD) < preferences.minBilling_USD) {
        freightCharge_USD = preferences.minBilling_USD - preferences.handlingCharges_USD;
    }

    //check for total minimum charges - EUR
    if ((freightCharge_EUR + preferences.handlingCharges_EUR) < preferences.minBilling_EUR) {
        freightCharge_EUR = preferences.minBilling_EUR - preferences.handlingCharges_EUR;
    }

    var freightChargesRow = '<div class="row-fluid align_center">\
                <div class="span4 breadcrumb">Freight Charges</div>\
                <div class="span4 breadcrumb">$' + freightCharge_USD + '</div>\
                <div class="span4 breadcrumb">&euro;' + freightCharge_EUR + '</div>\
            </div>';

    return (handlingChargesRow + freightChargesRow);
}

function getFuelSurcharge(price) {
    return (price * parseFloat(preferences.fuelSurcharge) / 100).toFixed(2);
}

function getClearanceCost(price) {
    return (parseFloat(preferences.clearanceCost)).toFixed(2);
}

function getMiscCharges(price) {
    return (price * parseFloat(preferences.misc) / 100).toFixed(2);
}