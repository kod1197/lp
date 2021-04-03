<?php
/*== Подключение к бд, старт сессии ==*/
require '../cnf/db_rb.php';
/*== Проверка на залогиненного пользователя ==*/
if (isset($_SESSION['kod1197']['login'])) {
    /*== Получаем расширение файла ==*/
    $test = $_FILES['img']['name'];
    $ext = substr(strrchr($test, '.'), 1);
    /*== Проверка на разрешенное расширение файла ==*/
    if ($ext == "jpg" or $ext == "jpeg" or $ext == "png" or $ext == "PNG") {
        /*== Меняем название изображения на хэш ==*/
        $imgHash = substr(md5(microtime() . rand(0, 9999)), 0, 32) . '.' . $ext;
        /*== Выбираем папку для загрузки ==*/
        $uploaddir = 'img/';
        /*== Генерация полного пути к загружаемому файлу ==*/
        $uploadfile = $uploaddir . $imgHash;
        /*== Загружаем файл, проверяем есть ли файл вообще ==*/
        if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
            /*== Получаем тег из выпадающего списка ==*/
            $idTag = $_POST['tagger'];
            /*== Тег из списка должен быть обязательно выбран ==*/
            if (empty($idTag)) {
                /*== Выводим ошибку если тега нет ==*/
                echo "Выбирать тег из списка обязательно!";
            } else {
                /*== Создание и загрузка объекта в RedBean php ==*/
                $img = R::dispense('img');
                $img->img = $imgHash;
                $img->date = date("d.m.y");
                $img->name = Trim(stripslashes($_POST['name']));
                $img->text = Trim(stripslashes($_POST['opisanie']));
                $img->author = $_SESSION['kod1197']['login'];
                $img->price = Trim($_POST['price']);
                $img->paid = $_POST['paid'];
                R::store($img);
                /*== Получаем id текущей записи для создания связи ==*/
                $idImg = R::getInsertID();
                /*== Генерируем запрос для создания связи ==*/
                $qr = "INSERT INTO `9092902629`.`etot` (`id`, `idImg`, `idTag`) VALUES (NULL, $idImg, $idTag)";
                /*== Выполнение запроса к базе данных через RedBean php ==*/
                R::exec($qr);
                /*== Переадресация на ту же страницу, для обновления форма ==*/
                header("Location: https://kod1197.ru/lp/upload/index.php");
            }
        } /*== Если файла нет, выводим ошибку ==*/
        else {
            echo "Возможная атака с помощью файловой загрузки!\n";
        }
    } /*== Если проверка не пройдена - выводим ошибку ==*/
    else {
        echo "Ошибка! Неправильный тип файла";
        echo "<br>";
        echo "Можно загружать jpeg, jpg, png";
    }
} /*== Если пользователь не залогинен, переадресация на логин ==*/
else {
    header("Location: index.php");
}
?>