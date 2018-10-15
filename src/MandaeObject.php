<?php

namespace ChicoRei\Packages\Mandae;

abstract class MandaeObject
{
    /**
     * MandaeObject constructor.
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        $this->fill($values);
    }

    /**
     * @param $array
     */
    public function fill(array $array = [])
    {
        foreach ($array as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    /**
     * @param $array
     * @return static
     */
    public static function createFromArray(array $array = [])
    {
        return new static($array);
    }

    /**
     * Returns array representation of object
     *
     * @return array
     */
    abstract public function toArray(): array;
}