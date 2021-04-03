<?php
session_start();
require "../cnf/db.php";
require_once "../cnf/db_rb.php";
$filename = $_GET['filename'];
$id = $_SESSION["id"];
$imgId = $_GET['idImg'];
 
 // нужен для Internet Explorer, иначе Content-Disposition игнорируется
if(ini_get('zlib.output_compression'))
  ini_set('zlib.output_compression', 'Off');
 
$file_extension = strtolower(substr(strrchr($filename,"."),1));
 
if( $filename == "" )
{
          echo "ОШИБКА: не указано имя файла.";
          exit;
} elseif ( ! file_exists( $filename ) ) // проверяем существует ли указанный файл
{
          echo "ОШИБКА: данного файла не существует.";
          exit;
};
switch( $file_extension )
{
          case "png": $ctype="image/png"; break;  
          case "jpeg":
          case "jpg": $ctype="image/jpg"; break;
          default: $ctype="application/force-download";
}
$paid = $_GET['price'];
if(isset($paid)){
    
/* Отнимаем деньги у покупателя */
    $user = R::findOne('users', 'id = ?', array($_SESSION['kod1197']['id']));
    if($user->balance == 0){
        die('При нулевом балансе нельзя купить что либо');
    }
    if($user->balance < $paid){
        die('На счету не достаточно денег для покупки');
    }
    $oldBalance = $user->balance;
    $newBalance = $oldBalance - $paid;
    $user->balance = $newBalance;
    R::store($user);

/* Перевод денег автору изображения */
    $author = R::findOne('img', 'id = ?', array($imgId));
    $authorName = $author->author;
    $authorBal = R::findOne('users', 'login = ?', array($authorName));
    $oldAuthorBalance = $authorBal->balance;
    $newAuthorBalance = $oldAuthorBalance + $paid;
    $authorBal->balance = $newAuthorBalance;
    R::store($authorBal);



}

$filenameToBd = substr($filename, 4, 36);
$date = date("d.m.y");  
$query = "INSERT INTO listofsavedimgs (idUser, img, imgId, date) VALUES ('$id', '$filenameToBd', '$imgId', '$date')";
$results = mysqli_query($connect, $query);

header("Pragma: public"); 
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false); // нужен для некоторых браузеров
header("Content-Type: $ctype");
header("Content-Disposition: attachment; filename=\"".basename($filename)."\";" );
header("Content-Transfer-Encoding: binary");
header("Content-Length: ".filesize($filename)); // необходимо доделать подсчет размера файла по абсолютному пути
readfile("$filename");
exit();
?>