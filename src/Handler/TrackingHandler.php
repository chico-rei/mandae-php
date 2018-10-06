<?php

namespace ChicoRei\Packages\Mandae\Handler;

use ChicoRei\Packages\Mandae\Client;
use ChicoRei\Packages\Mandae\Request\TrackingGetRequest;
use ChicoRei\Packages\Mandae\Response\TrackingGetResponse;
use http\Exception\RuntimeException;

class TrackingHandler
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
     * Get Tracking API
     *
     * @param array|TrackingGetRequest $payload
     * @return TrackingGetResponse
     * @throws \ChicoRei\Packages\Mandae\Exception\MandaeClientException
     * @throws \ChicoRei\Packages\Mandae\Exception\MandaeException
     */
    public function get($payload): TrackingGetResponse
    {
        if (is_array($payload)) {
            $payload = TrackingGetRequest::createFromArray($payload);
        }

        if (!$payload instanceof TrackingGetRequest) {
            throw new RuntimeException('payload must be an array or an instance of TrackingGetRequest');
        }

        $response = $this->client->sendRequest($payload);

        return TrackingGetResponse::createFromArray($response);
    }
}