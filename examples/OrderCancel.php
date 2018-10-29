<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../vendor/autoload.php';

use \ChicoRei\Packages\Mandae\Mandae;

$mandae = new Mandae('TOKEN', true);

try {
    $response = $mandae->order()->cancel([
        'orderId' => 'ID'
    ]);

    var_dump($response);
} catch (Exception $e) {
    echo 'Code: ' . $e->getCode() . PHP_EOL;
    echo 'Message: ' . $e->getMessage() . PHP_EOL;
}
