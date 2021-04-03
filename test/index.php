<?php
/**
 * Created by PhpStorm.
 * User: kod1197
 * Date: 03.04.2018
 * Time: 18:29
 */

include 'LImageHandler.php';

$i = new LImageHandler;

$i->load('Z9W5Z.jpg');

$i->text('TEST WATERMARK KOD1197.RU','11723.ttf','24',array(0,255,0),'1','1','2');

$i->save();

?>