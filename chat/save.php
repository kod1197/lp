<?php
session_start();
require_once "../cnf/db_rb.php";



$content = $_POST['message'];

if($_SESSION['kod1197']['login'] == 'kod1197'){
    $message = '<div class="message-admin">' . $content . '</div>';
}
else{
    $message = '<div class="message-default">' . $content . '</div>';
}

$get = $_POST['get'];

$chat = R::dispense('support');

$gets = explode('=', $get);
$id = $gets[1];

$chat->user = $_SESSION['kod1197']['login'];

$chat->message = $message;

$chat->conv = $id;
$chat->date = date("d.m.y");
R::store($chat);
?>