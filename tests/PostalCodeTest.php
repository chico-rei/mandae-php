<?php

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
                'dimensions' => ['height' => 20, 'weight' => 1, 'width' => 20, 'length' => 10,]
            ]);
        } catch (MandaeAPIException $e) {
            $this->assertEquals('401', $e->getCode());
            $this->assertEquals('Invalid access token', $e->getMessage());
        }

        try {
            $mandae->postalCode()->rates([
                'postalCode' => '36016-450',
                'dimensions' => ['height' => 20, 'weight' => 1, 'width' => 20, 'length' => 10,]
            ]);
        } catch (MandaeAPIException $e) {
            $this->assertEquals('422', $e->getCode());
            $this->assertEquals('Tamanho do campo Cep deve estar entre 8 e 8', $e->getMessage());
        }
    }
}
