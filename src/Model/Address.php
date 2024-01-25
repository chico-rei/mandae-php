<?php

namespace ChicoRei\Packages\Mandae\Model;

use ChicoRei\Packages\Mandae\MandaeObject;

class Address extends MandaeObject
{
    /**
     * Postal Code (only numbers)
     *
     * @var string
     */
    public $postalCode;

    /**
     * Street
     *
     * @var string
     */
    public $street;

    /**
     * Number
     *
     * @var string
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
     * @var string|null
     */
    public $neighborhood;

    /**
     * City
     *
     * @var string
     */
    public $city;

    /**
     * State
     *
     * @var string
     */
    public $state;

    /**
     * Country (ISO 3166-1)
     *
     * @var string
     */
    public $country;

    /**
     * Reference
     *
     * @var null|string
     */
    public $reference;

    /**
     * @return string
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     * @return Address
     */
    public function setPostalCode(string $postalCode): Address
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * @param string $street
     * @return Address
     */
    public function setStreet(string $street): Address
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return Address
     */
    public function setNumber(string $number): Address
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    /**
     * @param string|null $addressLine2
     * @return Address
     */
    public function setAddressLine2(?string $addressLine2): Address
    {
        $this->addressLine2 = $addressLine2;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNeighborhood(): ?string
    {
        return $this->neighborhood;
    }

    /**
     * @param string|null $neighborhood
     * @return Address
     */
    public function setNeighborhood(?string $neighborhood): Address
    {
        $this->neighborhood = $neighborhood;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Address
     */
    public function setCity(string $city): Address
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string $state
     * @return Address
     */
    public function setState(string $state): Address
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return Address
     */
    public function setCountry(string $country): Address
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @param string|null $reference
     * @return Address
     */
    public function setReference(?string $reference): Address
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * @return array
     */
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
