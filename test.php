<?php
if (isset($_POST['do_download'])) {
    /*== Получаем URL из формы ==*/
    $url = $_POST['url'];

    /*== Магия curl'ов, качаем файл на сервер ==*/
    $ch = curl_init($url);
    $path_parts = pathinfo($url);
    $fp = fopen('kartinki/' . $path_parts['basename'], 'wb');
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);

    /*== Вытаскиваем имя файла и расширение ==*/
    $filename = $path_parts['basename'];
    $file_extension = strtolower(substr(strrchr($path_parts['basename'], "."), 1));

    /*== Проверка, если файл не подходит по png, jpeg, jpg - значит вырубаем скрипт и ругаемся ==*/
    /*== Есть какие-то сервисы где у картинок нет расширения в ссылке, учитываем это ==*/
    switch ($file_extension) {
        case "png":
            $ctype = "image/png";
            break;
        case "jpeg":
        case "jpg":
            $ctype = "image/jpg";
            break;
        default:
            exit("Расширение файла не похоже на картинку или отсутсвует");
    }

        /*== Если всё прошло хорошо - скачиваем картинку с сервера ==*/
        /*== К имени файла дописываем папку ==*/
        $endfile = 'kartinki/' . $filename;

        header("Content-Length: " . filesize($endfile));
        header("Content-Disposition: attachment; filename=" . $endfile);
        header("Content-Type: image/* ; name=\"" . $endfile . "\"");
        readfile($endfile);

}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form method="post">
    <input type="text" placeholder="URL изображения для скачивания" name="url" id="url"><br>
    <input type="submit" value="Скачать" name="do_download">
</form>
</body>
</html>