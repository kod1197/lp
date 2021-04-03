<?php
require "cnf/db_rb.php";
unset($_SESSION);
session_destroy();
header('Location: https://kod1197.ru/lp/index.php');
?>