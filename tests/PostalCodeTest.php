<?php

namespace ChicoRei\Packages\Mandae\Tests;

use ChicoRei\Packages\Mandae\Mandae;
use ChicoRei\Packages\Mandae\Exception\MandaeAPIException;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\HandlerStack;

class PostalCodeTest extends TestCase
{
    public function testInvalidParamsToken()
    {
        $mock = new MockHandler([
            new Response(401, [], '{"error":{"code": "401","message": "Invalid access token"}}'),
            new Response(422, [], '{"error":{"code": "422","message": "Tamanho do campo Cep deve estar entre 8 e 8"}}'),
        ]);

        $handler = HandlerStack::create($mock);
        $mandae = new Mandae('INVALID_TOKEN', true, ['handler' => $handler]);

        try {
            $mandae->postalCode()->rates([
                'postalCode' => '36016450',
                'items' => [
                    [
                        'height' => 15,
                        'weight' => 1,
                        'width' => 15,
                        'length' => 10,
                        'quantity' => 1,
                        'declaredValue' => 50.3,
                    ]
                ]
            ]);
        } catch (MandaeAPIException $e) {
            $this->assertEquals('401', $e->getCode());
            $this->assertEquals('Invalid access token', $e->getMessage());
        }

        try {
            $mandae->postalCode()->rates([
                'postalCode' => '36016-450',
                'items' => [
                    [
                        'height' => 15,
                        'weight' => 1,
                        'width' => 15,
                        'length' => 10,
                        'quantity' => 1,
                        'declaredValue' => 50.3,
                    ]
                ]
            ]);
        } catch (MandaeAPIException $e) {
            $this->assertEquals('422', $e->getCode());
            $this->assertEquals('Tamanho do campo Cep deve estar entre 8 e 8', $e->getMessage());
        }
    }

    public function testSuccessfulRequest()
    {
        $mock = new MockHandler([
            new Response(200, [], <<<EOT
                {
                    "data": {
                       "postalCode":"36016450",
                       "shippingServices":[
                          {
                             "name":"Econômico",
                             "days":20,
                             "price":63.18
                          },
                          {
                             "name":"Rápido",
                             "days":12,
                             "price":81.68
                          }
                       ]
                   }
                }
EOT
            ),
        ]);

        $handler = HandlerStack::create($mock);
        $mandae = new Mandae('TOKEN', true, ['handler' => $handler]);

        $response = $mandae->postalCode()->rates([
            'postalCode' => '36016450',
            'items' => [
                [
                    'height' => 15,
                    'weight' => 1,
                    'width' => 15,
                    'length' => 10,
                    'quantity' => 1,
                    'declaredValue' => 50.3,
                ]
            ]
        ]);

        $this->assertEquals('36016450', $response->getPostalCode());
        $this->assertEquals(2, count($response->getShippingServices()));
        $this->assertEquals(63.18, $response->getEconomicShipping()->getPrice());
        $this->assertEquals(81.68, $response->getFastShipping()->getPrice());
    }
}
