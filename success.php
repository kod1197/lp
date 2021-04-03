<h1>Успешная оплата</h1>
<?php
session_start();
require "cnf/db_rb.php";
require "cnf/db.php";
require "cnf/vars.php";

$id = $_POST["Desc"];
$summa = $_POST["OutSum"];

$user = R::findOne('users', 'id = ?',array($_SESSION['kod1197']['id']));

$oldBalance = $user->balance;

$newBalance = $oldBalance + $summa;

$user -> balance = $newBalance;
R::store($user);


echo "Сумма  {$newBalance}";
echo '<a href="https://kod1197.ru/lp/lk/testlk.php">Вернуться в личный кабинет</a><br>';
?>