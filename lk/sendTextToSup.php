<?php
    session_start();
    require "../cnf/db_rb.php";
    
    $text = $_POST['textToSup'];
    $header = $_POST['ticketHeader'];
    
    $textToSup = R::dispense('support');
    $textToSup->text = $text;
    $textToSup->header = $header;
    $textToSup->senderId = $_SESSION['kod1197']['id'];
    $textToSup->date = date("d.m.y");
    $textToSup->status = '<b>Вопрос открыт';
    R::store($textToSup);
?>