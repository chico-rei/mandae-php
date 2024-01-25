<?php

namespace ChicoRei\Packages\Mandae\Handler;

use ChicoRei\Packages\Mandae\Client;
use ChicoRei\Packages\Mandae\Exception\MandaeAPIException;
use ChicoRei\Packages\Mandae\Exception\MandaeClientException;
use ChicoRei\Packages\Mandae\Request\PostalCodeRatesRequest;
use ChicoRei\Packages\Mandae\Response\PostalCodeRatesResponse;

class PostalCodeHandler
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
     * Rates API
     *
     * @param array|PostalCodeRatesResponse $payload
     * @return PostalCodeRatesResponse
     * @throws MandaeClientException
     * @throws MandaeAPIException
     */
    public function rates($payload): PostalCodeRatesResponse
    {
        if (is_array($payload)) {
            $payload = PostalCodeRatesRequest::create($payload);
        }

        if (!$payload instanceof PostalCodeRatesRequest) {
            throw new \RuntimeException('Payload must be an array or an instance of PostalCodeRatesRequest');
        }

        $response = $this->client->sendRequest($payload);

        return PostalCodeRatesResponse::create($response['data']);
    }
}
