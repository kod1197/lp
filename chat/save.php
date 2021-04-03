<?php
session_start();
require_once "../cnf/db_rb.php";
$message = $_POST['message'];

$chat = R::dispense('chat');
$chat->user = $_SESSION['kod1197']['login'];
$chat->message = $message;
R::store($chat);
?>