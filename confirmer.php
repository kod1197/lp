<?php
/**
 * Created by PhpStorm.
 * User: kibir
 * Date: 24.09.2017
 * Time: 16:37
 */


require "cnf/db.php";
require "cnf/db_rb.php";


$login = $_GET['login'];
$hashConfirm = $_GET['hash'];

$user = R::findOne('users', 'login = ?',array($login));
$hash = $user->hash;
$active = $user->activated;
if($active == '1'){
    echo 'Ваш аккаунт уже активирован и в повторной активиции не нуждается';
    echo '<br>';
    echo '<a href="index.php"> Назад </a>';
}
else{
    if($hash == $hashConfirm){
        echo "Вы успешно активировали свой аккаунт";
        echo '<br>';
        echo '<a href="index.php"> Назад </a>';
        $user->activated = '1';
        R::store($user);
    }
    else{
        echo "Видимо вы неудачник";
        echo '<br>';
        echo '<a href="index.php"> Назад </a>';
    }
}
?>