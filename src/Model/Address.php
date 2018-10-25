<?php

namespace ChicoRei\Packages\Mandae\Model;

use ChicoRei\Packages\Mandae\MandaeObject;

class Address extends MandaeObject
{
    /**
     * Postal Code (only numbers)
     *
     * @var null|string
     */
    public $postalCode;

    /**
     * Street
     *
     * @var null|string
     */
    public $street;

    /**
     * Number
     *
     * @var null|string
     */
    public $number;

    /**
     * Address Line 2
     *
     * @var null|string
     */
    public $addressLine2;

    /**
     * Neighborhood
     *
     * @var null|string
     */
    public $neighborhood;

    /**
     * City
     *
     * @var null|string
     */
    public $city;

    /**
     * State
     *
     * @var null|string
     */
    public $state;

    /**
     * Country (ISO 3166-1)
     *
     * @var null|string
     */
    public $country;

    /**
     * Reference
     *
     * @var null|string
     */
    public $reference;

    /**
     * Address constructor.
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        parent::__construct($values);
    }

    /**
     * @param $array
     * @return Address
     */
    public static function createFromArray(array $array = [])
    {
        return new self([
            'postalCode' => $array['postalCode'] ?? null,
            'street' => $array['street'] ?? null,
            'number' => $array['number'] ?? null,
            'addressLine2' => $array['addressLine2'] ?? null,
            'neighborhood' => $array['neighborhood'] ?? null,
            'city' => $array['city'] ?? null,
            'state' => $array['state'] ?? null,
            'country' => $array['country'] ?? null,
            'reference' => $array['reference'] ?? null,
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
     * @return Address
     */
    public function setPostalCode(?string $postalCode): Address
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * @param null|string $street
     * @return Address
     */
    public function setStreet(?string $street): Address
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }

    /**
     * @param null|string $number
     * @return Address
     */
    public function setNumber(?string $number): Address
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    /**
     * @param null|string $addressLine2
     * @return Address
     */
    public function setAddressLine2(?string $addressLine2): Address
    {
        $this->addressLine2 = $addressLine2;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getNeighborhood(): ?string
    {
        return $this->neighborhood;
    }

    /**
     * @param null|string $neighborhood
     * @return Address
     */
    public function setNeighborhood(?string $neighborhood): Address
    {
        $this->neighborhood = $neighborhood;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param null|string $city
     * @return Address
     */
    public function setCity(?string $city): Address
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param null|string $state
     * @return Address
     */
    public function setState(?string $state): Address
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param null|string $country
     * @return Address
     */
    public function setCountry(?string $country): Address
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @param null|string $reference
     * @return Address
     */
    public function setReference(?string $reference): Address
    {
        $this->reference = $reference;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'postalCode' => $this->getPostalCode(),
            'street' => $this->getStreet(),
            'number' => $this->getNumber(),
            'addressLine2' => $this->getAddressLine2(),
            'neighborhood' => $this->getNeighborhood(),
            'city' => $this->getCity(),
            'state' => $this->getState(),
            'country' => $this->getCountry(),
            'reference' => $this->getReference(),
        ];
    }
}
