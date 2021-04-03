<?php
session_start();
require "../cnf/db_rb.php";
require "../cnf/db.php";
require "../cnf/vars.php";


	$id = $_SESSION['id'];
	$query = "select count(idUsr) from favorites where idUsr = $id";
	$results = mysqli_query($connect, $query);
	$row = $results->fetch_assoc()
?>
<?php if (isset($_SESSION['login'])) : ?>
    <!doctype html>
    <html class="test" lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="FlatBest - Responsive One Page Fast Loading">
        <meta name="keywords"
              content="One Page, Bootstrap, Website, Business, Resume, Portfolio, Template, Unlimited Colors">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- ===== Site Title===== -->
        <title>
            <?php echo $title ?>

        </title>

        <link rel="stylesheet" href="../css/auth.css">
        <!-- ===== Google Fonts ===== -->

        <link rel="stylesheet"
              href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,400italic|Raleway:500,600,700">

        <!-- ===== Favicon Icon ===== -->
        <!--<link rel="icon" href="../images/favicon.ico">-->

        <!-- ===== Bootstrap ===== -->
        <link rel="stylesheet" href="../css/bootstrap.css">

        <!-- ===== Font Icons ===== -->
        <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">

        <!-- ===== Corousel and Lightbox ===== -->
        <link rel="stylesheet" href="../css/owl.theme.css">
        <link rel="stylesheet" href="../css/owl.carousel.css">
        <link rel="stylesheet" href="../css/nivo-lightbox.css">
        <link rel="stylesheet" href="../css/themes/default/default.css">

        <!-- ===== Colors ===== -->
        <link rel="stylesheet" href="../css/colors/color.css">


        <!-- ===== Preloader ===== -->
        <!--<link rel="stylesheet" href="../css/preloader.css">-->

        <!-- ===== style.css ===== -->
        <link rel="stylesheet" href="http://kod1197.ru/lp/css/style.css">

        <!-- ===== Responsive CSS ===== -->
        <link rel="stylesheet" href="../css/responsive.css">

        <!--[===== if lt IE 9]>
                    <script src="js/html5shiv.js"></script>
                    <script src="js/respond.min.js"></script>
        <![endif]===== -->

    </head>

    <body onload="showUserBalance()">
    <div id="wrapper">
        <div id="idwrp">
            <!-- ===== preloader ===== -->
            <!--<div class="preloaders">-->
            <!--  <div class="preloaders-gif">&nbsp;</div>-->
            <!--</div>-->


            <!-- ===== Header ===== -->
            <header id="home">

                <!-- ===== Over color Image ===== -->
                <div class="background-overlay">
                    <!-- ===== Sticky Navigation ===== -->
                    <div class="navbar navbar-inverse bs-docs-nav navbar-fixed-top sticky-navigation bgc-two">
                        <div class="container">
                            <div class="navbar-header">

                                <!-- ===== Logo on Sticky Navigation Bar ===== -->
                                <button type="button" class="navbar-toggle" data-toggle="collapse"
                                        data-target="#onepage-navigation">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="<?php echo $brandLink ?>">
                                    <?php echo $brand ?>

                                </a>

                            </div>

                            <!-- ===== Navigation Menu ===== -->
                            <div class="navbar-collapse collapse" id="onepage-navigation">
                                <ul class="nav navbar-nav navbar-right main-navigation">
                                    <?php require_once "../cnf/config_menu.php" ?>
                                </ul>
                            </div>

                        </div>

                    </div>

                    <!-- ===== End Sticky Navigation ===== -->
                </div>
            </header>



            </div>
        </div>
        <div id="wrprf">
            <!-- ===== Footer ===== -->
            <footer class="bgc-two">
                <div class="container">

                </div>

                <ul class="social-icons">
                    <li><a href=""><i class="fa fa-facebook"></i></a></li>
                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                    <li><a href=""><i class="fa fa-google"></i></a></li>
                    <li><a href=""><i class="fa fa-youtube"></i></a></li>
                </ul>

                <div class="copyright">
                    ©2017 All Right Reserved.
                    <?= __DIR__ ?>
                </div>
        </div>
    </div>
    </footer>


    <!-- ===== Script Javascript ===== -->
    <script defer src="my.js"></script>
    <script src="../js/jquery.min.js"></script>
    <!--<script src="../js/preloader.js"></script>-->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/retina.js"></script>
    <script src="../js/SmoothScroll.js"></script>
    <script src="../js/jquery.scrollTo.min.js"></script>
    <script src="../js/jquery.localScroll.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/nivo-lightbox.min.js"></script>
    <!--<script src="../js/simple-expand.min.js"></script>-->
    <script src="../js/jquery.nav.js"></script>
    <script src="../js/jquery.fitvids.js"></script>
    <!--<script src="../js/jquery.ajaxchimp.min.js"></script>-->
    <script src="../js/custom.js"></script>

    </body>
    </html>
<?php else : ?>
    <?php header("Location:http://localhost/lp/index.php"); ?>
<?php endif; ?>