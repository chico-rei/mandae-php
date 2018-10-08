<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../vendor/autoload.php';

use \ChicoRei\Packages\Mandae\Mandae;

$mandae = new Mandae('TOKEN', true);

try {
    $response = $mandae->postalCode()->rates([
        'postalCode' => '36016450',
        'dimensions' => [
            'height' => 20,
            'weight' => 1,
            'width' => 20,
            'length' => 10,
        ]
    ]);

    var_dump($response->toArray());
} catch (Exception $e) {
    echo 'Code: ' . $e->getCode() . PHP_EOL;
    echo 'Message: ' . $e->getMessage() . PHP_EOL;
}