<?php

namespace ChicoRei\Packages\Mandae\Handler;

use ChicoRei\Packages\Mandae\Client;
use ChicoRei\Packages\Mandae\Exception\MandaeAPIException;
use ChicoRei\Packages\Mandae\Exception\MandaeClientException;
use ChicoRei\Packages\Mandae\Request\OrderAddParcelRequest;
use ChicoRei\Packages\Mandae\Response\OrderAddParcelResponse;

class OrderHandler
{
    /**
     * @var Client
     */
    private Client $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Add Parcel API
     *
     * @param array|OrderAddParcelRequest $payload
     * @return OrderAddParcelResponse
     * @throws MandaeClientException
     * @throws MandaeAPIException
     */
    public function addParcel($payload): OrderAddParcelResponse
    {
        if (is_array($payload)) {
            $payload = OrderAddParcelRequest::create($payload);
        }

        if (!$payload instanceof OrderAddParcelRequest) {
            throw new \RuntimeException('Payload must be an array or an instance of OrderAddParcelRequest');
        }

        $response = $this->client->sendRequest($payload);

        return OrderAddParcelResponse::create($response);
    }
}
