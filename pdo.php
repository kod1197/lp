<?php
/**
 * Created by PhpStorm.
 * User: kod1197
 * Date: 25.03.2018
 * Time: 14:00
 */

$db = new PDO("mysql:host=localhost; dbname=9092902629",'9092902629', '311297gamer');
$res = $db->query("SELECT * from users");
foreach ($res as $r){
    echo $r['login'] . '<br>';
}

?>