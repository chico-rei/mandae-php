<?php

namespace ChicoRei\Packages\Mandae\Tests;

use ChicoRei\Packages\Mandae\Exception\MandaeAPIException;
use ChicoRei\Packages\Mandae\Exception\MandaeClientException;
use ChicoRei\Packages\Mandae\Mandae;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Exception\RequestException;

class MandaeTest extends TestCase
{
    public function testMandaeWithouToken()
    {
        $this->expectException(\InvalidArgumentException::class);

        new Mandae('');
    }


    public function testMandaeAPIServerError()
    {
        $this->expectException(MandaeAPIException::class);

        $mock = new MockHandler([
            new Response(500, [], '{"error":{"code": "500","message": "Ocorreu um erro na API da Mandaê"}}'),
        ]);

        $handler = HandlerStack::create($mock);
        $mandae = new Mandae('TOKEN', true, ['handler' => $handler]);
        $mandae->tracking()->get(['trackingCode' => 'someCode']);
    }

    public function testRequestError()
    {
        $this->expectException(MandaeClientException::class);

        $mock = new MockHandler([
            new RequestException("Error Communicating with Server", new Request('GET', 'test'))
        ]);

        $handler = HandlerStack::create($mock);
        $mandae = new Mandae('TOKEN', true, ['handler' => $handler]);
        $mandae->tracking()->get(['trackingCode' => 'someCode']);
    }
}
