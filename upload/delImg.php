<?php
   require "../cnf/db.php";
    $id = $_POST['idImg'];
	$query = "delete from img where id=".$id."";
	mysqli_query($connect, $query);
	
	header("Location: https://kod1197.ru/lp/search.php");
?>