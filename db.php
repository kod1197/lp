<?php
    session_start();
    require "rb.php";
        R::setup( 'mysql:host=localhost;dbname=kibirev',
        'root', '' ); //for both mysql or mariaDB

?>