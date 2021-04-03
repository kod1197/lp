<?php
session_start();
require_once "../cnf/vars.php";
require_once "../cnf/includes.php";
require_once "../cnf/supermodal.php";
require_once "../cnf/db_rb.php";

if(!isset($_SESSION['kod1197']['id'])){
    header("Location: https://kod1197.ru/lp");
}

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
<!--<div class="preloaders">-->
<!--    <div class="preloaders-gif">&nbsp;</div>-->
<!--</div>-->
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
<section class="main-content">
    <div class="container-fluid">

        <div class="content">
            
                
                
                <ul class="nav nav-pills nav-stacked col-md-2">
  <li class="active"><a href="#tab_a" data-toggle="pill">Money actions</a></li>
  <li><a href="#tab_b" data-toggle="pill">Uplds/Dwnlds</a></li>
  <li><a href="#tab_c" data-toggle="pill">Account</a></li>
  <li><a href="#tab_d" data-toggle="pill">Settings</a></li>
  <li><a href="#tab_e" data-toggle="pill">Support</a></li>
</ul>
<div class="tab-content col-md-10">
        <div class="tab-pane active" id="tab_a">
             <h4>Money actions</h4>
            
                
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal4">
                    Пополнить счет
                </button>

                <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Пополнение счета</h4>
                            </div>
                            <div id="modal-body4" class="modal-body">
                                <form action="../olpataTest.php" method="POST">
                                    <input onInput="keys()" id="i" type="text" name="summa">
                                    <input type="submit" value="Пополнить счет">
                                    <div id="alert"></div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть окно</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                 <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                        data-target="#myModal5">
                    Вывод денег
                </button>


                <!-- Modal -->
                <div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Вывод денег</h4>
                            </div>
                            <div id="modal-body5" class="modal-body">
                                <form method="post">
                                    <label for="summ">Желаемая для вывода сумма: </label>
                                    <label id="summ-error" for="summ"></label>
                                    <input onInput="balanceChecker()" id="summ" class="form-control" name="summ" type="number" placeholder="Сумма к выводу"><br>
                                    <label for="payment_methods">Доступные к выводу платежные системы: </label>
                                    <select id="system" name="system" class="form-control" id="payment_methods">
                                        <option value="qiwi">Qiwi</option>
                                        <option value="webmoney">Webmoney</option>
                                        <option value="yandex">Yandex Money</option>
                                    </select><br>
                                    <label for="number">Номер счета: </label>
                                    <input name="number" id="number" class="form-control" type="text" placeholder="Номер счета/кошелька для вывода"><br>
                                    <input type="button" class="btn btn-success" id="paybutton" onclick="payoutToDb()" value="Отправить запрос на вывод">
                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть окно</button>
                            </div>
                        </div>
                    </div>
                </div>
                
            
        </div>
        <div class="tab-pane" id="tab_b">
             <h4>Uploads/Downloads</h4>
            
                
                 <!-- Button trigger modal -->
                <button onClick="DownLoadHistory()" type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                        data-target="#myModal2">
                    Посмотреть историю загрузок
                </button>


                <!-- Modal -->
                <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">История загрузок</h4>
                            </div>
                            <div id="modal-body2" class="modal-body">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть окно</button>
                            </div>
                        </div>
                    </div>
                </div>
              
                <!-- Button trigger modal -->
                <button onClick="LoadHistory()" type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                        data-target="#myModal1">
                    Посмотреть историю скачиваний
                </button>


                <!-- Modal -->
                <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">История скачиваний</h4>
                            </div>
                            <div id="modal-body1" class="modal-body">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть окно</button>
                            </div>
                        </div>
                    </div>
                </div>
                
            
        </div>
        <div class="tab-pane" id="tab_c">
             <h4>Account</h4>
            
                <!-- Button trigger modal -->
                <button onClick="wishlist()" type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                        data-target="#myModal3">
                    Избранные <span class="badge"><?= $row['count(idUsr)']; ?></span>
                </button>


                <!-- Modal -->
                <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Избранные изображения</h4>
                            </div>
                            <div id="modal-body3" class="modal-body">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть окно</button>
                            </div>
                        </div>
                    </div>
                </div>
            
            <?php
                $user = R::findOne('users', 'login = ?', array($_SESSION['kod1197']['login']));
                echo '<div id="balance">';
                echo 'Ваш баланс: ' . '<div id="forvideo">' .$user->balance . '</div>';
                echo '</div>';
                ?>
            
        </div>
        <div class="tab-pane" id="tab_d">
             <h4>Settings</h4>
            <div class="row">
                        <div class="col-md-offset-3 col-md-6">
                            <form method="post" class="form-horizontal">
                                <span class="heading">Смена пароля</span>
                                <div class="form-group">
                                    <input type="text" name="oldPwd" class="form-control" id="oldPwd"
                                           placeholder="Старый пароль">
                                    
                                </div>
                                <div class="form-group help">
                                    <input type="password" name="newPwd" class="form-control" id="newPwd"
                                           placeholder="Новый пароль">
                                    

                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default" onclick="changePass()">Сменить
                                        пароль
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div><!-- /.row -->
        </div>
        <div class="tab-pane" id="tab_e">
             <h4>Support</h4>
             
              <!-- Button trigger modal -->
                <button onclick="suptextareacleaner()" type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                        data-target="#myModal6">
                    Написать тикет
                </button>


                <!-- Modal -->
                <div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Support</h4>
                            </div>
                            <div id="modal-body6" class="modal-body">
                                <form method="POST">
                                    <input type="text" id="ticketHeader" placeholder="Заголовок тикета"><br>
                                    <textarea id="textToSup" rows="11" cols="50"> 
                                    </textarea>
                                    <input type="button" onclick="sendTextToSup()" value="Отправить сообщение в тех. поддержку">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="supportModalButton" data-dismiss="modal">Закрыть окно</button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <!-- Button trigger modal -->
                <button type="button" onclick="loadUserTickets()" class="btn btn-primary btn-lg" data-toggle="modal"
                        data-target="#myModal7">
                    Ваши обращения в тех поддержку
                </button>


                <!-- Modal -->
                <div class="modal fade" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Support</h4>
                            </div>
                            <div id="modal-body7" class="modal-body">
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary"  data-dismiss="modal">Закрыть окно</button>
                            </div>
                        </div>
                    </div>
                </div>
                
        </div>
</div><!-- tab content -->
                
                
                

                



                

                


                <input id="sessionName" type="hidden" value="<?php echo $_SESSION['kod1197']['login']; ?>">
                <input id="sessionId" type="hidden" value="<?php echo $_SESSION['kod1197']['id']; ?>">
                
                <hr>
                <br>
                <div class="container">

                    

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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="my.js"></script>

</body>
</html>