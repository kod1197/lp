<?php
require "cnf/db.php";
require "cnf/db_rb.php";
require "cnf/mailer/PHPMailerAutoload.php";
date_default_timezone_set('Etc/UTC');

$Email = $_POST['Email'];
$secret = $_POST['secret'];
$user = R::findOne('users', 'email = ?',array($_POST['Email']));
if($user){
	$bdSecret = $user->secret;
	if($secret == $bdSecret){
		$randPwd = substr(md5(microtime() . rand(0, 9999)), 0, 10);
		$newPwd = password_hash($randPwd, PASSWORD_DEFAULT);
		$query = "UPDATE users SET password='".$newPwd."' where email='".$Email."'";
		R::exec($query);

		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->CharSet = "utf-8";
		$mail->SMTPDebug = 0;
		$mail->Debugoutput = 'html';
		$mail->Host = "smtp.yandex.ru";
		$mail->Port = 465;
		$mail->SMTPSecure = 'ssl';
		$mail->SMTPAuth = true;
		$mail->Username = "admin@kod1197.ru";
		$mail->Password = "311297gamer";
		$mail->setFrom('admin@kod1197.ru', 'kod1197.ru');
		$mail->addAddress($Email, $Email);
		$mail->Subject = 'Сброс пароля';
		$mail->Body    = 'Ваш новый пароль: ' . $randPwd ."\r\n".' обязательно поменяйте пароль после сброса';

		if (!$mail->send()) {
			 echo "Произошла ошибка: " . $mail->ErrorInfo . ' ';
			 var_dump($Email);
            }
	}
	else{
		echo 'Не правильное секретное слово';
	}
}
else{
	echo 'Email не существует или не правильно введён';
}

?>