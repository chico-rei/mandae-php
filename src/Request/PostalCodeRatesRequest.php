<?php

namespace ChicoRei\Packages\Mandae\Request;

use ChicoRei\Packages\Mandae\IRequest;
use ChicoRei\Packages\Mandae\MandaeObject;
use ChicoRei\Packages\Mandae\Model\Dimensions;

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

    /**
     * PostalCodeRatesRequest constructor.
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        parent::__construct($values);
    }

    /**
     * @param $array
     * @return PostalCodeRatesRequest
     */
    public static function createFromArray(array $array = [])
    {
        return new self([
            'postalCode' => $array['postalCode'] ?? null,
            'declaredValue' => $array['declaredValue'] ?? null,
            'dimensions' => Dimensions::createFromArray($array['dimensions'] ?? []),
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

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getPath(): string
    {
        return sprintf('postalcodes/%s/rates', $this->postalCode);
    }

    public function getPayload(): ?array
    {
        return array_merge([
            'declaredValue' => $this->declaredValue,
        ], $this->dimensions->toArray());
    }

    public function toArray(): array
    {
        return [
            'postalCode' => $this->getPostalCode(),
            'declaredValue' => $this->getDeclaredValue(),
            'dimensions' => $this->getDimensions() ? $this->getDimensions()->toArray() : null,
        ];
    }
}
