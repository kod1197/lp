<?php 
	session_start();
	require "../cnf/db_rb.php";
	require "../cnf/db.php";
	$oldPwd = $_POST['oldPwd'];
	$newPwd = $_POST['newPwd'];
	$user = R::findOne('users', 'login = ?',array($_SESSION['kod1197']['login']));
	if(password_verify($oldPwd, $user->password)){
		$login = $_SESSION['kod1197']['login'];
		$password =  password_hash($newPwd, PASSWORD_DEFAULT);
		$user->password = $password;
		R::store($user);
//		$query = "UPDATE users SET password = '$password' where login = $login";

		echo 'Пароль успешно изменен';
	}
	else{
		echo 'Вы ввели не верный старый пароль';
	}
?>


