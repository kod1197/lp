<?php
session_start();
require_once "../cnf/vars.php";
require_once "../cnf/includes.php";
require_once "../cnf/supermodal.php";
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
                            <?php require_once "../cnf/config_menu.php" ?>
                        </ul>
                    </div>

                    <!-- supermodal -->


                    <!-- ===== End Sticky Navigation ===== -->

                </div>
            </div>
</header>
<!-- ===== Welcome ===== -->
<section class="section-about bgc-one" id="section-about">
    
        <div class="container">

            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <form enctype="multipart/form-data" action="upload.php" id="dobavit" method="post"
                          class="form-horizontal">
                        <input type="hidden" name="MAX_FILE_SIZE" value="52428800">
                        <span class="heading">ЗАГРУЗКА ИЗОБРАЖЕНИЯ</span>
                        <div class="form-group">
                            <label for="sel1">Cписок тегов:</label>
                            <select name="tagger" class="form-control" id="sel1">
                                <option value="">Выберите из списка</option>
                                <option value="1">Forest</option>
                                <option value="3">Sun</option>
                                <option value="5">Lake</option>
                                <option value="7">Meadow</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" id="inputEmail"
                                   placeholder="Название">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="input-group">
                            <input type="file" name="img">
                        </div>
                        <label for="">Платное изображение?</label>
                        <input type="checkbox" id="check" onclick="paidCheck()" name="paid">
                        <div class="form-group">
                            <input type="text" name="price" class="form-control" id="price"
                                   placeholder="Цена">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">ЗАГРУЗИТЬ</button>
                        </div>
                    </form>
                </div>

            </div><!-- /.row -->

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