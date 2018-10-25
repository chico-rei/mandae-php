<?php

namespace ChicoRei\Packages\Mandae\Model;

use ChicoRei\Packages\Mandae\MandaeObject;

class ValueAddedService extends MandaeObject
{
    /**
     * Name
     *
     * @var null|string
     */
    public $name;

    /**
     * Value
     *
     * @var null|float
     */
    public $value;

    /**
     * ValueAddedService constructor.
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        parent::__construct($values);
    }

    /**
     * @param $array
     * @return ValueAddedService
     */
    public static function createFromArray(array $array = [])
    {
        return new self([
            'name' => $array['name'] ?? null,
            'value' => $array['value'] ?? null,
        ]);
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param null|string $name
     * @return ValueAddedService
     */
    public function setName(?string $name): ValueAddedService
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

    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'value' => $this->getValue(),
        ];
    }
}
