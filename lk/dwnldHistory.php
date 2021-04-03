<?php
    require "../cnf/db.php";
    session_start();
	$id = $_POST["id"];
	$query = "select * from listofsavedimgs where idUser=".$id."";
	$results = mysqli_query($connect, $query);
	while($row = $results->fetch_assoc()){
	  echo '<a target="_blank" href="http://kod1197.ru/lp/upload/image.php?id='.$row['imgId'].'">' .$row['img']. '</a> дата:'.$row["date"].'';
	  echo '<br>';
	}
?>