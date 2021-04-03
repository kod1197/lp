<?php
require_once "../cnf/includes.php";

if(isset($_POST['dobavit'])){
    $i = 0;
    foreach ($_FILES['img'] as $f['img']){
        echo '<pre>';
        print_r($_FILES['img']);
        echo '</pre>';
    }

}

?>
<head>
    <title>Тест мультизагрузки файлов</title>
    <script type="text/javascript" src="test.js"></script>
</head>
<body>
    <form enctype="multipart/form-data" method="post">
        <input type="file" id="cur" multiple name="img[]">
        <br>
        <input type="submit" name="dobavit" value="Отправить файлы">
    </form>
    <span onclick="add()" id="addmore" style="height:100px; width:100px; background:aqua; cursor:pointer; border:1px dashed;">Добавить поле для загрузки</span>

<?php
foreach ($js as $js_file){
    echo $js_file;
}
?>
</body>
