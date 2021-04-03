<?php
    require "../cnf/db_rb.php";
    session_start();
    
    $summ = $_POST['summ'];
    $system = $_POST['system'];
    $number = $_POST['number'];
    $login = $_SESSION['kod1197']['login'];
    
    $payoutObject = R::dispense('payouts');
    $payoutObject->summ = $summ;
    $payoutObject->system = $system;
    $payoutObject->number = $number;
    $payoutObject->login = $login;
    $payoutObject->date = date("d.m.y");
    
    R::store($payoutObject);
    
    $user = R::findOne('users', 'id = ?', array($_SESSION['kod1197']['id']));
    $balance = $user->balance;
    $newBalance = $balance - $summ;
    
    $newUserBalance =  R::findOne('users', 'id = ?', array($_SESSION['kod1197']['id']));
    $newUserBalance->balance = $newBalance;
    R::store($newUserBalance);
?>