<?php 
require_once "../cnf/db_rb.php";

$tickets = R::findAll('support', 'main = ?', array(1));
foreach($tickets as $ticket){
    echo '<a target="_blank" href="https://kod1197.ru/lp/support/ticket.php?id='.$ticket->id.'">';
    echo "Id: $ticket->id, $ticket->header<br>";
    echo '<a>';
}


?>