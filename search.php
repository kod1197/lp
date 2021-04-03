<?php
session_start();
require_once "cnf/vars.php";
require_once "cnf/includes.php";
require_once "cnf/supermodal.php";
require_once "cnf/db.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="kod1197">
    <meta name="keywords"
          content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- ===== Site Title===== -->
    <title>
        <?php echo $title ?>
    </title>

    <?php
    foreach ($css as $css_file){
        echo $css_file;
    }
    ?>

    <link rel="stylesheet" href="https://kod1197.ru/lp/css/style.css">
    <link rel="stylesheet" href="css/auth.css">

</head>

<body>
<!-- ===== preloader ===== -->
<div class="preloaders">
    <div class="preloaders-gif">&nbsp;</div>
</div>
<button class="top-btn"><?= $top_btn_content ?></button>

<!-- ===== Header ===== -->
<header id="home">

    <!-- ===== Over color Image ===== -->
    <div class="background-overlay">

        <div class="container-header">

            <!-- ===== Sticky Navigation ===== -->
            <div class="navbar navbar-inverse bs-docs-nav navbar-fixed-top sticky-navigation bgc-two">
                <div class="container">
                    <div class="navbar-header">

                        <!-- ===== Logo on Sticky Navigation Bar ===== -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target="#onepage-navigation">
                            <span class="sr-only">Меню</span>
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
                            <?php require_once "cnf/config_menu.php" ?>
                        </ul>
                    </div>

                    <!-- supermodal -->
                    <?= $supermodal; ?>

                    <!-- ===== End Sticky Navigation ===== -->

                </div>
            </div>
</header>
<!-- ===== Welcome ===== -->
<section class="main-content">
    <div class="container-fluid">

        <div class="content">
            <?php

            $zprs = $_GET["searchStr"];
            $_SESSION['kod1197']['search_history'] = $zprs;
            //	$query = "select * from img where id in ((select idImg from etot where idTag in((select id from tag where name like '%".$zprs."%'))))";
            $query = "SELECT * FROM img where name like '%" . $zprs . "%' order by name ";
            $results = mysqli_query($connect, $query);

            while ($row = $results->fetch_assoc()) {
                echo '<div id=image>';
                echo '<a href="upload/image.php?id=' . $row["id"] . '&tag=' . $zprs . '"><img class="imgBlock" height="200" width="200" src="upload/img/' . $row["img"] . '"></a>';
                echo '</div>';

            }
            ?>
        </div>

    </div>
</section>

<!-- ===== Footer ===== -->
<footer class="bgc-two">
    <div class="container">
        <div class="icons">
            <ul class="social-icons">
                <?php
                foreach ($soc as $soc_file){
                    echo $soc_file;
                }
                ?>
            </ul>
        </div>

        <div class="copyright">
            <?= $copyright ?>
        </div>
    </div>
</footer>


<!-- ===== Script Javascript ===== -->
<?php
foreach ($js as $js_file){
    echo $js_file;
}
?>
</body>
</html>