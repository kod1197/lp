<?php
    session_start();
    require  "../cnf/mailer/PHPMailerAutoload.php";
    require "../cnf/db_rb.php";
    
    $text = $_POST['textToSup'];
    $header = $_POST['ticketHeader'];



    $textToSup = R::dispense('support');
    $textToSup->text = $text;
    $textToSup->conv = $id;
    $textToSup->header = $header;
    $textToSup->senderId = $_SESSION['kod1197']['id'];
    $textToSup->date = date("d.m.y");
    $textToSup->status = '0';
    $textToSup->main = '1';
    R::store($textToSup);
    $id = R::getInsertID();
    $qr = "UPDATE  support SET  conv =  $id WHERE  id = $id";
    R::exec($qr);

    $link = "https://kod1197.ru/lp/support/ticket.php?id=$id";

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
    $mail->addAddress('kibirev68@yandex.ru', 'support');
    $mail->Subject = 'Новая заявка в тех поддержке';
    $mail->Body = 'В тех поддержку поступил новый тикет. Статус: Открыт. Ссылка на тикет: '. $link .' ';
    $mail->send();
?>