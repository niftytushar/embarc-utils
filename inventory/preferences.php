<?php
require_once('/var/www/embarc-utils/php/sessions.php');
$session = new SESSIONS();
$session->check();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" />
    <title>Inventory - Preferences</title>
    <link href="/embarc-utils/css/normalize.css" rel="stylesheet">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	<link href="/embarc-utils/css/custom_style.css" rel="stylesheet">
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>   
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
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
                        <li><a href="/embarc-utils/inventory/stock_in.php">Stock In</a></li>
                        <li><a href="/embarc-utils/inventory/stock_out.php">Stock Out</a></li>
                        <li><a href="/embarc-utils/inventory/stock_finder.php">Stock Finder</a></li>
                        <li class="active"><a href="/embarc-utils/inventory/preferences.php">Preferences</a></li>
                        <li><a href="/embarc-utils/php/main.php?util=login&fx=logout">Sign Out</a></li>
                    </ul>
                
            </div>
    	</div>
    </nav>
    <div class="containt container">

          <form class="form-horizontal" role="form" id="preferencesForm">
		  <h3>Stock IN</h3>
          <hr>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="model">Model</label>
                <div class="col-lg-4">
                    <select class="form-control" name="model" id="model"></select>
                </div>
            </div>
			
			<div class="form-group">
                <label class="col-lg-4 control-label" for="model">Time to Wait after IMEI scan</label>
                <div class="col-lg-4 input-group">
                    <input type="text" name="waitTimeIN" id="waitTimeIN" class="form-control" required />
					<span class="input-group-addon">seconds</span>
                </div>
            </div>
			
            <div class="col-lg-offset-4 col-lg-4 margin-bottom">
				<div class="checkbox">
					<label>
						<input type="checkbox" name="autoSaveIN" id="autoSaveIN"> Auto-save on IMEI scan
					</label>
				</div>         
			</div>
			
			<h3>Stock OUT</h3>
			<hr>
			<div class="form-group">
                <label class="col-lg-4 control-label" for="model">Warranty Provided</label>
                <div class="col-lg-4">
                    <input type="text" name="out_warranty" id="out_warranty" class="form-control" required />
                </div>
            </div>
			
			<div class="form-group">
                <label class="col-lg-4 control-label" for="model">Time to Wait after IMEI scan</label>
                <div class="col-lg-4 input-group">
                    <input type="text" name="waitTimeOUT" id="waitTimeOUT" class="form-control" required />
					<span class="input-group-addon">seconds</span>
                </div>
            </div>
			
			<div class="col-lg-offset-4 col-lg-4 margin-bottom">
				<div class="checkbox">
					<label>
						<input type="checkbox" name="autoSaveOUT" id="autoSaveOUT"> Auto-save on IMEI scan
					</label>
				</div>         
			</div>
			
            <div class="col-lg-offset-4 col-lg-4">
                <button type="submit" class="btn btn-default" id="savePreferencesButton">Save</button>
            </div>
        </form>      
    </div>
</body>
</html>