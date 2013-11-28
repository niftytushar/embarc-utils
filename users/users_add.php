<?php /*?><?php
require_once('/var/www/embarc-utils/php/sessions.php');
$session = new SESSIONS();
$session->check();
?><?php */?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" />
    <title>Users - Add</title>
    <link href="/embarc-utils/css/normalize.css" rel="stylesheet">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	<link href="/embarc-utils/css/custom_style.css" rel="stylesheet">
	<link href="/embarc-utils/css/datepicker.css" rel="stylesheet">
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>   
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="/embarc-utils/js/bootstrap-datepicker.js"></script>
    <script src="/embarc-utils/js/common.js"></script>
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
                <a class="navbar-brand" href="/embarc-utils/dashboard.php">
                        Embarc
                    </a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse nav-collapse-scrollable">
            	
                    <ul class="nav navbar-nav">                        
                        <li><a href="/embarc-utils/users/users_list.php">List</a></li>
                        <li class="active"><a href="#">Add</a></li>
					</ul>
                    <ul class="nav navbar-nav navbar-right">                      
                        <li><a href="/embarc-utils/php/main.php?util=login&fx=logout">Sign Out</a></li>
                    </ul>                
            </div>
    	</div>
    </nav>
    <div class="containt container">
	<div class="alert alert-danger" id="errorMessage-1"><strong>Oh snap!</strong> An error occurred, please try again. </div>
    	<div class="alert alert-success" id="successMessage-1"><strong>Well done!</strong> You have successfully added a new user. </div>

          <form class="form-horizontal" role="form" id="serverAddForm">
		  <div class="row">
			<h3>User Details</h3>
			<hr>
			</div>
		  <div class="form-group">
                <label class="col-lg-4 control-label" for="username">User Name</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" id="username" name="username" placeholder="User Name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="password">Password</label>
                <div class="col-lg-4">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="name">Name</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                </div>
            </div>
                        
            <div class="form-group">
                <label class="col-lg-4 control-label" for="email">Email</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                </div>
            </div>
			
			<div class="form-group">
                <label class="col-lg-4 control-label" for="phone">Phone</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number">
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="modules">Modules</label>
                <div class="col-lg-4">
					<select class="form-control" id="modules" name="modules" multiple="multiple" ></select>
                </div>
            </div>
            <div class="col-lg-offset-4 col-lg-4 margin-bottom">
                <button type="submit" class="btn btn-default" id="saveServerButton" data-loading-text="Saving...">Submit</button>
            </div>
        </form>      
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