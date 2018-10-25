<?php

namespace ChicoRei\Packages\Mandae\Tests;

use ChicoRei\Packages\Mandae\Mandae;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\HandlerStack;

class TrackingTest extends TestCase
{
    public function testSuccess()
    {
        $mock = new MockHandler([
            // @codingStandardsIgnoreStart
            new Response(200, [], <<<EOT
                {
                   "trackingCode":"23A6BKMQ313M0",
                   "carrierCode":"DW863203770BR",
                   "carrierName":"Correios",
                   "events":[
                      {
                         "date":"2017-06-16 10:40",
                         "name":"Destinatário ausente",
                         "description":"A encomenda poderá ser retirada na unidade da transportadora. Aguarde as próximas atualizações."
                      },
                      {
                         "date":"2017-06-16 10:30",
                         "name":"Contratempo - Possível atraso",
                         "description":"A data de entrega era prevista para Sex, 16/jun e foi reagendada para Seg, 19/jun"
                      }
                   ]
                }
EOT
            ),
        ]);
        // @codingStandardsIgnoreEnd

        $handler = HandlerStack::create($mock);
        $mandae = new Mandae('TOKEN', true, ['handler' => $handler]);
        $tracking = $mandae->tracking()->get(['trackingCode' => '23A6BKMQ313M0']);

        $this->assertEquals('23A6BKMQ313M0', $tracking->getTrackingCode());
        $this->assertEquals('DW863203770BR', $tracking->getCarrierCode());
        $this->assertEquals('Correios', $tracking->getCarrierName());
        $this->assertEquals(2, count($tracking->getEvents()));
        $this->assertEquals('2017-06-16 10:40', $tracking->getEvents()[0]->getDate()->format('Y-m-d H:i'));
        $this->assertEquals('Destinatário ausente', $tracking->getEvents()[0]->getName());
    }
}
