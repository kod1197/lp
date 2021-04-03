<?php
session_start();
require_once "../cnf/db_rb.php";

$editname = $_POST['editname'];
$editauthor = $_POST['editauthor'];
$editdate = $_POST['editdate'];
$editprice = $_POST['editprice'];
$editpaid = $_POST['editpaid'];
$id = $_POST['id'];



$image = R::findOne('img', 'id = ?',array($_POST['id']));
$image->name = $editname;
$image->author = $editauthor;
$image->date = $editdate;
$image->price = $editprice;
$image->paid = $editpaid;
R::store($image);


?>