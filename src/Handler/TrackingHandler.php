<?php

namespace ChicoRei\Packages\Mandae\Handler;

use ChicoRei\Packages\Mandae\Client;
use ChicoRei\Packages\Mandae\Exception\MandaeAPIException;
use ChicoRei\Packages\Mandae\Exception\MandaeClientException;
use ChicoRei\Packages\Mandae\Request\TrackingGetRequest;
use ChicoRei\Packages\Mandae\Response\TrackingGetResponse;

class TrackingHandler
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
     * Get Tracking API
     *
     * @param array|TrackingGetRequest $payload
     * @return TrackingGetResponse
     * @throws MandaeClientException
     * @throws MandaeAPIException
     */
    public function get($payload): TrackingGetResponse
    {
        if (is_array($payload)) {
            $payload = TrackingGetRequest::create($payload);
        }

        if (!$payload instanceof TrackingGetRequest) {
            throw new \RuntimeException('Payload must be an array or an instance of TrackingGetRequest');
        }

        $response = $this->client->sendRequest($payload);

        return TrackingGetResponse::create($response);
    }
}
