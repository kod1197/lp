<?php
    session_start();
    require "rb.php";
        R::setup( 'mysql:host=;dbname=',
        '', '' ); //for both mysql or mariaDB

?>