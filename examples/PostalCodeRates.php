<?php
require '../vendor/autoload.php';

use \ChicoRei\Packages\Mandae\Mandae;

$Mandae = new Mandae('TOKEN', ['sandbox' => true]);

try {
    $response = $Mandae->postalCode()->rates([
        'postalCode' => 36016450,
        'dimensions' => [
            'height' => 20,
            'weight' => 1,
            'width' => 20,
            'length' => 10,
        ]
    ]);

    var_dump($response->toArray());
} catch (Exception $e) {
    echo 'Code: '.$e->getCode().PHP_EOL;
    echo 'Message: '.$e->getMessage().PHP_EOL;
}