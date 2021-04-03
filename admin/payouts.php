<?php
session_start();

require_once "../cnf/db.php";

if($_SESSION['kod1197']['login'] != 'kod1197'){
    header("Location: https://kod1197.ru/lp");
}

$qr = "SELECT * from payouts";

$results = mysqli_query($connect, $qr);




?>

<html>
    <head>
        <title>Выплаты</title>
    </head>
    
    <body>
        <?php
            while($row = $results->fetch_assoc()){
                echo 'Пользователь: '. $row['login'] . '<br>';
                echo 'Сумма: ' . $row['summ'] . '<br><hr>';
            }
        ?>
    </body>
</html>