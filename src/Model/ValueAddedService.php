<?php

namespace ChicoRei\Packages\Mandae\Model;

use ChicoRei\Packages\Mandae\MandaeObject;

class ValueAddedService extends MandaeObject
{
    /**
     * Name
     *
     * @var string
     */
    public $name;

    /**
     * Value
     *
     * @var null|float
     */
    public $value;

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ValueAddedService
     */
    public function setName(string $name): ValueAddedService
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getValue(): ?float
    {
        return $this->value;
    }

    /**
     * @param float|null $value
     * @return ValueAddedService
     */
    public function setValue(?float $value): ValueAddedService
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'value' => $this->getValue(),
        ];
    }
}
