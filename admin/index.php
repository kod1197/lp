<?php 
session_start();

require_once "../cnf/db.php";

if($_SESSION['kod1197']['login'] != 'kod1197'){
    header("Location: https://kod1197.ru/lp");
}


?>

<html>
    <head>
        <title>Админ-панель</title>
    </head>
    
    <body>
        <h1>Админ-панель</h1><br>
        <a href="https://kod1197.ru/lp/admin/payouts.php">Перейти в раздел выплат</a><br>
        <a href="https://kod1197.ru/lp/admin/tickets.php">Перейти в раздел тикетов</a><br>
        <a href="https://kod1197.ru/lp">Вернуться на сайт</a>
    </body>
</html>