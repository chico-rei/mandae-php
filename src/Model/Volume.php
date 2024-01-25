<?php

namespace ChicoRei\Packages\Mandae\Model;

use ChicoRei\Packages\Mandae\MandaeObject;

class Volume extends MandaeObject
{
    /**
     * Valume Id
     *
     * @var null|string
     */
    public $volumeId;

    /**
     * Dimensions
     *
     * @var null|Dimensions
     */
    public $dimensions;

    /**
     * @return string|null
     */
    public function getVolumeId(): ?string
    {
        return $this->volumeId;
    }

    /**
     * @param string|null $volumeId
     * @return Volume
     */
    public function setVolumeId(?string $volumeId): Volume
    {
        $this->volumeId = $volumeId;
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
     * @param Dimensions|array|null $dimensions
     * @return Volume
     */
    public function setDimensions($dimensions): Volume
    {
        $this->dimensions = Dimensions::create($dimensions);
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'volumeId' => $this->getVolumeId(),
            'dimensions' => $this->getDimensions() ? $this->getDimensions()->toArray() : null,
        ];
    }
}
