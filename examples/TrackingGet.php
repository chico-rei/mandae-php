<?php
error_reporting(E_ALL); ini_set('display_errors', 1);

require '../vendor/autoload.php';

use \ChicoRei\Packages\Mandae\Mandae;

$Mandae = new Mandae('TOKEN', true);

try {
    $response = $Mandae->tracking()->get([
        'trackingCode' => '23A6BKMQ313M0'
    ]);

    var_dump($response->toArray());
} catch (Exception $e) {
    echo 'Code: '.$e->getCode().PHP_EOL;
    echo 'Message: '.$e->getMessage().PHP_EOL;
}