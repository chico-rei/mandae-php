<?php

namespace ChicoRei\Packages\Mandae;

use InvalidArgumentException;

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
     * @param array $array
     * @return static
     */
    public function fill(array $array = [])
    {
        foreach ($array as $key => $value) {
            $setter = 'set'.ucfirst($key);

            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }

        return $this;
    }

    /**
     * @param array|static|null $data
     * @return static
     */
    public static function create($data = [])
    {
        if ($data instanceof static || is_null($data)) {
            return $data;
        }

        if (! is_array($data)) {
            throw new InvalidArgumentException('create() argument must be an array');
        }

        return new static($data);
    }

    /**
     * Returns array representation of object
     *
     * @return array
     */
    abstract public function toArray(): array;
}
