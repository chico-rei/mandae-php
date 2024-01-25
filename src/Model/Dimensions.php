<?php

namespace ChicoRei\Packages\Mandae\Model;

use ChicoRei\Packages\Mandae\MandaeObject;

class Dimensions extends MandaeObject
{
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

    public function getHeight(): ?float
    {
        return $this->height;
    }

    /**
     * @param float|null $height
     * @return $this
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
     * @return $this
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
     * @return $this
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
     * @return $this
     */
    public function setWeight(?float $weight): Dimensions
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'height' => $this->getHeight(),
            'width' => $this->getWidth(),
            'length' => $this->getLength(),
            'weight' => $this->getWeight(),
        ];
    }
}
