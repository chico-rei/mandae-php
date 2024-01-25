<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../vendor/autoload.php';

use \ChicoRei\Packages\Mandae\Mandae;
use \ChicoRei\Packages\Mandae\Request\OrderAddParcelRequest;

$mandae = new Mandae('TOKEN', true);

try {
    $orderAddParcel = OrderAddParcelRequest::create([
        "customerId" => "CUSTOMER_ID",
        "items" => [
            [
                "volumes" => [
                    [
                        "volumeId" => "CNRMCABCDE987",
                        "dimensions" => [
                            "height" => 0,
                            "width" => 0,
                            "length" => 0,
                            "weight" => 0
                        ],
                    ]
                ],
                "skus" => [
                    [
                        "skuId" => "SKU-001",
                        "description" => "Bermuda SKU Variação 1 Azul",
                        "ean" => "SKUVR1",
                        "price" => 46.51,
                        "quantity" => 1
                    ],
                    [
                        "skuId" => "SKU-002",
                        "description" => "Camisa SKU Variação 2 Vermelha",
                        "ean" => "SKUVR2",
                        "price" => 100.00,
                        "quantity" => 1
                    ]
                ],
                "invoice" => [
                    "id" => "123456",
                    "key" => "12345678901234567890123456789012345678901234",
                    "type" => "NFe",
                ],
                "trackingId" => "CNRMC123459956",
                "partnerItemId" => "44948w4q9d849w8q4d",
                "observation" => "Item frágil",
                "recipient" => [
                    "fullName" => "João Destinatário",
                    "phone" => "11911111111",
                    "email" => "exemplo-contato@mandae.com.br",
                    "document" => "70949559016",
                    "address" => [
                        "postalCode" => "05305070",
                        "street" => "Rua Padre Meliton Vigueira Penillos",
                        "number" => "132",
                        "neighborhood" => "Vila Leopoldina",
                        "addressLine2" => "Apto 255",
                        "city" => "São Paulo",
                        "state" => "SP",
                        "country" => "BR",
                        "reference" => "Próximo a estação CPTM Vila Leopoldina"
                    ]
                ],
                "sender" => [
                    "fullName" => "Chico Rei",
                    "phone" => "11911111111",
                    "email" => "exemplo-contato@chicorei.com.br",
                    "document" => "09148763000159",
                    "address" => [
                        "postalCode" => "36038090",
                        "street" => "Rua Jorge Fayer",
                        "number" => "55",
                        "neighborhood" => "Bairro Santos Dummont",
                        "city" => "Juiz de Fora",
                        "state" => "MG",
                        "country" => "BR"
                    ]
                ],
                "shippingService" => "Econômico",
                "valueAddedServices" => [
                    [
                        "name" => "ValorDeclarado",
                        "value" => 146.51
                    ]
                ],
                "channel" => "ecommerce",
                "store" => "Chico Rei",
                "totalValue" => 42.0,
                "totalFreight" => 3.14
            ]
        ],
        "observation" => "A"
    ]);

    $response = $mandae->order()->addParcel($orderAddParcel);

    var_dump($response->toArray());
} catch (Exception $e) {
    echo 'Code: ' . $e->getCode() . PHP_EOL;
    echo 'Message: ' . $e->getMessage() . PHP_EOL;
}

