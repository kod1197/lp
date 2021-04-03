<?php
/**
 * Created by PhpStorm.
 * User: kibir
 * Date: 06.10.2017
 * Time: 16:52
 */


require "cnf/db_rb.php";
require "cnf/vars.php";
$data = $_POST;

$user = R::findOne('users', 'login = ?', array($data['login']));
if ($user) {
    if (password_verify($data['password'], $user->password)) {
        $_SESSION['kod1197']['login'] = $data['login'];
        $_SESSION['kod1197']['id'] = $user->id;
    } else {
        $errors[] = 'Неверно введен пароль';
    }
} else {
    $errors[] = 'Пользователь с таким логином не найден';
}
if (!empty($errors)) {
    echo array_shift($errors);
}
?>
