<?php
    require "../cnf/db_rb.php";
    require_once('cpayeer.php');
    session_start();
    $summ = $_POST['summ'];
    $number = $_POST['number'];
    $login = $_SESSION['kod1197']['login'];

    $accountNumber = 'P1001606263';
    $apiKey = 'U5ETbqWYwZjx3MGR';
    $apiId = '595338525';
    $payeer = new CPayeer($accountNumber, $apiId, $apiKey);
    $arBalance = $payeer->getBalance();
    if ($payeer->isAuth()) {
        if ($arBalance['balance']['RUB']['BUDGET'] > $summ) {
            if ($payeer->checkUser(array(
                'user' => $number,
            ))) {
                if (empty($arTransfer['errors'])) {
                    $arTransfer = $payeer->transfer(array(
                        'curIn' => 'RUB',
                        'sum' => $summ,
                        'curOut' => 'RUB',
                        'to' => $number,
                        'comment' => 'Вывод средств с сайта kod1197.ru/lp',
                    ));
                    $payoutObject = R::dispense('payouts');
                    $payoutObject->summ = $summ;
                    $payoutObject->number = $number;
                    $payoutObject->login = $login;
                    $payoutObject->date = date("d.m.y");

                    R::store($payoutObject);

                    $user = R::findOne('users', 'id = ?', array($_SESSION['kod1197']['id']));
                    $balance = $user->balance;
                    $newBalance = $balance - $summ;

                    $newUserBalance = R::findOne('users', 'id = ?', array($_SESSION['kod1197']['id']));
                    $newUserBalance->balance = $newBalance;
                    R::store($newUserBalance);
                } else {
                    echo '1';
                }
            } else {
                echo '2';
            }
        }
        else{
            echo '1';
        }
    }
    else
    {
        print_r($payeer->getErrors(), true);
    }
?>