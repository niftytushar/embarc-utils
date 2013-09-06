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
    <title>Dashboard</title>
        <link href="/embarc-utils/css/normalize.css" rel="stylesheet">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css">
<link href="/embarc-utils/css/dashboard.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="/embarc-utils/js/common.js"></script>
	<script src="/embarc-utils/js/dhl_settings.js"></script>


    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

</head>
<body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    	<div class="container">
        	<div class="navbar-header">
            <a class="navbar-brand" href="index.html">
                        <img src="/embarc-utils/images/logo.png" class="img-responsive img-resize-small" />
                    </a>
            </div>
        </div>
       </nav>
    <div class="container containt ">
        <div class="gallery">
            <div class="job-thumb" style="opacity: 1">
                <div class="job-image">
                    <a href="/embarc-utils/courier/courier_dhl.php" class="">
                        <img width="600" height="600" alt="" src="/embarc-utils/images/courier.png" class="lazy " style="visibility: visible; opacity: 1;"><noscript>&lt;img class='' src='image/courier.png' alt=' width='600' height='600'' /&gt;</noscript>
                    </a>
                </div>
                <div class="job-heading">
                    <h2 class="thumb-heading">
                        <a href="/embarc-utils/courier/courier_dhl.php">DHL Courier Service
                            <br />
                            <p>Calculate courier package costs</p>
                        </a>
                    </h2>
                </div>
            </div>
            <div class="job-thumb" style="opacity: 1">
                <div class="job-image">
                    <a href="/embarc-utils/attendance/home_attend.php" class="">
                        <img width="600" height="600" alt="" src="/embarc-utils/images/attend.png" class="lazy " style="visibility: visible; opacity: 1;"><noscript>&lt;img class='' src='image/attend.png' alt=' width='600' height='600'' /&gt;</noscript>
                    </a>
                </div>
                <div class="job-heading">
                    <h2 class="thumb-heading">
                        <a href="/embarc-utils/attendance/home_attend.php">Barcamp Omaha 2012
                            <br>
                            <p>Apparel, Identity, Motion, Print, Web</p>
                        </a>
                    </h2>
                </div>
            </div>
            <div class="job-thumb" style="opacity: 1">
                <div class="job-image">
                    <a href="#" class="">
                        <img width="600" height="600" alt="" src="/embarc-utils/images/settings.png" class="lazy " style="visibility: visible; opacity: 1;"><noscript>&lt;img class='' src='image/settings.png' alt=' width='600' height='600'' /&gt;</noscript>
                    </a>
                </div>
                <div class="job-heading">
                    <h2 class="thumb-heading">
                        <a href="http://google.com">Barcamp Omaha 2012
                            <br>
                            <p>Apparel, Identity, Motion, Print, Web</p>
                        </a>
                    </h2>
                </div>
            </div>
            <div style="clear: both"></div>
        </div>
    </div>
</body>
</html>
