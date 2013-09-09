﻿/*****************************************************************************************************
*****************************************Create Element Start*****************************************
*****************************************************************************************************/
/*
Create HTML Elements
Arguments::
propertiesObject : {tagName:"div", parentElement:document.getElementById("parentDiv")}
eventsArray : [{eventType:"click", callback:function() {alert("I have been called back!");}}, {eventType:"mouseover", callback:function() {alert("Go Away!");}}]

Exceptions::
11 - Invalid Argument encountered, Object Expected
12 - Invalid Argument encountered, Array Expected
13 - Invalid Data found in valid argument, Object Expected
*/
var CREATE = {
    genericElement: function (propertiesObject, eventsArray) {
        if (!(propertiesObject instanceof Object))
            throw "Invalid Argument Type 11";
        if (!(eventsArray instanceof Array) && eventsArray)
            throw "Invalid Argument Type 12";

        propertiesObject.tagName = propertiesObject.tagName || 'div';
        var parentElement = propertiesObject.parentElement || document.body;
        delete propertiesObject.parentElement;

        //Set element's tag name
        var element = document.createElement(propertiesObject.tagName);
        delete propertiesObject.tagName;

        //If innerHTML exists, attach to element
        if (propertiesObject.innerHTML) {
            element.innerHTML = propertiesObject.innerHTML;
            delete propertiesObject.innerHTML;
        }

        //Add attributes to elements
        for (var property in propertiesObject) {
            element.setAttribute(property, propertiesObject[property]);
        }
        if (eventsArray) {
            for (var i = 0; i < eventsArray.length; i++) {
                if (!(eventsArray[i] instanceof Object))
                    throw "Invalid Values in Data 13";
                eventsArray[i].eventType = eventsArray[i].eventType || "click";
                addEvent(element, eventsArray[i].eventType, eventsArray[i].callback);
            }
        }
        parentElement.appendChild(element);

        return element;
    }
};
/*****************************************************************************************************
******************************************Create Element End******************************************
*****************************************************************************************************/

function getJSONFromString(str) {
    if (JSON) return JSON.parse(str);
    else return eval('(' + str + ')');
}

function strncmp(a, b, n) {
    return a.substring(0, n) == b.substring(0, n);
}

function fillDropDown($el, data, name, value) {
    for (var i = 0; i < data.length; i++) {
        $('<option/>').text(data[i][name]).attr('value', data[i][value]).appendTo($($el));
    }
}

function getURLParameter(name) {
    return (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search) || [, null])[1];
}

function getFormattedDate(date) {
    if (date == null || date == "") return "";
    var m = date.match(/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/);
    return (m[3] + "-" + m[2] + "-" + m[1]);
}

function createObject(formsList) {	//Create JSON style object to send data from form
    var inputs, selects, json = {};
    for (var i = 0; i < formsList.length; i++) {

        //If form ID is provided, convert it to element object
        if (typeof (formsList[i]) == "string") formsList[i] = document.getElementById(formsList[i]);

        //Get Inputs
        inputs = formsList[i].getElementsByTagName("input");
        for (var j = 0; j < inputs.length; j++) {
            if (inputs[j].disabled) continue;
            switch (inputs[j].type) {
                case "checkbox":
                    inputs[j].checked ? json[inputs[j].name] = "1" : json[inputs[j].name] = "0";
                    break;
                case "radio":
                    if (inputs[j].checked) json[inputs[j].name] = inputs[j].value;
                    break;
                default:
                    json[inputs[j].name] = inputs[j].value;
                    break;
            }
        }

        //Get Selects
        selects = formsList[i].getElementsByTagName("select");
        for (var j = 0; j < selects.length; j++) {
            if (selects[j].disabled) continue;
            json[selects[j].name] = selects[j].value;
        }

        //Get Textareas
        textareas = formsList[i].getElementsByTagName("textarea");
        for (var j = 0; j < textareas.length; j++) {
            if (textareas[j].disabled) continue;
            json[textareas[j].name] = textareas[j].value;
        }
    }
    return json;
}

//drop keys in an object
function dropElements(obj, drop) {
    for (var i = 0; i < drop.length; i++) {
        if (obj[drop[i]]) delete obj[drop[i]];
    }
    return obj;
}

//Form fill
function FormFiller(formElement, elementsPrefix) {
    if (elementsPrefix) this.elementsPrefix = elementsPrefix;
    else this.elementsPrefix = "";

    this.formElement = formElement;
}

FormFiller.prototype.fillData = function(dataObj)
{
    this.formElement.reset();

    for (var key in dataObj) {
        el = document.getElementById(this.elementsPrefix + key);
        if (el && (dataObj[key] != null || dataObj[key] != undefined)) {
            switch (el.type) {
                case "checkbox":
                    var value = Boolean(parseInt(dataObj[key]));
                    if (el.checked == value) break;

                    var ev = document.createEvent("MouseEvents");
                    ev.initMouseEvent("click", false, true, window,0, 0, 0, 0, 0, false, false, false, false, 0, null);
                    el.dispatchEvent(ev);
                    break;

                case "button":
                    break;

                default:
				el.value = dataObj[key];
				if (el.tagName == "SELECT"){
					var ev = document.createEvent("Event");
					ev.initEvent("change", false, true);
					el.dispatchEvent(ev);
				}				
				break;
            }//switch
        }//if
    }//for
}

//change page
function gotoPage(pageName) {
	window.location = pageName;
}