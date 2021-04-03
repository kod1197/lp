<?php
    session_start();
    echo'<li><a href="https://kod1197.ru/lp/index.php">Главная</a></li>';

    if(isset($_SESSION['kod1197']['login'])){
    echo '<li><a style="cursor: default;">Здравствуйте, '.$_SESSION['kod1197']['login']. '</a></li>';
    echo'    
    <li><a href="https://kod1197.ru/lp/lk/testlk.php">Личный кабинет</a></li>
    <li><a href="https://kod1197.ru/lp/upload/index.php">Загрузить изображение</a></li>
    <li><a href="https://kod1197.ru/lp/logout.php">Выход</a></li>
    ';
    if($_SESSION['kod1197']['login'] == 'kod1197'){
        echo '<li><a href="https://kod1197.ru/lp/admin">Админ панель</a></li>';
    }
    }
    else{
    echo'
    <li class="main-nav"><a class="cd-signin" href="#0">Вход</a></li>
    <li class="main-nav"><a class="cd-signup" href="#0">Регистрация</a></li> 
    ';
    }
//    <li><a href="http://kod1197.ru/lp/auth.php">Вход</a></li>
//    <li><a href="http://kod1197.ru/lp/signup.php">Регистрация</a></li>
?>