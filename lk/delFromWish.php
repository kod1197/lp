<?php
	session_start();
	require "../cnf/db_rb.php";
	require "../cnf/db.php";

$favId = $_POST['id'];
$usrId = $_POST['usr'];

$query = "DELETE FROM `favorites` WHERE idUsr = '$usrId' AND idImg = '$favId'";
R::exec($query);



?>