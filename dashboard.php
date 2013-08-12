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
    <!--    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">-->
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/normalize.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <style type="text/css">
        *::-moz-selection {
            background: none repeat scroll 0 0 #E9AC44;
            color: #FFFFFF;
            text-shadow: none;
        }

        body {
            background-color: #f5f5f5;
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
        }

        .gallery {
            border: 0 none;
            font: inherit;
            list-style: none outside none;
            margin: 0;
            padding: 0;
            vertical-align: baseline;
        }

        .job-thumb {
            background: none repeat scroll 0 0 #E9AC44;
            float: left;
            margin: 1px;
            width: 33%;
            position: relative;
        }

        @media (max-width: 767px) {
            .job-thumb {
                float: left;
                margin: 1px;
                width: 49%;
            }
        }

        .job-image {
            opacity: 1;
            position: relative;
            transition: opacity 0.25s ease-in-out 0s;
            z-index: 2;
        }

            .job-image:hover {
                opacity: 0;
            }

            .job-image a img {
                margin: 0;
            }

        .job-heading {
            float: left;
            padding: 20px;
            position: absolute;
            z-index: 1;
            top: 0;
        }

            .job-heading a {
                color: #FFFFFF;
            }

            .job-heading h2 {
                font-size: 18px;
            }

        a, a:active {
            cursor: pointer;
            outline: medium none;
            text-decoration: none;
            transition: color 0.25s ease-in-out 0s;
        }

        img {
            height: auto;
            max-width: 100%;
        }

        @media (max-width: 480px) {
            .job-thumb {
                background: none repeat scroll 0 0 #FFFFFF;
                border: 1px solid #E1E3E2;
                box-shadow: 0 0 1px 1px #DEE0DF;
                margin: 0 0 20px;
                width: 99%;
            }

            .job-image img {
                width: 150px;
            }

            .job-image:hover {
                opacity: 1;
            }

            .job-heading a {
                color: #5E6E70;
                display: block;
                height: 107px;
                width: 100%;
            }

            .job-heading {
                padding: 10px 0 0 170px;
                width: 40%;
            }

                .job-heading h2 {
                    font-size: 12px;
                }
        }
    </style>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

</head>
<body>
    <div class="header_wrap">
        <div class="container header">
            <img class="img-rounded" src="image/logo.png" />
        </div>
    </div>
    <div class="container containt ">
        <div class="gallery">
            <div class="job-thumb" style="opacity: 1">
                <div class="job-image">
                    <a href="/courier/courier_dhl.php" class="">
                        <img width="600" height="600" alt="" src="image/courier.png" class="lazy " style="visibility: visible; opacity: 1;"><noscript>&lt;img class='' src='image/courier.png' alt=' width='600' height='600'' /&gt;</noscript>
                    </a>
                </div>
                <div class="job-heading">
                    <h2 class="thumb-heading">
                        <a href="http://google.com">DHL Courier Service
                            <br />
                            <p>Calculate courier package costs</p>
                        </a>
                    </h2>
                </div>
            </div>
            <div class="job-thumb" style="opacity: 1">
                <div class="job-image">
                    <a href="/courier/home_attend.php" class="">
                        <img width="600" height="600" alt="" src="image/attend.png" class="lazy " style="visibility: visible; opacity: 1;"><noscript>&lt;img class='' src='image/attend.png' alt=' width='600' height='600'' /&gt;</noscript>
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
            <div class="job-thumb" style="opacity: 1">
                <div class="job-image">
                    <a href="http://google.com" class="">
                        <img width="600" height="600" alt="" src="image/settings.png" class="lazy " style="visibility: visible; opacity: 1;"><noscript>&lt;img class='' src='image/settings.png' alt=' width='600' height='600'' /&gt;</noscript>
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
