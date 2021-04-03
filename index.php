<?php
session_start();
require_once "cnf/vars.php";
require_once "cnf/includes.php";
require_once "cnf/supermodal.php";
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
                            <?php require_once "cnf/config_menu.php" ?>
                        </ul>
                    </div>

                    <!-- supermodal -->
                    <?= $supermodal; ?>

                    <!-- ===== End Sticky Navigation ===== -->

                </div>
            </div>

            <div class="container">

                <div class="row">

                    <div class="col-md-10 col-md-offset-1 distance-header">

                        <h1 id="text-above-search">
                            <strong>Здесь начинаются отличные истории. В вашем распоряжении множество изображений </strong>
                        </h1>
                        <div id="underline-above-search" class="underline"></div>
                        <form class="form-search" action="search.php" method="get">
                            <div class="form-group input-group input-block">
                                <input id="topic_title" class="form-control input-lg" type="search" value="" name="searchStr"
                                       placeholder="Найти графику">
                                <div class="input-group-btn">
                                    <button class="btn btn-warning" type="submit" value="Поиск">Поиск</button>
                                </div>
                            </div>
                            <span id="search_history" style="color:#F9BF3B">
                                <?php 
                                    $history = $_SESSION['kod1197']['search_history'];
                                    if(!empty($_SESSION['kod1197']['search_history'])){
                                        echo 'Вы искали: <a style="text-decoration:none; color:#F9BF3B" href="https://kod1197.ru/lp/search.php?searchStr='.$history.'">'.$history.'</a>';
                                    }
                                ?>
                            </span><br>
                        </form>
                        <!-- ===== Call To Action Button ===== -->
                        <!--<div id="call_to_action-5" class="distance-button">
                        <a href="#section-about" class="btn standard-button">()</a>
                        </div>-->
                    </div>

                </div>

            </div>
</header>

<!-- ===== Section About ===== -->
<section class="section-about bgc-one" id="section-about">
    <div class="container">

        <h2>Есть из чего выбрать</h2>
        <div class="underline">
        </div>

        <p>
            Найдите потрясающие материалы для своего следующего проекта
        </p>


        <div class="row">
            <div class="col-md-6">
                <!-- ===== Images ===== -->
                <div class="side-images pull-left">
                    <img src="images/pro.jpg" alt="Feature" class="img-responsive">
                </div>
            </div>
            <div class="col-md-6">

                <div class="about text-left">

                    <!-- ===== Features List ===== -->
                    <ul class="feature-list">

                        <li>
                            <!-- ===== Icons ===== -->
                            <div class="icon-custom pull-left">
                                <i class="fa fa-laptop"></i>
                            </div>
                            <!-- ===== Detailt Post===== -->
                            <div class="details pull-left">
                                <h6>Фотграфии</h6>
                                <p>
                                    Рассматривайте профессиональные фотографии. Каждый день добавляются тысячи новых

                                </p>
                            </div>
                        </li>

                        <li>
                            <!-- ===== Icons ===== -->
                            <div class="icon-custom pull-left">
                                <i class="fa fa-cog"></i>
                            </div>
                            <!-- ===== Details Post ===== -->
                            <div class="details pull-left">
                                <h6>Векторные изображения</h6>
                                <p>
                                    Контроль над векторными изображениями полностью в ваших руках. Редактируйте без
                                    потери качества
                                </p>
                            </div>
                        </li>

                        <li>
                            <!-- ===== Icons ===== -->
                            <div class="icon-custom pull-left">
                                <i class="fa fa-photo"></i>
                            </div>
                            <!-- ===== Detail Post ===== -->
                            <div class="details pull-left">
                                <h6>Значки</h6>
                                <p>
                                    Находите значки для любого проекта. Практичное универсальное решение
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
    <hr>
</section>

<!-- ===== Section Features ===== -->
<section id="section-features" class="section-features bgc-one">

    <div class="container">

        <h2>Преимущества</h2>

        <div class="underline">
        </div>


        <div class="features">

            <div class="row">

                <!-- ===== Feature Post===== -->
                <div class="col-md-4">
                    <div class="feature">
                        <div class="icon">
                            <i class="fa fa-laptop"></i>
                        </div>
                        <h4>Lorem ipsum dolor sit amet.</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt sit nostrum eveniet aut
                            et, impedit harum itaque ipsam error dolore ad aspernatur id iusto, cum eos reiciendis fuga
                            vitae quaerat.
                        </p>
                    </div>
                </div>

                <!-- ===== Feature Post===== -->
                <div class="col-md-4">
                    <div class="feature">
                        <div class="icon">
                            <i class="fa fa-cog"></i>
                        </div>
                        <h4>Lorem ipsum dolor sit amet.</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita nisi temporibus dolorum
                            quis, explicabo distinctio iusto in amet libero perferendis, quae laboriosam aliquid!
                            Repudiandae libero quam deserunt, vel, magnam aliquid.
                        </p>
                    </div>
                </div>

                <!-- ===== Feature Post===== -->
                <div class="col-md-4">
                    <div class="feature">
                        <div class="icon">
                            <i class="fa fa-heart"></i>
                        </div>
                        <h4>Lorem ipsum dolor sit amet.</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates sequi, voluptatum,
                            dolor quidem atque autem recusandae aliquam ex dolorum consectetur ipsum vitae, eos eveniet
                            inventore iste illum architecto laboriosam aut.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- ===== Feature Post===== -->
                <div class="col-md-4">
                    <div class="feature">
                        <div class="icon">
                            <i class="fa fa-thumbs-up"></i>
                        </div>
                        <h4>Lorem ipsum dolor sit amet.</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam nam porro, magni, ducimus
                            perferendis sequi dolore quae maiores vel nobis odit facere voluptatem perspiciatis. Ea
                            dicta nobis provident consectetur quidem.
                    </div>
                </div>

                <!-- ===== Feature Post===== -->
                <div class="col-md-4">
                    <div class="feature">
                        <div class="icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <h4>Lorem ipsum dolor sit amet.</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil, ipsum nisi error aspernatur
                            rem nam, ducimus libero mollitia. Quasi delectus ipsam, laborum repellendus autem quisquam
                            accusamus, assumenda commodi amet eum.
                        </p>
                    </div>
                </div>

                <!-- ===== Feature Post===== -->
                <div class="col-md-4">
                    <div class="feature">
                        <div class="icon">
                            <i class="fa fa-coffee"></i>
                        </div>
                        <h4>Lorem ipsum dolor sit amet.</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam quod dicta incidunt
                            quaerat, ut ex, repellendus reiciendis necessitatibus deserunt! Eos, ut laboriosam
                            necessitatibus velit explicabo veritatis tempore mollitia. Voluptatibus, repellat.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <hr>
</section>
<!-- ===== Section Portfolio ===== -->
<section id="section-portfolio" class="section-portfolio bgc-one">
    <div class="container">

        <h2>Lorem ipsum dolor.</h2>
        <div class="underline">
        </div>

        <div class="sub-sub">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique accusantium laborum veniam nisi
            inventore neque commodi odit repellat dignissimos iste ratione illo sint, magnam sapiente autem. Suscipit
            nostrum, nesciunt similique.
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
<script src="js/superplaceholder.js"></script>
<script type="text/javascript">
    superplaceholder({
        el: topic_title,
        sentences: [ 'Введи сюда интересующую тебя тему для поиска' , 'Например: Цветы'],
        options: {
            letterDelay: 50,
            sentenceDelay: 1500,
            startonfocus: true,
            loop: true,
            shuffle: false,
            showCursor: true,
            cursor: '|'
        }
    });
</script>

</body>
</html>