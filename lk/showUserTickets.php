<?php 
    session_start();
    require "../cnf/db_rb.php";
    $tickets = R::find('support', "sender_id = ?", array($_SESSION['kod1197']['id']));
    foreach($tickets as $ticket){
        echo '<a target="_blank" href="https://kod1197.ru/lp/support/ticket.php?id='.$ticket->id.'">';
        echo "Id: $ticket->id, $ticket->header<br>";
        echo '<a>';
    }
    
?>