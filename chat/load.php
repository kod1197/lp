<?php
session_start();
require_once "../cnf/db_rb.php";
$get = $_POST['get'];

$gets = explode('=', $get);
$id = $gets[1];

$messages = R::findAll('support', 'conv = ?', array($id));
foreach ($messages as $message){
    echo $message->user . ' ' . $message->message . '<br>';
}
?>