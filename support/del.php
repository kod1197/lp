<?php
    session_start();
    require "../cnf/db_rb.php";
    require_once "../cnf/includes.php";
    
    $id = $_POST['id'];
    
    $ticket = R::findOne('support', 'id = ?',array($_POST['id']));
    R::trash($ticket);
    
?>