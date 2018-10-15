<?php

namespace ChicoRei\Packages\Mandae\Model;

use ChicoRei\Packages\Mandae\MandaeObject;

class Recipient extends MandaeObject
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
     * Document (CPF or CNPJ)
     *
     * @var null|string
     */
    public $document;

    /**
     * Phone
     *
     * @var null|string
     */
    public $phone;

    /**
     * Email
     *
     * @var null|string
     */
    public $email;

    /**
     * Recipient constructor.
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        parent::__construct($values);
    }

    /**
     * @param $array
     * @return Recipient
     */
    public static function createFromArray(array $array = [])
    {
        return new self([
            'fullName' => $array['fullName'] ?? null,
            'address' => Address::createFromArray($array['address'] ?? []),
            'document' => $array['document'] ?? null,
            'phone' => $array['phone'] ?? null,
            'email' => $array['email'] ?? null,
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
     * @return Recipient
     */
    public function setFullName(?string $fullName): Recipient
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
     * @return Recipient
     */
    public function setAddress(?Address $address): Recipient
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDocument(): ?string
    {
        return $this->document;
    }

    /**
     * @param null|string $document
     * @return Recipient
     */
    public function setDocument(?string $document): Recipient
    {
        $this->document = $document;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param null|string $phone
     * @return Recipient
     */
    public function setPhone(?string $phone): Recipient
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param null|string $email
     * @return Recipient
     */
    public function setEmail(?string $email): Recipient
    {
        $this->email = $email;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'fullName' => $this->getFullName(),
            'address' => $this->getAddress() ? $this->getAddress()->toArray() : null,
            'document' => $this->getDocument(),
            'phone' => $this->getPhone(),
            'email' => $this->getEmail(),
        ];
    }
}