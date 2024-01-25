<?php

namespace ChicoRei\Packages\Mandae\Model;

use Carbon\Carbon;
use ChicoRei\Packages\Mandae\MandaeObject;

class Event extends MandaeObject
{
    /**
     * Id
     *
     * @var null|string
     */
    public $id;


    /**
     * Date of the Event
     *
     * @var null|Carbon
     */
    public $date;

    /**
     * Timestamp of the Event
     *
     * @var null|Carbon
     */
    public $timestamp;

    /**
     * Name of the Event
     *
     * @var null|string
     */
    public $name;

    /**
     * Description of the Event
     *
     * @var null|string
     */
    public $description;

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     * @return Event
     */
    public function setId(?string $id): Event
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Carbon|null
     */
    public function getDate(): ?Carbon
    {
        return $this->date;
    }

    /**
     * @param Carbon|string $date
     * @return Event
     */
    public function setDate($date): Event
    {
        $this->date = Carbon::parse($date);
        return $this;
    }

    /**
     * @return Carbon|null
     */
    public function getTimestamp(): ?Carbon
    {
        return $this->timestamp;
    }

    /**
     * @param Carbon|string $timestamp
     * @return Event
     */
    public function setTimestamp($timestamp): Event
    {
        $this->timestamp = $timestamp instanceof Carbon
            ? $timestamp : Carbon::createFromFormat("Y-m-d\TH:i:s", $timestamp);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return Event
     */
    public function setName(?string $name): Event
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return Event
     */
    public function setDescription(?string $description): Event
    {
        $this->description = $description;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'date' => $this->getDate() ? $this->getDate()->format("Y-m-d H:i") : null,
            'timestamp' => $this->getTimestamp() ? $this->getTimestamp()->toDateTimeLocalString() : null,
            'name' => $this->getName(),
            'description' => $this->getDescription(),
        ];
    }
}
