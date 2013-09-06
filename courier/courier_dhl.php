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
    <title></title>
    <link href="/embarc-utils/css/normalize.css" rel="stylesheet">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	<link href="/embarc-utils/css/custom_style.css" rel="stylesheet">
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>   
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="/embarc-utils/js/common.js"></script>
    <script src="/embarc-utils/js/dhl_main.js"></script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

</head>
<body onload="init();">
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    	<div class="container">
        	<div class="navbar-header">
            	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                <a class="navbar-brand" href="index.html">
                        <img src="/embarc-utils/images/logo.png" class="img-responsive img-resize-small" />
                    </a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse nav-collapse-scrollable links">
            	<div class="pull-right">
                    <ul class="nav navbar-nav">
                        <li><a href="/embarc-utils/dashboard.php">Dashboard</a></li>
                        <li><a href="/embarc-utils/courier/settings_dhl.php">Settings</a></li>
                        <li><a href="/embarc-utils/php/main.php?util=login&fx=logout">Sign Out</a></li>
                    </ul>
                    </div>
            </div>
    	</div>
    </nav>
    <div class="containt container">

        <form class="form-horizontal" role="form" id="packageDetailsForm">
        <div class="row">
            <div class="form-group">
                <label class="col-lg-2 control-label" for="weight">Weight</label>
                <div class="col-lg-4">
                	<div class="input-group">
                    	<input type="text" class="form-control" id="weight" name="weight" placeholder="Weight">	
                        <span class="input-group-addon">kgs</span>
                    </div>                 					
                </div>
            </div>
       </div>
       <div class="row">
            <div class="form-group">
                <label class="col-lg-2 control-label" for="country">Country</label>
                <div class="col-lg-4">
                    <select id="country" class="form-control" name="country"></select>
                </div>
            </div>
       </div>
       <div class="row">
            <div class="form-group">
                <label class="col-lg-2 control-label" for="type">Type</label>
                <div class="col-lg-4">
                    <select id="type" class="form-control" name="type"></select>
                </div>
            </div>
       </div>
       <div class="row">
            <div class="col-lg-offset-2 col-lg-4">
                <button type="button" class="btn btn-default" onclick="calculate();">Submit</button>
            </div>
       </div>
        </form>
        <div id="result"></div>
    </div>
</body>
</html>