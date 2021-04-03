<?php
/**
 * Created by PhpStorm.
 * User: kod1197
 * Date: 6/19/2018
 * Time: 5:20 PM
 */

require_once('cpayeer.php');
$accountNumber = 'P1001606263';
$apiKey = 'U5ETbqWYwZjx3MGR';
$apiId = '595338525';
$payeer = new CPayeer($accountNumber, $apiId, $apiKey);
if ($payeer->isAuth())
{

    if($payeer->checkUser(array(
        'user' => 'P1001606342',
    )))
    {
        $arTransfer = $payeer->transfer(array(
            'curIn' => 'RUB',
            'sum' => 1,
            'curOut' => 'RUB',
            'to' => 'P1001606342',
            'comment' => 'test',
        ));
        if (empty($arTransfer['errors']))
        {
            echo $arTransfer['historyId'].": Перевод средств успешно выполнен";
        }
        else
        {
            echo '<pre>'.print_r($arTransfer["errors"], true).'</pre>';
        }
    }
    else
    {
        echo 'not found';
    }
}
else
{
    echo '<pre>'.print_r($payeer->getErrors(), true).'</pre>';
}

?>