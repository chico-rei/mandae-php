<?php

namespace ChicoRei\Packages\Mandae\Handler;

use ChicoRei\Packages\Mandae\Client;
use ChicoRei\Packages\Mandae\Request\OrderAddParcelRequest;
use ChicoRei\Packages\Mandae\Request\OrderCancelRequest;
use ChicoRei\Packages\Mandae\Response\OrderAddParcelResponse;

class OrderHandler
{
    /**
     * @var Client
     */
    private $client;

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
     * @throws \ChicoRei\Packages\Mandae\Exception\MandaeClientException
     * @throws \ChicoRei\Packages\Mandae\Exception\MandaeAPIException
     */
    public function addParcel($payload): OrderAddParcelResponse
    {
        if (is_array($payload)) {
            $payload = OrderAddParcelRequest::createFromArray($payload);
        }

        if (!$payload instanceof OrderAddParcelRequest) {
            throw new \RuntimeException('Payload must be an array or an instance of OrderAddParcelRequest');
        }

        $response = $this->client->sendRequest($payload);

        return OrderAddParcelResponse::createFromArray($response);
    }

    /**
     * Cancel Order API
     *
     * @param array|OrderAddParcelRequest $payload
     * @return bool
     * @throws \ChicoRei\Packages\Mandae\Exception\MandaeClientException
     * @throws \ChicoRei\Packages\Mandae\Exception\MandaeAPIException
     */
    public function cancel($payload): bool
    {
        if (is_array($payload)) {
            $payload = OrderCancelRequest::createFromArray($payload);
        }

        if (!$payload instanceof OrderCancelRequest) {
            throw new \RuntimeException('Payload must be an array or an instance of OrderCancelRequest');
        }

        $this->client->sendRequest($payload);

        return true;
    }
}
