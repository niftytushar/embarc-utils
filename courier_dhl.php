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
    <script src="js/common.js"></script>
    <script src="js/dhl_main.js"></script>

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
            padding-top:100px;
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
                padding-top:0px;
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
                        <li><a href="/courier/settings_dhl.php">Settings</a></li>
                        <li><a href="/courier/php/main.php?util=login&fx=logout">Sign Out</a></li>
                    </ul>
                    </div>
            </div>
        </div>
    </div>
        </div>
    <div class="containt container">

        <form class="form-horizontal" id="packageDetailsForm">
            <div class="control-group">
                <label class="control-label" for="weight">Weight</label>
                <div class="controls">
                    <input type="text" class="span3" id="weight" name="weight" placeholder="Weight">
					<span>kgs</span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="country">Country</label>
                <div class="controls">
                    <select id="country" class="span3" name="country"></select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="type">Type</label>
                <div class="controls">
                    <select id="type" class="span3" name="type"></select>
                </div>
            </div>
            <div class="controls">
                <button type="button" class="btn" onclick="calculate();">Submit</button>
            </div>
        </form>
        <div id="result"></div>
    </div>
</body>
</html>
