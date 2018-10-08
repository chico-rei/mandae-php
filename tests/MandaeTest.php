<?php

use ChicoRei\Packages\Mandae\Mandae;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Exception\RequestException;

class MandaeTest extends TestCase
{
    /**
     * @expectedException InvalidArgumentException
     */
    public function testMandaeWithouToken()
    {
        $mandae = new Mandae(null);
    }


    /**
     * @expectedException \ChicoRei\Packages\Mandae\Exception\MandaeAPIException
     */
    public function testMandaeAPIServerError()
    {
        $mock = new MockHandler([
            new Response(500, [], '{"error":{"code": "500","message": "Ocorreu um erro na API da Mandaê"}}'),
        ]);

        $handler = HandlerStack::create($mock);
        $mandae = new Mandae('TOKEN', true, ['handler' => $handler]);
        $response = $mandae->tracking()->get(['trackingCode' => 'someCode']);
    }

    /**
     * @expectedException \ChicoRei\Packages\Mandae\Exception\MandaeClientException
     */
    public function testRequestError()
    {
        $mock = new MockHandler([
            new RequestException("Error Communicating with Server", new Request('GET', 'test'))
        ]);

        $handler = HandlerStack::create($mock);
        $mandae = new Mandae('TOKEN', true, ['handler' => $handler]);
        $response = $mandae->tracking()->get(['trackingCode' => 'someCode']);
    }
}
