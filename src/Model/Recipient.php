<?php

namespace ChicoRei\Packages\Mandae\Model;

use ChicoRei\Packages\Mandae\MandaeObject;

class Recipient extends MandaeObject
{
    /**
     * Full name
     *
     * @var string
     */
    public $fullName;

    /**
     * Address
     *
     * @var Address
     */
    public $address;

    /**
     * Document (CPF or CNPJ)
     *
     * @var string
     */
    public $document;

    /**
     * Email
     *
     * @var string
     */
    public $email;

    /**
     * Phone
     *
     * @var null|string
     */
    public $phone;

    /**
     * @return string
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     * @return Recipient
     */
    public function setFullName(string $fullName): Recipient
    {
        $this->fullName = $fullName;
        return $this;
    }

    /**
     * @return Address
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * @param Address|array $address
     * @return Recipient
     */
    public function setAddress($address): Recipient
    {
        $this->address = Address::create($address);
        return $this;
    }

    /**
     * @return string
     */
    public function getDocument(): ?string
    {
        return $this->document;
    }

    /**
     * @param string $document
     * @return Recipient
     */
    public function setDocument(string $document): Recipient
    {
        $this->document = $document;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Recipient
     */
    public function setEmail(string $email): Recipient
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     * @return Recipient
     */
    public function setPhone(?string $phone): Recipient
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'fullName' => $this->getFullName(),
            'address' => $this->getAddress() ? $this->getAddress()->toArray() : null,
            'document' => $this->getDocument(),
            'email' => $this->getEmail(),
            'phone' => $this->getPhone(),
        ];
    }
}
