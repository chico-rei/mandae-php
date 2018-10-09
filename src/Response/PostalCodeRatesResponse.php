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
        return new self([
            'postalCode' => $array['postalCode'],
            'shippingServices' => array_map(function ($shipping) {
                return ShippingService::createFromArray($shipping);
            }, $array['shippingServices'] ?? []),
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

    /**
     * Get Economic Shipping Service
     *
     * @return ShippingService|null
     */
    public function getEconomicShipping(): ?ShippingService
    {
        foreach ($this->getShippingServices() as $shippingService) {
            if ($shippingService->getName() === ShippingService::SHIPPING_SERVICE_ECONOMICO){
                return $shippingService;
            }
        }

        return null;
    }

    /**
     * Get Fast Shipping Service
     *
     * @return ShippingService|null
     */
    public function getFastShipping(): ?ShippingService
    {
        foreach ($this->getShippingServices() as $shippingService) {
            if ($shippingService->getName() === ShippingService::SHIPPING_SERVICE_RAPIDO){
                return $shippingService;
            }
        }

        return null;
    }

    public function toArray(): array
    {
        return [
            'postalCode' => $this->getPostalCode(),
            'shippingServices' => array_map(function (ShippingService $shipping) {
                return $shipping->toArray();
            }, $this->getShippingServices() ?? []),
        ];
    }
}