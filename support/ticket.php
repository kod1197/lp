<?php
    session_start();
    require "../cnf/db_rb.php";
    require_once "../cnf/includes.php";
    require_once "../cnf/vars.php";
    require_once "../cnf/includes.php";
    require_once "../cnf/supermodal.php";
    
    $id = $_GET['id'];
    
    $ticket = R::findOne('support', "id = ?", array($_GET['id']));
    
    if (empty($ticket)){
        header("Location: https://kod1197.ru/lp/lk/testlk.php");
        die('Неверный адрес');
    }
?>
<head>
    <?php
    foreach ($js as $js_file){
        echo $js_file;
    }
    ?>
    <?php
    foreach ($css as $css_file){
        echo $css_file;
    }
    ?>
    <link rel="stylesheet" href="https://kod1197.ru/lp/css/style.css">
    <title>Тех. поддержка</title>
    <script type="text/javascript">
        function send() {
            var message = $("#message").val();
            var strGET = window.location.search.replace( '?', '');
            $.ajax({
                async: false,
                type: "POST",
                url: "https://kod1197.ru/lp/chat/save.php",
                dataType:"text",
                data: 'message=' + message + '&get=' + strGET,
                error: function () {
                    alert( "Не смог" );
                },
                success: function (response) {
                    $("#message").val('');
                }
            })
        }
        function load() {
            var strGET = window.location.search.replace( '?', '');
            $.ajax({
                async: false,
                type: "POST",
                url: "https://kod1197.ru/lp/chat/load.php",
                dataType:"text",
                data: 'empty=' + 1 + '&get=' + strGET,
                error: function () {
                    alert( "Не смог" );
                },
                success: function (response) {
                    $("#chatbox").html(response);
                }
            })
        }

        function statuscheck() {
            load();
            var status = $("#closed").val();

            if (status > 0){
                $("#message").css('display', 'none');
                $("#send").css('display', 'none');
                $("#alert").html('<b>Статус тикета: Закрыт. <br> Были рады Вам помочь!');

            }
        }
        load();
        setInterval(load,3000);
    </script>
</head>
<body onload="statuscheck()">
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

<div class="container-fluid">

    <div class="content">
        <div class="col-md-offset-3 col-md-6">
        <div id="support_chat">
            <div id="main_section">
                <?php
                echo 'Вопрос: '.$ticket->header .'<br>';
                echo $ticket->text;
                ?>
                <hr>
            </div>
            <div id="chat">
                <div id="chatbox">

                </div>
                <form action="javascript:send();">
                    <input class="form-control" type="text" placeholder="Сообщение" id="message"><br>
                    <input class="form-control" type="submit" value="Отправить" id="send">
                </form>
            </div>
            <div id="alert">

            </div>
            <div id="status">
                <input type="hidden" id="closed" value="<?= $ticket->status; ?>">
            </div>
            <div id="admin">
                <?php
                if($_SESSION['kod1197']['login'] == 'kod1197'){
                    echo '
                                    <input class="form-control" type="hidden" id="id" value="'.$id.'">
                                    <input class="form-control" type="button" value="Закрыть тикет" id="do_answer" onclick="sendAnswer()">
                                    <br>
                                    <input class="form-control" type="button" value="Удалить" onclick="delTicket('.$id.')">
                                    ';
                }
                ?>
            </div>
        </div>
        <script src="https://kod1197.ru/lp/support/admin.js"></script>
    </div>
    </div>
</div>


<!-- ===== Footer ===== -->
<footer class="bgc-two">
    <div class="container-fluid">
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
