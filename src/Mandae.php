<?php

namespace ChicoRei\Packages\Mandae;

use ChicoRei\Packages\Mandae\Handler\OrderHandler;
use ChicoRei\Packages\Mandae\Handler\PostalCodeHandler;
use ChicoRei\Packages\Mandae\Handler\TrackingHandler;

class Mandae
{
    /**
     * Mandae API Url
     *
     * @var string
     */
    const API_URL = "https://api.mandae.com.br/";

    /**
     * Mandae Sandbox API Url
     *
     * @var string
     */
    const API_SANDBOX_URL = "https://sandbox.api.mandae.com.br/";

    /**
     * Mandae HTTP Client
     *
     * @var Client
     */
    private Client $client;

    /**
     * @var array
     */
    private array $defaultOptions = [
        'timeout' => 15.0,
    ];

    /**
     * @var PostalCodeHandler
     */
    private PostalCodeHandler $postalCodeHandler;

    /**
     * @var TrackingHandler
     */
    private TrackingHandler $trackingHandler;

    /**
     * @var OrderHandler
     */
    private OrderHandler $orderHandler;

    /**
     * MandaeService constructor.
     * @param string $apiToken Mandae Authorization API Token
     * @param bool $sandbox Use sandbox API
     * @param array $options Guzzle options except base_uri, http_errors and headers
     */
    public function __construct(string $apiToken, bool $sandbox = false, array $options = [])
    {
        if (empty($apiToken)) {
            throw new \InvalidArgumentException('API Token can\'t be null or empty!');
        }

        $options = array_merge($this->defaultOptions, $options);

        $this->client = new Client($apiToken, $sandbox, $options);
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @return PostalCodeHandler
     */
    public function postalCode(): PostalCodeHandler
    {
        if (!isset($this->postalCodeHandler)) {
            $this->postalCodeHandler = new PostalCodeHandler($this->client);
        }

        return $this->postalCodeHandler;
    }

    /**
     * @return TrackingHandler
     */
    public function tracking(): TrackingHandler
    {
        if (!isset($this->trackingHandler)) {
            $this->trackingHandler = new TrackingHandler($this->client);
        }

        return $this->trackingHandler;
    }

    /**
     * @return OrderHandler
     */
    public function order(): OrderHandler
    {
        if (!isset($this->orderHandler)) {
            $this->orderHandler = new OrderHandler($this->client);
        }

        return $this->orderHandler;
    }
}
