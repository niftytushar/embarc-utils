﻿<?php
require_once('/var/www/embarc-utils/php/sessions.php');
$session = new SESSIONS();
$session->check();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" />
    <title></title>
    <link href="/embarc-utils/css/normalize.css" rel="stylesheet">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	<link href="/embarc-utils/css/custom_style.css" rel="stylesheet">
	<link href="/embarc-utils/css/datepicker.css" rel="stylesheet">
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>   
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="/embarc-utils/js/bootstrap-datepicker.js"></script>
    <script src="/embarc-utils/js/common.js"></script>
	<script src="/embarc-utils/js/inventory.js"></script>
	<script src="/embarc-utils/js/jquery.validate.min.js"></script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    	<div class="container">
        	<div class="navbar-header">
            	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                <a class="navbar-brand" href="index.html">
                        <img src="/embarc-utils/images/logo.png" class="img-responsive img-resize-small" />
                    </a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse nav-collapse-scrollable links">
            	
                    <ul class="nav navbar-nav navbar-right links">
                        <li><a href="/embarc-utils/dashboard.php">Dashboard</a></li>
                        <li class="active"><a href="/embarc-utils/inventory/stock_in.php">Stock In</a></li>
                        <li><a href="/embarc-utils/inventory/stock_out.php">Stock Out</a></li>
                        <li><a href="/embarc-utils/inventory/stock_finder.php">Stock Finder</a></li>
                        <li><a href="/embarc-utils/inventory/preferences.php">Preferences</a></li>
                        <li><a href="/embarc-utils/php/main.php?util=login&fx=logout">Sign Out</a></li>
                    </ul>
                
            </div>
    	</div>
    </nav>
    <div class="containt container">
	<div class="alert alert-danger" id="errorMessage-1"><strong>Oh snap!</strong> Change a few things up and try submitting again. </div>
    <div class="alert alert-danger" id="errorMessage-2"><strong>Bummer!</strong> This IMEI number already exists. </div>
    	<div class="alert alert-success" id="successMessage-1"><strong>Well done!</strong> Stock item successfully saved. </div>

          <form class="form-horizontal" role="form" id="stockInForm">
		  
		  <div class="form-group">
                <label class="col-lg-4 control-label" for="invoice_no">Invoice #</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" id="in_invoice" name="in_invoice" placeholder="Invoice Number">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-4 control-label" for="model">Model</label>
                <div class="col-lg-4">
                    <select id="model" class="form-control" name="model"></select>
                </div>
            </div>            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="dateOfPurchase">Date of Purchase</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control datepicker" id="dateOfPurchase" name="dateOfPurchase" placeholder="Date of Purchase" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="warranty">Warranty Received</label>
                <div class="col-lg-4">
                   <div class="input-group">
                    	<input type="text" class="form-control" id="warranty" name="warranty" placeholder="Warranty">
						<span class="input-group-addon">Months</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="vendor">Vendor</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" id="vendor" name="vendor" placeholder="Vendor">
                </div>
            </div>
			<div class="form-group">
                <label class="col-lg-4 control-label" for="serial">Tracker Serial</label>
                <div class="col-lg-4">                	
                    	<input type="text" class="form-control" id="serial" name="serial" placeholder="Tracker Serial" required>	                                          
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="imei">IMEI</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" id="imei" name="imei" placeholder="IMEI" required>
                </div>
            </div>
            <div class="col-lg-offset-4 col-lg-4">
                <button type="submit" class="btn btn-default" id="saveStockButton">Submit</button>
            </div>
        </form>      
    </div>
</body>
</html>