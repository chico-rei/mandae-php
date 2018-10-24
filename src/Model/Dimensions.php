<?php

namespace ChicoRei\Packages\Mandae\Model;

use ChicoRei\Packages\Mandae\MandaeObject;

class Dimensions extends MandaeObject
{
    /**
     * Dimension type
     *
     * @var null|string
     */
    public $type;

    /**
     * Height in centimeters
     *
     * @var null|float
     */
    public $height;

    /**
     * Width in centimeters
     *
     * @var null|float
     */
    public $width;

    /**
     * Length in centimeters
     *
     * @var null|float
     */
    public $length;

    /**
     * Weight in kilograms
     *
     * @var null|float
     */
    public $weight;

    /**
     * Dimensions constructor.
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        parent::__construct($values);
    }

    /**
     * @return null|string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param null|string $type
     * @return Dimensions
     */
    public function setType(?string $type): Dimensions
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getHeight(): ?float
    {
        return $this->height;
    }

    /**
     * @param float|null $height
     * @return Dimensions
     */
    public function setHeight(?float $height): Dimensions
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getWidth(): ?float
    {
        return $this->width;
    }

    /**
     * @param float|null $width
     * @return Dimensions
     */
    public function setWidth(?float $width): Dimensions
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getLength(): ?float
    {
        return $this->length;
    }

    /**
     * @param float|null $length
     * @return Dimensions
     */
    public function setLength(?float $length): Dimensions
    {
        $this->length = $length;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getWeight(): ?float
    {
        return $this->weight;
    }

    /**
     * @param float|null $weight
     * @return Dimensions
     */
    public function setWeight(?float $weight): Dimensions
    {
        $this->weight = $weight;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'type' => $this->getType(),
            'height' => $this->getHeight(),
            'width' => $this->getWidth(),
            'length' => $this->getLength(),
            'weight' => $this->getWeight(),
        ];
    }
}