<?php

namespace ChicoRei\Packages\Mandae;

abstract class MandaeObject
{
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
     * @return self
     */
    public static function createFromArray(array $array = [])
    {
        $class = new static();
        $class->fill($array);
        return $class;
    }

    /**
     * Returns array representation of object
     *
     * @return array
     */
    abstract public function toArray(): array;
}