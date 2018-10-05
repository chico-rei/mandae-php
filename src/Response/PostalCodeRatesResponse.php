<?php

namespace ChicoRei\Packages\Mandae\Response;

use ChicoRei\Packages\Mandae\MandaeObject;
use ChicoRei\Packages\Mandae\ValueObject\ShippingService;

class PostalCodeRatesResponse extends MandaeObject
{
    /**
     * Postal Code
     *
     * @var string
     */
    public $postalCode;

    /**
     * Available Shipping Services
     *
     * @var ShippingService[]
     */
    public $shippingServices;

    /**
     * PostalCodeRatesResponse constructor.
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        parent::__construct($values);
    }

    /**
     * @param $array
     * @return PostalCodeRatesResponse
     */
    public static function createFromArray(array $array = [])
    {
        $shippingServices = [];

        foreach ($array['shippingServices'] as $shippingService) {
            $shippingServices[] = new ShippingService($shippingService);
        }

        return new self([
            'postalCode' => $array['postalCode'],
            'shippingServices' => $shippingServices,
        ]);
    }

    /**
     * @return string
     */
    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     * @return PostalCodeRatesResponse
     */
    public function setPostalCode(string $postalCode): PostalCodeRatesResponse
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    /**
     * @return ShippingService[]
     */
    public function getShippingServices(): array
    {
        return $this->shippingServices;
    }

    /**
     * @param ShippingService[] $shippingServices
     * @return PostalCodeRatesResponse
     */
    public function setShippingServices(array $shippingServices): PostalCodeRatesResponse
    {
        $this->shippingServices = $shippingServices;
        return $this;
    }

    public function toArray(): array
    {
        $shippingServices = [];

        foreach ($this->getShippingServices() as $shippingService) {
            $shippingServices[] = $shippingService->toArray();
        }

        return [
            'postalCode' => $this->getPostalCode(),
            'shippingServices' => $shippingServices,
        ];
    }
}