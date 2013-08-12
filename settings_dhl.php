<?php
require_once('php/sessions.php');
$session = new SESSIONS();
$session->check();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" />
    <title></title>
    <link href="css/normalize.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/js/bootstrap-alert.js"></script>
    <script src="js/common.js"></script>
	<script src="js/dhl_settings.js"></script>

    <style type="text/css">
        *::-moz-selection {
            background: none repeat scroll 0 0 #E9AC44;
            color: #FFFFFF;
            text-shadow: none;
        }

        body {
        }

        .header_wrap {
            height: auto;
            background-color: #1e1e1e;
            width: 100%;
            margin-bottom: 20px;
        }

        .header {
            height: 60px;
            margin: 0 auto;
            padding-top: 10px;
        }

        .containt {
            overflow: hidden;
            margin: 0 auto;
            width: 800px;
            padding-top: 100px;
        }

        .align_center {
            text-align: center;
        }

        .links {
            padding-top: 10px;
        }

        @media (max-width: 480px) {
            .containt {
                overflow: hidden;
                margin: 0 auto;
                width: auto;
                padding-top: 0px;
            }
        }
    </style>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

</head>
<body onload="init();">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner links">
            <div class="container">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="brand" href="index.html">
                    <img src="image/logo.png" />

                </a>
                <div class="nav-collapse collapse links">
                    <div class="pull-right">
                        <ul class="nav">
                            <li><a href="/courier/dashboard.php">Dashboard</a></li>
                            <li class="active"><a href="#">Settings</a></li>
                            <li><a href="/courier/php/main.php?util=login&fx=logout">Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="containt container">
		<div id="messages"></div>
        <form class="form-horizontal" id="settingsForm">
            <div class="control-group">
                <label class="control-label" for="d_value">Dollar Value</label>
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on">₹</span>
                        <input type="text" class="span2" id="dollarValue" name="dollarValue" placeholder="Dollar Value">
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="e_value">Euro Value</label>
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on">₹</span>
                        <input type="text" class="span2" id="euroValue" name="euroValue" placeholder="Euro Value">
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="f_surcharge">Fuel Surcharge</label>
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on">%</span>
                        <input type="text" class="span2" id="fuelSurcharge" name="fuelSurcharge" placeholder="Fuel Surcharge">
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="misc">Miscellaneous</label>
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on">%</span>
                        <input type="text" class="span2" id="misc" name="misc" placeholder="Miscellaneous">
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="c_cost">Clearance Cost</label>
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on">₹</span>
                        <input type="text" class="span2" id="clearanceCost" name="clearanceCost" placeholder="Clearance Cost">
                    </div>
                </div>
            </div>
			<div class="control-group">
                <label class="control-label" for="c_cost">USD Handling Charges</label>
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on">$</span>
                        <input type="text" class="span2" id="handlingCharges_USD" name="handlingCharges_USD" placeholder="USD Handling Charges">
                    </div>
                </div>
            </div>
			<div class="control-group">
                <label class="control-label" for="c_cost">USD Minimum Billing</label>
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on">$</span>
                        <input type="text" class="span2" id="minBilling_USD" name="minBilling_USD" placeholder="USD Minimum Billing">
                    </div>
                </div>
            </div>
			<div class="control-group">
                <label class="control-label" for="c_cost">EUR Handling Charges</label>
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on">&euro;</span>
                        <input type="text" class="span2" id="handlingCharges_EUR" name="handlingCharges_EUR" placeholder="EUR Handling Charges">
                    </div>
                </div>
            </div>
			<div class="control-group">
                <label class="control-label" for="c_cost">EUR Minimum Billing</label>
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on">&euro;</span>
                        <input type="text" class="span2" id="minBilling_EUR" name="minBilling_EUR" placeholder="EUR Minimum Billing">
                    </div>
                </div>
            </div>
            <div class="controls">
                <button type="button" class="btn btn-success" onclick="saveSettings();">Save</button>
                <button type="button" class="btn" onclick="gotoPage('/courier/courier_dhl.php');">Cancel</button>
            </div>
        </form>
    </div>
</body>
</html>
