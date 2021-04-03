<?php
require "cnf/db_rb.php";
require "cnf/vars.php";
require "cnf/mailer/PHPMailerAutoload.php";

$data = $_POST;
if (trim($data['login']) == '') {
    $errors[] = 'Введите логин';
}

if (trim($data['secret']) == '') {
    $errors[] = 'Введите секретное слово';
}

if (trim($data['email']) == '') {
    $errors[] = 'Введите email';
}

if (trim($data['password']) == '') {
    $errors[] = 'Введите пароль';
}

if (trim($data['password_2']) != $data['password']) {
    $errors[] = 'Повторный пароль введен не верно';
}

if($data['rules'] != 'agreed'){
    $errors[] = 'Вы не приняли соглашение';
}

if (R::count('users', "login = ?", array($data['login'])) > 0) {
    $errors[] = 'Логин занят';
}

if (R::count('users', "email = ?", array($data['email'])) > 0) {
    $errors[] = 'Такой email уже зареган';
}


//Проверка на длинну поля

$login = $data['login'];
$email = substr($data['email'], 0, strpos($data['email'], '@'));
$secret = $data['secret'];

if (strlen($login) > 12){
    $errors[] = 'Длинна логина не может быть больше 12 символов';
}

if (strlen($email) > 25){
    $errors[] = 'Длинна email не может быть больше 25 символов без учета домена и @';
}

if (strlen($secret) > 20){
    $errros[] = 'Длинна секретного слова не может быть больше 20 символов';
}


if (empty($errors)) {
    $user = R::dispense('users');
    $user->login = $data['login'];
    $user->hash = md5($data['login']);
    $user->secret = $data['secret'];
    $user->email = $data['email'];
    $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
    R::store($user);

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->CharSet = "utf-8";
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';
    $mail->Host = "smtp.yandex.ru";
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;
    $mail->Username = "admin@kod1197.ru";
    $mail->Password = "311297gamer";
    $mail->setFrom('admin@kod1197.ru', 'kod1197.ru');
    $mail->addAddress($data['email'], $data['email']);
    $mail->Subject = 'Активация акканта';
    $url = 'https://kod1197.ru/lp/confirmer.php?login=' . $data["login"] . '&hash=' . md5($data["login"]);
    $mail->Body = 'Ваша ссылка для подтверждения аккаунта: ' . $url;
    $mail->send();

} else {
    echo array_shift($errors);
}
?>
