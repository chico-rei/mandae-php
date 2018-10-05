<?php

namespace ChicoRei\Packages\Mandae\Request;

use ChicoRei\Packages\Mandae\IRequest;
use ChicoRei\Packages\Mandae\MandaeObject;
use ChicoRei\Packages\Mandae\ValueObject\Dimensions;

class PostalCodeRatesRequest extends MandaeObject implements IRequest
{
    /**
     * Postal Code
     *
     * @var null|string
     */
    public $postalCode;

    /**
     * Declared value
     *
     * @var null|float
     */
    public $declaredValue;

    /**
     * Declared value
     *
     * @var null|Dimensions
     */
    public $dimensions;

    public function getMethod()
    {
        return 'GET';
    }

    public function getPath()
    {
        return sprintf('postalcodes/%s/rates', $this->postalCode);
    }

    public function getPayload()
    {
        return array_merge([
            'declaredValue' => $this->declaredValue,
        ], $this->dimensions->toArray());
    }

    /**
     * @param $array
     * @return PostalCodeRatesRequest
     */
    public static function createFromArray(array $array = [])
    {
        return new self([
            'postalCode' => $array['postalCode'] ?? 'null',
            'declaredValue' => $array['declaredValue'] ?? 'null',
            'dimensions' => new Dimensions($array['dimensions'] ?? []),
        ]);
    }

    /**
     * @return null|string
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * @param null|string $postalCode
     * @return PostalCodeRatesRequest
     */
    public function setPostalCode(?string $postalCode): PostalCodeRatesRequest
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getDeclaredValue(): ?float
    {
        return $this->declaredValue;
    }

    /**
     * @param float|null $declaredValue
     * @return PostalCodeRatesRequest
     */
    public function setDeclaredValue(?float $declaredValue): PostalCodeRatesRequest
    {
        $this->declaredValue = $declaredValue;
        return $this;
    }

    /**
     * @return Dimensions|null
     */
    public function getDimensions(): ?Dimensions
    {
        return $this->dimensions;
    }

    /**
     * @param Dimensions|null $dimensions
     * @return PostalCodeRatesRequest
     */
    public function setDimensions(?Dimensions $dimensions): PostalCodeRatesRequest
    {
        $this->dimensions = $dimensions;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'postalCode' => $this->getPostalCode(),
            'declaredValue' => $this->getDeclaredValue(),
            'dimensions' => $this->getDimensions()->toArray()
        ];
    }
}