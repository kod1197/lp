<?php 
session_start();
require "cnf/db_rb.php";

/*
if(isset($_POST['do_reset'])){
    unset($_SESSION);
    session_destroy();
    header('Location: https://kod1197.ru/lp/recaptcha.php');
}

echo '<pre>';
var_dump($_SESSION);
echo '</pre><br>';
$test = R::findOne('users', 'id = ?', array($_SESSION['kod1197']['id']));
var_dump($test);
*/


if(isset($_POST['do_test'])){
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $key = '6LeihjsUAAAAADJqxTWLA9iNXQgML8RBXlUpa--u';
    $togoogle = $url .'?secret='.$key.'&response='.$_POST['g-recaptcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR'];

    $data = json_decode(file_get_contents($togoogle));
    if($data->success == false){
        echo 'Вводи капчу !';
    }
    else {
        echo $_POST['test'];
    }
}
echo '------------------------------------------';
?>

<form action="recaptcha.php" method="POST">
    <input type="submit" name="do_reset" value="Сбросить сессию">
</form>




<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<form action="recaptcha.php" method="post">
    <input type="text" name="test" placeholder="тестовые данные">
    <input type="submit" name="do_test">
    <div class="g-recaptcha" data-sitekey="6LeihjsUAAAAAEp_LnTPrvcyWiGxefzDf_KYMm31"></div>
</form>
<br>
<h1>Данные с рекапчи</h1>
<pre>Ключ
Добавьте этот ключ в HTML-код сайта.
6LeihjsUAAAAAEp_LnTPrvcyWiGxefzDf_KYMm31
Секретный ключ
Этот ключ нужен для связи между вашим сайтом и Google. Никому его не сообщайте.
6LeihjsUAAAAADJqxTWLA9iNXQgML8RBXlUpa--u
Шаг 1. Интеграция на стороне клиента
Вставьте этот фрагмент перед закрывающим тегом </head> в HTML-коде:
<script src='https://www.google.com/recaptcha/api.js'></script>
Вставьте этот фрагмент в конце объекта <form> (там, где нужно разместить виджет reCAPTCHA):
<div class="g-recaptcha" data-sitekey="6LeihjsUAAAAAEp_LnTPrvcyWiGxefzDf_KYMm31"></div>
На сайте reCAPTCHA можно найти подробную информацию и расширенные настройки.
Шаг 2. Интеграция на стороне сервера
Когда пользователи отправляют форму со встроенной проверкой reCAPTCHA, вместе с прочими данными вы получаете строку "g-recaptcha-response". Чтобы узнать, прошел ли пользователь проверку, отправьте POST-запрос со следующими параметрами:
URL: https://www.google.com/recaptcha/api/siteverify
secret (обязательно)	6LeihjsUAAAAADJqxTWLA9iNXQgML8RBXlUpa--u
response (обязательно)	Значение "g-recaptcha-response".
remoteip	IP-адрес конечного пользователя.</pre>
</body>
</html>