<?php
    require "../cnf/db.php";
    session_start();
	$id = $_POST['id'];
	$query = "select * from img where id in ((select idImg from favorites where idUsr = '$id'))";
	$results = mysqli_query($connect, $query);
	while($row = $results->fetch_assoc()){
	  echo '<a target="_blank" href="http://kod1197.ru/lp/upload/image.php?id='.$row['id'].'">' .$row['name']. '</a> <a onClick="delFromWish('.$row['id'].')"> | удалить</a>';
	  echo '<br>';
	}
?>