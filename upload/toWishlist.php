<?php
    session_start();
    require "../cnf/db.php";
	require "../cnf/vars.php";
    
    $idImg = $_POST['id'];
    $idUsr = $_SESSION['kod1197']['id'];
    
    $qr = "select * from favorites where idUsr = $idUsr and idImg = $idImg";
    
    $res = mysqli_query($connect, $qr);
    $arr = $res->fetch_assoc();
    
    if(empty($arr)){
       $query = "INSERT INTO `lp`.`favorites` (`idUsr`, `idImg`) VALUES ('$idUsr', '$idImg')";
       mysqli_query($connect, $query);
    }
    else{
        echo 'Что то пошло не так';

    }
    
    




?>