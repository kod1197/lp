<?php
    require '../cnf/db.php';
    session_start();
	$author = $_POST['login'];
	$query = "select * from img where author='".$author."'";
	$results = mysqli_query($connect, $query);
	while($row = $results->fetch_assoc()){
	  echo '<a target="_blank" href="http://kod1197.ru/lp/upload/image.php?id='.$row['id'].'">' .$row['img']. '</a> дата:' . $row["date"].'';
	  echo '<br>';
	}
?>