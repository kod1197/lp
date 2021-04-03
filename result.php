<?php
//Прописываем второй пароль
$password2 = 'Qwerty97';
//Списуем параметры
$id = $_POST["InvId"];
//сумма
$summ = $_POST["OutSum"];
//Signature
$crc = $_POST["SignatureValue"];
//Проверка вашей уникальной подписи(ключа)
if ( strtolower($crc) != strtolower(md5($_POST['OutSum'] . ":" . $id . ":" . $password2)) ) {
    // не совпадает подпись
    echo "ERR: error signature";
    exit();
}
//Если все норм
echo "Ok $id\n";

?>