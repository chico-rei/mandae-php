<?php

use ChicoRei\Packages\Mandae\Request\OrderAddParcelRequest;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function testeOrderAddParcelRequestObj()
    {
        $orderAddParcelReq = OrderAddParcelRequest::createFromArray([
            "customerId" => "CUSTOMER",
            "scheduling" => "2017-06-30T11:00:00-03:00",
            "items" => [
                [
                    "dimensions" => [
                        "height" => 10,
                        "width" => 10,
                        "length" => 10,
                        "weight" => 501
                    ],
                    "skus" => [
                        [
                            "skuId" => "SKU-001",
                            "description" => "Bermuda SKU Variação 1 Azul",
                            "ean" => "SKUVR1",
                            "price" => 46.51,
                            "freight" => 1.50,
                            "quantity" => 1
                        ],
                        [
                            "skuId" => "SKU-002",
                            "description" => "Camisa SKU Variação 2 Vermelha",
                            "ean" => "SKUVR2",
                            "price" => 100.00,
                            "freight" => 1.50,
                            "quantity" => 1
                        ]
                    ],
                    "invoice" => [
                        "id" => "11111",
                        "key" => "9999999999999999999999999999999999999"
                    ],
                    "trackingId" => "CHRI123456",
                    "observation" => "Item frágil",
                    "recipient" => [
                        "fullName" => "João Destinatário",
                        "phone" => "(11)91111-1111",
                        "email" => "exemplo-contato@mandae.com.br",
                        "address" => [
                            "postalCode" => "05305070",
                            "street" => "Rua Padre Meliton Vigueira Penillos",
                            "number" => "132",
                            "neighborhood" => "Vila Leopoldina",
                            "city" => "São Paulo",
                            "state" => "SP",
                            "country" => "BR",
                            "reference" => "Próximo a estação CPTM Vila Leopoldina"
                        ]
                    ],
                    "shippingService" => "Economico",
                    "qrCodes" => [
                        "AAA098",
                        "AAA099"
                    ],
                    "valueAddedServices" => [
                        [
                            "name" => "ValorDeclarado",
                            "value" => 146.51
                        ]
                    ],
                    "channel" => "ecommerce",
                    "store" => "Sample Store",
                    "totalValue" => 42.0,
                    "totalFreight" => 3.14
                ]
            ],
            "sender" => [
                "fullName" => "Chico Rei",
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
            "vehicle" => "Car"
        ]);

        $this->assertEquals('CUSTOMER', $orderAddParcelReq->getCustomerId());
        $this->assertEquals('2017-06-30T11:00:00-03:00', $orderAddParcelReq->getScheduling()->toAtomString());
        $this->assertEquals(1, count($orderAddParcelReq->getItems()));
        $this->assertEquals('Car', $orderAddParcelReq->getVehicle());
        $this->assertEquals('Chico Rei', $orderAddParcelReq->getSender()->getFullName());
        $this->assertEquals('36038090', $orderAddParcelReq->getSender()->getAddress()->getPostalCode());
        $this->assertEquals('Rua Jorge Fayer', $orderAddParcelReq->getSender()->getAddress()->getStreet());
        $this->assertEquals('55', $orderAddParcelReq->getSender()->getAddress()->getNumber());
        $this->assertEquals('Bairro Santos Dummont', $orderAddParcelReq->getSender()->getAddress()->getNeighborhood());
        $this->assertEquals('Juiz de Fora', $orderAddParcelReq->getSender()->getAddress()->getCity());
        $this->assertEquals('MG', $orderAddParcelReq->getSender()->getAddress()->getState());
        $this->assertEquals('BR', $orderAddParcelReq->getSender()->getAddress()->getCountry());
    }
}
