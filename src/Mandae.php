<?php

namespace ChicoRei\Packages\Mandae;

use ChicoRei\Packages\Mandae\Handler\PostalCodeHandler;
use ChicoRei\Packages\Mandae\Handler\TrackingHandler;

class Mandae
{
    /**
     * Mandae API Url
     *
     * @var string
     */
    const API_URL = "https://api.mandae.com.br/v2/";

    /**
     * Mandae Sandbox API Url
     *
     * @var string
     */
    const API_SANDBOX_URL = "https://sandbox.api.mandae.com.br/v2/";

    /**
     * Mandae HTTP Client
     *
     * @var Client
     */
    private $client;

    /**
     * @param array
     */
    private $defaultOptions = [
        'timeout' => 5.0,
    ];

    /**
     * @param PostalCodeHandler
     */
    private $postalCodeHandler;

    /**
     * @param TrackingHandler
     */
    private $trackingHandler;

    /**
     * MandaeService constructor.
     * @param string $apiToken Mandae Authorization API Token
     * @param bool $sandbox Use sandbox API
     * @param array $options Guzzle options except base_uri, http_errors and headers
     */
    public function __construct($apiToken, $sandbox = false, array $options = [])
    {
        if (!isset($apiToken) || empty($apiToken)) {
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
}
