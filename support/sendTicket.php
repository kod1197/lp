<?php 
require_once "../cnf/db_rb.php";

$answer = $_POST['answer'];

$ticketAnswer = R::findOne('support', 'id = ?', array($_POST['id']));
$ticketAnswer->answer = $answer;
$ticketAnswer->status = '1';
R::store($ticketAnswer);

?>