<?php

namespace ChicoRei\Packages\Mandae\Model;

use Carbon\Carbon;
use ChicoRei\Packages\Mandae\MandaeObject;

class Event extends MandaeObject
{
    /**
     * Date of the Event
     *
     * @var null|Carbon
     */
    public $date;

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
     * Event constructor.
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        parent::__construct($values);
    }

    /**
     * @param $array
     * @return Event
     */
    public static function createFromArray(array $array = [])
    {
        return new self([
            'date' => isset($array['date']) ? Carbon::parse($array['date']) : null,
            'name' => $array['name'] ?? null,
            'description' => $array['description'] ?? null,
        ]);
    }

    /**
     * @return Carbon|null
     */
    public function getDate(): ?Carbon
    {
        return $this->date;
    }

    /**
     * @param Carbon|null $date
     * @return Event
     */
    public function setDate(?Carbon $date): Event
    {
        $this->date = $date;
        return $this;
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
     * @return Event
     */
    public function setName(?string $name): Event
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param null|string $description
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
            'date' => $this->getDate() ? (string)$this->getDate() : null,
            'name' => $this->getName(),
            'description' => $this->getDescription(),
        ];
    }
}