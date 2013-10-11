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
    <title>Inventory - Search</title>
    <link href="/embarc-utils/css/normalize.css" rel="stylesheet">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	<link href="/embarc-utils/css/custom_style.css" rel="stylesheet">
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>   
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="/embarc-utils/js/common.js"></script>
    <script src="/embarc-utils/js/inventory.js"></script>

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
                    </button>
                <a class="navbar-brand" href="/embarc-utils/dashboard.php">
                        <!--<img src="/embarc-utils/images/logo.png" class="img-responsive img-resize-small" />-->
                        Embarc
                    </a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse nav-collapse-scrollable">
            	
                    <ul class="nav navbar-nav">                        
                        <li><a href="/embarc-utils/inventory/stock_in.php">Stock In</a></li>
                        <li><a href="/embarc-utils/inventory/stock_out.php">Stock Out</a></li>
                        <li><a href="/embarc-utils/inventory/stock_finder.php">Stock Finder</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                              <li><a href="/embarc-utils/inventory/preferences.php">Preferences</a></li>
                              <li><a href="/embarc-utils/inventory/clients.php">Clients</a></li>
                              <li><a href="/embarc-utils/inventory/trackers.php">Trackers</a></li>                              
                            </ul>
                          </li>  
                         </ul>
                         <ul class="nav navbar-nav navbar-right">                      
                        <li><a href="/embarc-utils/php/main.php?util=login&fx=logout">Sign Out</a></li>
                    </ul>                
            </div>
    	</div>
    </nav>
    <div class="containt container">

        <form class="form-horizontal" role="form" id="newClientForm">
            <div class="form-group">
                <label class="col-lg-4 control-label" for="invoice_no">Company Name</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name">
                </div>
            </div>
			<div class="form-group">
                <label class="col-lg-4 control-label" for="invoice_no">Client Name</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" id="client_name" name="client_name" placeholder="Client Name">
                </div>
            </div>
			<div class="form-group">
                <label class="col-lg-4 control-label" for="invoice_no">Email</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                </div>
            </div>
            <div class="row">
            <div class="col-lg-offset-4 col-lg-4">
                <button type="submit" class="btn btn-default margin-bottom" id="saveStockButton" data-loading-text="Saving...">Submit</button>
            </div>           
            </div>                           
        </form>  
        <div class="container" style="margin-top:20px; display:block;">
        <div class="row">
        	<div class="col-lg-12">
            	<div class="div-parameter">
                    <ul class="list-group custom-list-group">
                        <li class="list-group-item defult-list-element text-center"><em><strong>Sorry!</strong> No clients added</em></li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
        <div class="container" style="margin-top:20px; display:none;" id="countResultContainer">
        <div class="row">
        	<div class="col-lg-12">
            	<div class="well well-lg">
                	<h3>Found&nbsp;<span id="countResult"></span>&nbsp;item(s)&nbsp;matching&nbsp;this&nbsp;query</h3>
                </div>
            </div>
        </div>
        </div>        
        <div class="container" style="margin-top:20px; display:none;" id="tableResultContainer">
        <div class="row">
        	<div class="col-lg-12">
            	<div class="table-responsive">                
                    <table class="table table-hover">
                      <thead>
                      <tr>
                      	<th>Status</th>
                      	<th>IMEI</th>
                        <th>Serial</th>
                        <th>Model</th>
                        <th>Purchase Date</th>
                        <th><abbr title="Purchase">P.</abbr> Invoice #</th>
                        <th>In by</th>
                        <th>Sales Date</th>
                        <th>Client Name</th>
                        <th><abbr title="Sales">S.</abbr> Invoice #</th>
                        <th>Out by</th>                        
                      </tr>
                      </thead>
                      <tbody id="tableResult"></tbody>
                    </table>
				</div>
            </div>
        </div>
      </div>        
    </div>
</body>
</html>