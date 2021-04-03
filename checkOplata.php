<?php

/**
 * Created by PhpStorm.
 * User: kibir
 * Date: 24.09.2017
 * Time: 17:48
 */

// as a part of SuccessURL script
$mrh_login = "BGstock ";
// your registration data
$mrh_pass1 = "Qwerty11";  // merchant pass1 here

// HTTP parameters:
$out_summ = $_REQUEST["OutSum"];
$inv_id = $_REQUEST["InvId"];
$crc = $_REQUEST["SignatureValue"];
$shp_item = $_REQUEST["shp_item"];
$crc = strtoupper($crc);  // force uppercase

// build own CRC
$my_crc = strtoupper(md5("$mrh_login::$inv_id:$mrh_pass1:shp_Item=$shp_item"));

if ($my_crc != $crc)
{
    echo "bad sign\n";
    echo $my_crc;
    exit();
}

// you can check here, that resultURL was called
// (for better security)

// OK, payment proceeds
echo "Thank you for using our service\n";

?>