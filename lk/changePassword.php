<?php 
	session_start();
	require "../cnf/db_rb.php";
	require "../cnf/db.php";
	$oldPwd = $_POST['oldPwd'];
	$newPwd = $_POST['newPwd'];
	$user = R::findOne('users', 'login = ?',array($_SESSION['login']));
	if(password_verify($oldPwd, $user->password)){
		$login = $_SESSION['login'];
		$password =  password_hash($newPwd, PASSWORD_DEFAULT);
		$query = "UPDATE users SET password='".$password."' where login='".$login."'";
		R::exec($query);
		echo 'Пароль успешно изменен';
	}
	else{
		echo 'Вы ввели не верный старый пароль';
	}
?>