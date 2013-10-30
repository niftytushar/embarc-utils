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
    <title>Servers - Status</title>
    <link href="/embarc-utils/css/normalize.css" rel="stylesheet">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">
    <link href="/embarc-utils/css/custom_style.css" rel="stylesheet">
	<link href="/embarc-utils/css/datepicker.css" rel="stylesheet">
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>   
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="/embarc-utils/js/bootstrap-datepicker.js"></script>
    <script src="/embarc-utils/js/common.js"></script>
	<script src="/embarc-utils/js/servers.js"></script>
	<script src="/embarc-utils/js/static_data.js"></script>
	<script src="/embarc-utils/js/jquery.validate.min.js"></script>
	<script src="/embarc-utils/js/aes.js"></script>
	<script src="/embarc-utils/js/sha256.min.js"></script>

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
                        Embarc
                    </a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse nav-collapse-scrollable">
            	
                    <ul class="nav navbar-nav">                        
                        <li class="active"><a href="#">List</a></li>
                        <li ><a href="/embarc-utils/servers/server_add.php">Add</a></li>
                        <li><a href="#">Kill</a></li>
					</ul>
                    <ul class="nav navbar-nav navbar-right">                      
                        <li><a href="/embarc-utils/php/main.php?util=login&fx=logout">Sign Out</a></li>
                    </ul>                
            </div>
    	</div>
    </nav>
    <a id="top"></a>
    <div class="containt container">
<div class="panel-group" id="workingServersList">
  <!--<div class="panel panel-default ">
    <div class="panel-heading">
	<h4 class="panel-title">
	<div class="row">
		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
			<div class="left_status">
				<div class="col-lg-1"><i class="fa fa-hdd" title="Disk Usage" style="font-size:20px;"></i><span>&nbsp;10%</span></div>
				<div class="col-lg-1"><i class="fa fa-tasks" title="Memory Usage" style="font-size:19px;"></i><span>&nbsp;100%</span></div>
			</div>
			<div class="col-lg-3">Test</div>
			<div class="col-lg-2"><code>71.19.240.175</code></div>        
			<div class="col-lg-2"><code>Copy password</code><input type="hidden" id="root_pass"></div>
			<div class="col-lg-2">http://mcm.findnsecure.com</div>
			<div class="col-lg-1">
			<button type="button" class="close" aria-hidden="true"><i class="fa fa-chevron-circle-down" style="font-size:15px;"></i></button>
			<button type="button" class="close" aria-hidden="true"><i class="fa fa-refresh" style="font-size:14px;"></i>&nbsp;</button>
			</div>
		</a>
	</div>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body">
        <div class="col-lg-4 col-sm-4">
        	<div class="well well-sm">
            	<ul class="list-group">
                  <li class="list-group-item active"><i class="fa fa-hdd" title="Disk Usage" style="font-size:20px;"></i><span>&nbsp;&nbsp;HDD</span></li>
                  <li class="list-group-item"><span class="badge">14%</span>/</li>
                  <li class="list-group-item"><span class="badge">1%</span>/boot</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4">
        	<div class="well well-sm">
            	<ul class="list-group">
                  <li class="list-group-item active"><i class="fa fa-file-text-o" title="Disk Usage" style="font-size:20px;"></i><span>&nbsp;&nbsp;Log Files</span></li>
                  <li class="list-group-item">/</li>
                  <li class="list-group-item">/boot</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4">
        	<div class="well well-sm">Third</div>
        </div>
      	<div class="row">
        	<div class="col-lg-4 col-md-offset-8">
            	<button type="button" class="close" aria-hidden="true"><i class="fa fa-chevron-circle-down" style="font-size:15px;"></i></button>
            </div>
        </div>
      </div>
    </div>
  </div>-->
</div>
  <!--<div class="panel panel-default">
    <div class="panel-heading panel-heading-notworking">
      <h4 class="panel-title">
        <div class="row">
	<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
      	<div class="col-lg-2"><span class="badge">u</span> <span class="badge">f</span> <span class="badge">m</span> <span class="badge">g</span> <span class="badge">r</span></div>
        <div class="col-lg-3">Embarc Information Technologies Pvt. Ltd.</div>
        <div class="col-lg-2"><code>71.19.240.175</code></div>        
        <div class="col-lg-2"><code>Copy password </code><input type="hidden" id="root_pass"></div>
        <div class="col-lg-2">http://trackv4.findnsecure.com</div>
        <div class="col-lg-1"><button type="button" class="close" aria-hidden="true">&times;</button></div>
	</a>
        </div>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>-->
  <!--<div class="panel panel-default">
    <div class="panel-heading panel-heading-partworking">
      <h4 class="panel-title">
        <div class="row">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">      	
        <div class="col-lg-2"><span class="badge" title="frontend">f</span> <span class="badge">r</span></div>
        <div class="col-lg-3">Find'n'Secure</div>
        <div class="col-lg-2"><code>71.19.240.175</code></div>        
        <div class="col-lg-2"><code>Copy password</code><input type="hidden" id="root_pass"></div>
        <div class="col-lg-2">http://trackv4.findnsecure.com</div>
        <div class="col-lg-1"><button type="button" class="close" aria-hidden="true">&times;</button></div>
                 
        </a>
        </div>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>-->
</div>
<a href="#top" class="hidden-xs"><div class="up_arrow"></div></a>
<footer>
	<div class="bs-footer">
    	<div class="container">
        	<div class="row">By Dev. Team</div>
        </div>
    </div>
</footer>
                
    
</body>
</html>