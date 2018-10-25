<?php

namespace ChicoRei\Packages\Mandae\Model;

use ChicoRei\Packages\Mandae\MandaeObject;

class Sender extends MandaeObject
{
    /**
     * Full name
     *
     * @var null|string
     */
    public $fullName;

    /**
     * Address
     *
     * @var null|Address
     */
    public $address;

    /**
     * Sender constructor.
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        parent::__construct($values);
    }

    /**
     * @param $array
     * @return Sender
     */
    public static function createFromArray(array $array = [])
    {
        return new self([
            'fullName' => $array['fullName'] ?? null,
            'address' => Address::createFromArray($array['address'] ?? []),
        ]);
    }

    /**
     * @return null|string
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * @param null|string $fullName
     * @return Sender
     */
    public function setFullName(?string $fullName): Sender
    {
        $this->fullName = $fullName;
        return $this;
    }

    /**
     * @return Address|null
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * @param Address|null $address
     * @return Sender
     */
    public function setAddress(?Address $address): Sender
    {
        $this->address = $address;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'fullName' => $this->getFullName(),
            'address' => $this->getAddress() ? $this->getAddress()->toArray() : null,
        ];
    }
}
