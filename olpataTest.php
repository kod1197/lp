<?php
session_start();
$summa = $_POST['summa'];

if(!preg_match('/[0-9]{1,}/', $summa)){
    header('Location: index.php');
}

$login = 'BGstock'; // Идентификатор клиента (был вами задан при регистрации в робокассе)
$pass1 = 'Qwerty11'; // Пароль №1 (указывается на вкладке "Технические настройки")
$summa = $_POST['summa']; // Сумма платежа
$id = $_SESSION['id'];
$desc = '1'; // Описание платежа
$signature = md5($login . ":" . $summa . ":" . $id . ":" . $pass1); // Уникальная подпись платежа
?>
<head>
    <title>
        Подверждение оплаты
    </title>
    <link rel="stylesheet" href="css/pay.css">
</head>
<body>
    <div id="wrapper">

        <h1 id="topTitle">Подтверждение оплаты</h1>
        <h3 id="topSubtitle">Сумма оплаты: <?php echo $summa; ?> рубля</h3>
        <div id="formWrapper">
            <form method="post" action='https://merchant.roboxchange.com/Index.aspx?isTest=1'>
                <input type="hidden" name="MrchLogin" value="<?=$login ?>" />
                <input type="hidden" name="OutSum" value="<?=$summa ?>" />
                <input type="hidden" name="InvId" value="<?=$id ?>" />
                <input type="hidden" name="Desc" value="<?=$desc ?>" />
                <input type="hidden" name="SignatureValue" value="<?=$signature;?>" />
                <input id="confirmButton" type="submit" value="Подвердить и перейти к оплате" />
                <a href="https://kod1197.ru/lp/lk/testlk.php">Отказаться от оплаты</a>
            </form>
        </div>
    </div>
</body>
