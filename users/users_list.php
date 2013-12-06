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
    <title>Users - List</title>
    <link href="/embarc-utils/css/normalize.css" rel="stylesheet">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">
    <link href="/embarc-utils/css/custom_style.css" rel="stylesheet">
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>   
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="/embarc-utils/js/common.js"></script>
	<script src="/embarc-utils/js/users.js"></script>
	<script src="/embarc-utils/js/jquery.validate.min.js"></script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

</head>
<body>
<div id="wrap">
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    	<div class="container">
        	<div class="navbar-header">
            	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                      
                    </button>
                <a class="navbar-brand" href="/embarc-utils/dashboard.php">Embarc</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse nav-collapse-scrollable">
            	
                    <ul class="nav navbar-nav">                        
                        <li class="active"><a href="#">List</a></li>
                        <li ><a href="/embarc-utils/users/users_add.php">Add</a></li>
					</ul>
                    <ul class="nav navbar-nav navbar-right">                      
                        <li><a href="/embarc-utils/php/main.php?util=login&fx=logout">Sign Out</a></li>
                    </ul>                
            </div>
    	</div>
    </nav>
    <div class="containt container">
<div class="panel-group" id="usersList">
<div class="row">
	<div class="col-lg-4">Tushar Agarwal</div>
    <div class="col-lg-6">Modules</div>
    <div class="col-lg-1"><i class="fa fa-pencil-square-o"></i></div>
    <div class="col-lg-1"><i class="fa fa-times"></i></div>
</div>
</div>
</div>

<div id="push"></div>
</div>
<footer>
	<div id="footer">
		<div class="bs-footer">
			<div class="container">
				<div class="row">By Dev. Team</div>
			</div>
		</div>
	</div>
</footer>                
    
</body>
</html>