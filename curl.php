<?php
require "cnf/includes.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="fortest.js"></script>
    <title>Document</title>
</head>
<body>

<form action="javascript:download();">
    <input type="text" placeholder="URL изображения для скачивания" name="url" id="url"><br>
    <input type="submit" value="Скачать" name="do_download">
</form>
</body>
</html>