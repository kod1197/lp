<?php
session_start();
require_once "../cnf/vars.php";
require_once "../cnf/includes.php";
require_once "../cnf/supermodal.php";
require_once "../cnf/db.php";
require_once "../cnf/db_rb.php";

//TODO: Понять что это и переделать
$id = $_GET["id"];
$query = "select * from img where id='$id'";
$results = mysqli_query($connect, $query);
$login = $_SESSION['kod1197']['login'];

$row = $results->fetch_assoc();

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
    <link rel="stylesheet" href="../css/nivo-lightbox.css">
    <link rel="stylesheet" href="../css/themes/default/default.css">


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
            //TODO: Отрефакторить код
            $id = $_GET["id"];
            ?>
            <?php if ($_SESSION['kod1197']['login'] == 'kod1197') : ?>
                <form method="post" action="delImg.php">
                    <input type="submit" value="del">
                    <input type="hidden" value="<?php echo $id; ?>" id="idImg" name="idImg">
                </form>
                
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal4">
                    Редактирование
                </button>

                <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Редактирование</h4>
                            </div>
                            <div id="modal-body4" class="modal-body">
                                <form>
                                    <p>
                                        <b>Название изображения:</b>
                                        <input type="text" id="edit-name" value="<?php echo $row['name']; ?>" <br>
                                    </p>
                                    <p>
                                        <b>Имя автора:</b>
                                        <input type="text" id="edit-author" value="<?php echo $row['author']; ?>" <br>
                                    </p>
                                    <p>
                                        <b>Дата:</b>
                                        <input type="text" id="edit-date" value="<?php echo $row['date']; ?>" <br>
                                    </p>
                                    <p>
                                        <b>Цена:</b>
                                        <input type="text" id="edit-price" value="<?php echo $row['price']; ?>" <br>
                                    </p>
                                    <p>
                                        <b>Платное?</b>
                                        <input type="text" id="edit-paid" value="<?php echo $row['paid']; ?>" <br>
                                    </p>
                                    
                                    <input type="button" value="Применить изменения" onclick="edit()">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть окно</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>


            <div id="image">
                <img class="imgBlock" height="300" width="300" src="img/<?php echo $row["img"]; ?>"><br>
                <a class="lightbox" href="img/<?php echo $row['img']; ?>">Увеличить картинку</a><br>
                <hr>
                <strong>Автор фотографии: </strong><?php echo $row['author']; ?>
                <hr>
                <br>
                <a href="https://kod1197.ru/lp/search.php?searchStr=<?php echo $_GET['tag']; ?>">Назад</a>
            </div>
            <div id="image-content">
                <br>
                <b>Название изображения: </b> <?php echo $row['name']; ?>
                <br>
                <?php
                if (isset($login)) {
                    $user = R::findOne('users', 'login = ?', array($login));
                    $active = $user->activated;
                    $balance = $user->balance;
                    if ($active == '1') {
                        if ($row['paid'] == 'on') {
                            echo '
                            
                            <button onClick="" type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                        data-target="#myModal1">
                    Купить - Цена: '.$row['price'].'р
                </button>


                
                <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Покупка</h4>
                            </div>
                            <div id="modal-body1" class="modal-body">
                                 Вы собираетесь купить изобажение: <strong>'.$row['name'].'</strong> по цене: <strong>'.$row['price'].'р</strong> <br>
                                 Ваш баланс: <strong> '.$balance.'р</strong> <br>
                                 <a href="save.php?filename=img/' . $row["img"] . '&idImg=' . $row['id'] . '&price=' . $row['price'] . '">Купить</a>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть окно</button>
                            </div>
                        </div>
                    </div>
                </div>
                            ';
                            echo '<br>';
                        } else {
                            echo '<a href="save.php?filename=img/' . $row["img"] . '&idImg=' . $row['id'] . '">Скачать</a>';
                            echo '<br>';
                        }
                    } else {
                        echo "Чтобы скачать изображение подтвердите аккаунт";
                        echo "<br>";
                    }
                    echo '<div id="error"></div>';
                    echo '<span onClick="toWishlist()" id="'.$id.'" class="favorites">Добавить в избранное</span>';
                } else {
                    echo '<a href="https://kod1197.ru/lp/signup.php">Зарегистрируйтесь</a> что бы скачать изображение';
                }
                ?>
            </div>
        
                
        </div>

    </div>
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
</section>




<!-- ===== Script Javascript ===== -->
<?php
foreach ($js as $js_file){
    echo $js_file;
}
?>
<script type="text/javascript" src="../js/nivo-lightbox.js"></script>
</body>
</html>