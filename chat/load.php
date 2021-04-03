<?php
session_start();
require_once "../cnf/db_rb.php";

$messages = R::findAll('chat');
foreach ($messages as $message){
    echo $message->user . ': ' . $message->message . '<br>';
}
?>